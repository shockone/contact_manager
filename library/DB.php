<?php

class DB {
    /* @var PDO */
    protected $_dbHandle;
    protected $_result;
    protected $_table;

    function __construct() {
        global $config;

        $this->connect($config['DB_HOST'], $config['DB_USER'], $config['DB_PASSWORD'], $config['DB_NAME']);
        $this->_table = strtolower(get_class($this))."s";
    }


    function connect($host, $user, $password, $dbName) {
        $this->_dbHandle = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    }


    function select($id) {
        $statement = $this->_dbHandle->prepare("select * from {$this->_table} where id = :id limit 1");
        if($statement){
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            if($statement->execute()){
                return $statement->fetch();
            }
        }
        return false;
    }


    function selectAll() {
        $statement = $this->_dbHandle->prepare("select * from {$this->_table}");
        if($statement){
            if($statement->execute()){
                return $statement->fetchAll();
            }
        }
        return false;
    }


    function insert(array $data) {
        $data['created_at'] = $data['updated_at'] = date('Y-m-d H:i:s', time());
        $columns_list = join(',', array_keys($data));
        $values_list = join(',', array_map(function($key){return "'" . $this->_dbHandle->quote($key) . "'";}, array_values($data)));

        $query = "INSERT INTO {$this->_table} ($columns_list) values ($values_list)";
        return $this->_dbHandle->query($query);
    }


    function update(array $data) {
        $id = (int)$data['id'];
        if(!$id) throw new Exception('No id in the update statement');
        unset($data['id']);

        $data['updated_at'] = date('Y-m-d H:i:s', time());

        $normalizedData = array();
        foreach ($data as $key => $value) {
            $normalizedData[] = "$key=" . $this->_dbHandle->quote($value);
        }

        $query = "UPDATE {$this->_table} SET " . join(', ', $normalizedData) . "where id = $id";
        return $this->_dbHandle->query($query);
    }


    function __destruct() {
        $this->_dbHandle = null;
    }

}