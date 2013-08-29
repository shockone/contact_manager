<?php
class ApplicationModel extends DB {
    protected $id = null;

    function __construct($params = null) {
        if($params){
            $this->setProperties($params);
        }
        parent::__construct();
    }

    public static function load($id) {
        $db = new static();
        $properties = $db->select($id);
        return new self($properties);
    }

    public static function loadJSON($id) {
        $db = new static();
        $properties = $db->select($id);
        return json_encode($properties);
    }

    public static function loadAll() {
        $db = new static();
        $propertiesArray = $db->selectAll();
        $models = array();
        foreach($propertiesArray as $properties){
            $models[] = new static($properties);
        }
        return $models;
    }

    public static function remove($id) {
        $db = new static();
        return $db->delete($id);

    }


    function save() {
        if(!$this->validate()) return false;
        if($this->id){
            return $this->update($this->getProperties());
        } else {
            return $this->insert($this->getProperties());
        }
    }


    protected function setProperties($params) {
        if(!isset($params['id'])) {
            $params['id'] = 0;
        }
        foreach(array_keys($this->getProperties()) as $property){
            $this->$property = $params[$property];
        }
    }

    protected function getProperties(){
        $properties = null;
        foreach(get_object_vars($this) as $key => $value){
            if($key[0] == '_') continue;
            $properties[$key] = $value;
        }
        return $properties;
    }

    function __call($method, $params) {

        //Strip first three characters and convert camel case to underscores.
        $property = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', substr($method, 3)));
        if (strncasecmp($method, "get", 3) == 0) {
            return $this->$property;
        }
    }

    protected function validate(){
        return true;
    }

    protected function validatePresence($property){
        return (bool) $property;
    }

    protected function validateNumericality($property, $onlyInteger = true) {
        if($onlyInteger){
            $pattern = '/^[+-]?\d+$/';
        } else {
            $pattern = '/^[+-]?\d+(\.\d+)?$/';
        }
        return preg_match($pattern, $property);
    }

    protected function validateEmail($property) {
        return preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $property);
    }
}