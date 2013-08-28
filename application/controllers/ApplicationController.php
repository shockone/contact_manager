<?php

class ApplicationController {
    protected $_model;
    protected $_controller;
    protected $_action;
    protected $_view;
    protected $_params;

    function __construct($model, $controller, $action) {
        $this->_model = $model;
        $this->_controller = $controller;
        $this->_action = $action;
        $this->_view = new View($this);
        $this->_params = $_REQUEST;
    }

    function redirect($controller, $action) {
        header("Location: /$controller/$action");
    }
}