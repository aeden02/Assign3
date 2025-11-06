<?php

class Router{
    public $controllers;

    public function __construct(){
        $this->showErrors(0);
        $this->controllers=[]; 
    }

    public function dispatch(){
        $action ="default"; 

        if(isset($_REQUEST['action'])){
            $action = $_REQUEST['action'];
        }

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
    
    public function showErrors($debug){
        if($debug==1){
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        }
    }
}