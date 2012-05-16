<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of table
 *
 * @author charles
 */
class table {
    private $PDO;
    
    public function __construct($table, $PDO, $database) {
        $this->PDO = $PDO;
        $this->table = $table;
        $this->database = $database;
        $this->getTable();
    }
    
    public function getTable(){
        try{
            $query = $this->PDO->prepare("desc $this->table");
            $query->execute();
            $result = $query->fetchAll();
            for($x = 0; $x < count($result); $x++){
                $name = $result[$x]['Field'];
                $this->$name = new column($result[$x]['Field'], $result[$x]['Type'], $this->PDO, $this->database, $this->table);
            }
        } catch (PDOException $exc){
            $this->error[] = $exc->getMessage();
        }
    }
    
    public function prepareQuery($query){
        $this->query = $this->PDO->prepare($query);
    }
    
    public function runQuery($values){
        $i = 0;
        foreach($values as $value){
            $i++;
            $this->query->bindParam($i, $value);
        }
        $this->query->execute();
        return $this->query->fetchAll();
    }
}

?>
