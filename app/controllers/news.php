<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of news
 *
 * @author charles
 */
class news extends controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function page(){
    }
    
    public function view($var2, $var3, $page = 0){
        var_dump($var3);
        var_dump($page);
        var_dump($var2);
    }
    
}

?>
