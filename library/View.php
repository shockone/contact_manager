<?php

class View {
    public $controller;
    protected $_layout;


    function __construct($controller){
        $this->controller = $controller;
        $this->_layout = 'application';
    }

    // TODO: Automatically render the current action if params aren't specified
    function render($controller, $action){
        $controller = preg_replace('/Controller$/', '', $controller);
        if($this->_layout){
            $layoutDirectory = ROOT_DIRECTORY . '/application/views/layouts/' . $this->_layout;
            require_once($layoutDirectory .'/header.php');
        }

        require_once(ROOT_DIRECTORY . "/application/views/$controller/$action.php");

        if($this->_layout){
            require_once($layoutDirectory .'/footer.php');
        }
    }

    function setLayout($layout){
        $this->_layout = $layout;
    }

    function unsetTemplate(){
        $this->_layout = null;
    }
}