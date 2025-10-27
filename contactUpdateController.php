<?php
    require_once 'model/ContactDAO.php';

    //************************
    //*  Contoller Template  *
    //************************
    showErrors(0);  //1 - Turn on Error Display

    $method=$_SERVER['REQUEST_METHOD'];
    //* Process HTTP GET Request
    if($method=='GET'){
        $contactID=$_GET['contactID'];
        $contactDAO = new ContactDAO();
        $contact = $contactDAO->getContact($contactID);
        
        include "views/contactUpdate-view.php";
        exit;
   }
    
    //* Process HTTP POST Request
    if($method=='POST'){
      $contact = new Contact();
      $contact ->contactID = $_POST['contactID'];
      $contact->username = $_POST['username'];
      $contact->email = $_POST['email']; 

      $contactDAO = new ContactDAO();
      $contactDAO->updateContact($contact); 

        header("Location: contactListController.php");
       exit; 
    }
   

    function showErrors($debug){
        if($debug==1){
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        }
    }
?>