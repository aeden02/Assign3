<?php
    require_once 'Router.php';
    require_once 'controllers/contactListController.php';
    require_once 'controllers/contactAddController.php';
    require_once 'controllers/contactUpdateController.php';
    require_once 'controllers/contactDeleteController.php';

    $router = new Router();
    $router->showErrors(0);  //1 - Turn on Error Display

    $router->addRoute("list", new ContactListController());
    $router->addRoute("add", new ContactAddController());
    $router->addRoute("update", new ContactUpdateController());
    $router->addRoute("delete", new ContactDeleteController());

    $router->dispatch(); 
?>