<?php

class Config implements ArrayAccess {
    private $collection = array();

    function get($key){
        if(isset($this->collection[$key])){
            return $this->collection[$key];
        }
        return false;
    }

    function set($key, $value){
        $this->collection[$key] = $value;
    }

    function offsetExists($offset) {
        return isset($this->collection[$offset]);
    }


    function offsetGet($offset) {
        return $this->get($offset);
    }


    function offsetSet($offset, $value) {
        $this->set($offset, $value);
    }


    function offsetUnset($offset) {
        unset($this->collection[$offset]);
    }
}

$config = new Config();

$config['DEVELOPMENT_ENVIRONMENT'] = 1;

$config['DB_HOST']     = 'tunnel.pagodabox.com';
//$config['DB_HOST']     = '127.0.0.1';
$config['DB_NAME']     = 'db';
$config['DB_PORT']     = 3308;
$config['DB_USER']     = 'priscila';
$config['DB_PASSWORD'] = 'wzpGsWHM';

$config['DEFAULT_CONTROLLER'] = 'ContactsController';
$config['DEFAULT_ACTION']     = 'index';