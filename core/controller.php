<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of framework
 *
 * @author charles
 */
class controller {
    
    function __construct() {
        include(BASE_DIR.'/views/head/phpBB3.php');
        $this->user = $user;
    }
    
    public function redirect($location){
        header("Location: $location");
    }
    
    public function load($file, $data){
        if(is_file($file)){
            $data = $data;
            echo BASE_DIR."/".$file;
            include(BASE_DIR."/".$file);
        } else {
            throw new Exception('Unable to locate file '.$file);
        }
    }
}

?>
