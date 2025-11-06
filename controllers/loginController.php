<?php
require_once 'controllers/Controller.php';
require_once 'model/UserDAO.php';

class LoginController extends Controller{
    public function get(){
        include "views/contactLogin-view.php";
    }

    public function post(){
        $userDAO = new UserDAO();
        $username = $_POST['username'];
        $passwd = $_POST['passwd'];
        $user = $userDAO->authenticate($username, $passwd);
        if($user!=NULL){
            $_SESSION["loggedIn"] = $user; 
        }

        header("Location: home.php?action=list");
        exit(); 
    }

}