<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of query
 *
 * @author charles
 */
class query {
    
    private $parameters = array();
    private $query, $database, $table, $type;
    public $statement;
    public function __construct($type, $tableobject) {
        $this->database     = $tableobject->database;
        $this->table        = $tableobject->table;
        $this->type         = $type;
        
        switch (strtolower($type)) {
            case 'select':
                $this->statement = $this->select();
                break;
            case 'count':
                $this->statement = $this->count();
                break;
            case 'delete':
                $this->statement = $this->delete();
                break;
            case 'update':
                $this->statement = $this->update();
                break;
        }
    }
    
    private function select(){
        $statement = "SELECT * FROM $this->database.$this->table WHERE";
        return $statement;
    }
    
    private function count(){
        $statement = "SELECT COUNT(*) as count FROM $this->database.$this->table WHERE";
        return $statement;
    }
    
    private function delete(){
        $statement = "DELETE FROM $this->database.$this->table WHERE";
        return $statement;
    }
    
    private function update(){
        $statement = "UPDATE $this->database.$this->table SET";
        return $statement;  
    }
    
    public function addParameter($field, $operand, $value){
        $this->parameters[] = array("$field $operand ?", "$value");
    }
    
    public function finalize(){
        if(is_array($this->parameters)){
            $i = 0;
            foreach ($this->parameters as $value){
                $i++;
                $this->statement .= " $value[0] ";
                $this->bindVals[] = $value[1];
                if(count($this->parameters) > 1 && count($this->parameters) != $i){
                    $this->statement .= " AND";
                }
            }
        }
    }
    
    public function getParameters(){
        return $this->parameters;
    }
    
    public function getStatement(){
        return $this->statement;
    }
}

?>
