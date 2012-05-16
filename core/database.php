<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Trying to do an ORM based solution.
 *
 * @author charles
 */
class database {
    
    protected $error = array(), $tables = array();
    /* @var $PDO PDO */ 
    private $PDO;
    public function __construct($database) {
        $this->database = $database;
        include(__DIR__.'/config.php');
        foreach(config::$config as $key=>$value){
            $this->$key = $value;
        }
        $this->initialize();
        $this->getTableNames();
    }
    
    private function initialize(){
        try {
            $this->PDO = new PDO("mysql:host={$this->host};dbname=$this->database", $this->user, $this->password);
            $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (PDOException $exc) {
            echo $exc->getmessage();
        }
        return $PDO;
    }
    
    private function getTableNames(){
        try{
            $query = $this->PDO->prepare("SHOW TABLES FROM $this->database");
            $query->execute();
            $result = $query->fetchAll();
            foreach($result as $row){
                $this->tables[] = $row[0];
            }
        } catch (PDOException $exc){
            $this->error[] = $exc->getMessage();
            return null;
        }
    }
    
    public function getTable($table){
        if(!in_array($table, $this->tables)) {
            throw new Exception("$table is not a valid table in database $this->database");
            return false;
        }
        return new table($table, $this->PDO, $this->database);
    }
    
}

