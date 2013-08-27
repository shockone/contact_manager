<?php


/** Check if environment is development and display errors **/

function setErrorReporting() {
    global $config;

    if ($config['DEVELOPMENT_ENVIRONMENT']) {
        error_reporting(E_ALL);
        ini_set('display_errors','On');
    } else {
        error_reporting(E_ALL);
        ini_set('display_errors','Off');
        ini_set('log_errors', 'On');
        ini_set('error_log', ROOT_DIRECTORY .'/tmp/logs/error.log');
    }
}


/** Main Call Function **/

function dispatch() {
    global $config;
    $urlArray = explode("/", strtok($_SERVER['REQUEST_URI'], '?'));
    $controller = $urlArray[1] ? ucwords($urlArray[1]) . 'Controller' : $config['DEFAULT_CONTROLLER'];
    // TODO: Singularize properly
    $model = preg_replace('/sController$/', '', $controller);
    $action = isset($urlArray[2]) ? $urlArray[2] : $config['DEFAULT_ACTION'];

    $controllerInstance = new $controller($model, $controller, $action);
    if (method_exists($controller, $action)) {
        call_user_func(array($controllerInstance,$action));
    } else {
        throw new Exception("No such an action: $action");
    }
}


/** Autoload any classes that are required **/

function __autoload($className) {
    if (file_exists(ROOT_DIRECTORY . '/library/' . ucwords($className) . '.php')) {
        require_once(ROOT_DIRECTORY . '/library/' . ucwords($className) . '.php');
    } else if (file_exists(ROOT_DIRECTORY . '/application/controllers/' . ucwords($className) . '.php')) {
        require_once(ROOT_DIRECTORY . '/application/controllers/' . ucwords($className) . '.php');
    } else if (file_exists(ROOT_DIRECTORY . '/application/models/' . ucwords($className) . '.php')) {
        require_once(ROOT_DIRECTORY . '/application/models/' . ucwords($className) . '.php');
    } else {
        throw new Exception("Can't find a file for the class $className");
    }
}

setErrorReporting();
