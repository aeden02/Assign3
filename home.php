<?php
    require_once 'Router.php';
    require_once 'controllers/contactListController.php';
    require_once 'controllers/contactAddController.php';
    require_once 'controllers/contactUpdateController.php';
    require_once 'controllers/contactDeleteController.php';


    class MyRouter extends Router{ 

        public function securityCheck($action){
            $result = true; 

            $controller=$this->controllers[$action];
            if($controller->getAccess()=="protected"){
                if(!isset($_SESSION["loggedIn"])){
                    $result = false; 
                }
            }
            return $result;
        }

    }
    
    $router = new MyRouter();
    $router->showErrors(0);  //1 - Turn on Error Display

    $router->addRoute("login", new LoginController());
    $router->addRoute("list", new ContactListController());
    $router->addRoute("add", new ContactAddController());
    $router->addRoute("update", new ContactUpdateController());
    $router->addRoute("delete", new ContactDeleteController());

    $router->dispatch(); 

    
?>