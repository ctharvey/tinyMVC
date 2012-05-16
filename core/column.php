<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of column
 *
 * @author charles
 */
class column {
    
    private $field, $type, $length, $PDO;
    
    public function __construct($field, $type, $PDO, $database, $table) {
        $this->field = $field;
        $this->type = $type;
        $this->PDO = $PDO;
        $this->database = $database;
        $this->table = $table;
        $this->getLength();
    }
    
    private function getLength(){
        $type = explode("(", $this->type);
        $type = str_replace(")", "", $type);
        $this->length = $type[1];
    }
    
    public function getOne($value){
        $query = $this->PDO->prepare("SELECT * FROM $this->database.$this->table WHERE $this->field = :value");
        $query->bindParam(':value', $value);
        $query->execute();
        $result = $query->fetchAll();
        return $result[0];
    }
    
    public function get($value){
        $query = $this->PDO->prepare("SELECT * FROM $this->database.$this->table WHERE $this->field = :value");
        $query->bindParam(':value', $value);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
    
    private function determineType(){
        if(strstr($this->type, 'int')) return 'int';
        if(strstr($this->type, 'char')) return 'mixed';
        return 'text';
    }
}

?>
