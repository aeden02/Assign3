<?php

class Router{
    public $controllers;

    public function __construct(){
        $this->showErrors(0);
        $this->controllers=[]; 
    }

    public function dispatch(){
        $action ="default"; 

        session_start();

        if(isset($_REQUEST['action'])){
            $action = $_REQUEST['action'];
        }else{
            header("Location: home.php?action=404");
            exit();
        }

        if(!$this->securityCheck($action)){
            header("Location: home.php?action=login");
            exit();
        }
        
//Instatiate Contoller for Action and Call Appropriate Method
        $controller = $this->controllers[$action]; 
        $method = $_SERVER['REQUEST_METHOD'];
        if($method=='GET'){
            $controller->get();
        }

        if($method=='POST'){
            $controller->post();
        }
    }

    public function addRoute($action, $controller){
        $this->controllers[$action] = $controller;
    }

    public function securityCheck($action){
        return true; 
    }
    
    public function showErrors($debug){
        if($debug==1){
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        }
    }
}