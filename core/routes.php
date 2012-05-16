<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of routes
 *
 * @author charles
 */
class routes {
    //put your code here
    public function __construct() {
        $this->pathInfo = explode('/', substr($_SERVER['PATH_INFO'], 1));
        $this->values = array();
        $this->controller = $this->pathInfo[0];
        $this->method = $this->pathInfo[1];
        $this->pathInfo = explode('/', substr($_SERVER['PATH_INFO'], 1));
        for($x = 2; $x < count($this->pathInfo); $x++){
            $this->values[] = $this->pathInfo[$x];
        }
        chdir(BASE_DIR);
        $this->loadController();

    }
    
    private function loadController(){
        $controller = $this->controller;
        $method     = $this->method;
        if(empty($controller)) {
            $controller = config::$routes['default'];
        } else {
        $controller = config::$routes[$controller."/".$method];
        }
        $controller = explode("/", $controller);
        $method     = $controller[1];
        $controller = $controller[0];
        if(!is_file(BASE_DIR.'/controllers/'.$controller.'.php')){
            $this->redirect('http://'.BASE_URL.'/errors/notfound');
        }
        include('controllers/'.$controller.'.php');
        $controller = new $controller();
        if(!method_exists($controller, $method)) $this->redirect("http://".BASE_URL.'/errors/methodnotfound');
        call_user_method_array($method, $controller, $this->values);
    }
}

?>
