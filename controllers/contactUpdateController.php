<?php
    require_once 'model/ContactDAO.php';
    require_once 'controllers/Controller.php';


    class ContactUpdateController extends Controller{

      public function get(){
          $contactID=intval($_GET['contactID']);
          $contactDAO = new ContactDAO();
          $contact = $contactDAO->getContact($contactID);
          include "views/contactUpdate-view.php";
      
      }

      public function post(){
        $contact=new Contact(); 
        $contact->contactID = $_POST['contactID'];
        $contact->username = $_POST['username'];
        $contact->email = $_POST['email'];

        $contactDAO = new ContactDAO();
        $contactDAO->updateContact($contact);

        header("Location: home.php?action=list");
        exit; 
      }
    }
    //************************
    //*  Contoller Template  *
    //************************
  //   showErrors(0);  //1 - Turn on Error Display

  //   $method=$_SERVER['REQUEST_METHOD'];
  //   //* Process HTTP GET Request
  //   if($method=='GET'){
  //       $contactID=intval($_GET['contactID']);
  //       $contactDAO = new ContactDAO();
  //       $contact = $contactDAO->getContact($contactID);
  //       include "views/contactUpdate-view.php";
  //       exit;
  //  }
    
  //   //* Process HTTP POST Request
  //   if($method=='POST'){
  //     $contactID = isset($_POST['contactID']) ? intval($_POST['contactID']) : 0;
  //     $username = isset($_POST['username']) ? trim($_POST['username']) : '';
  //     $email = isset($_POST['email']) ? trim($_POST['email']) : '';

  //       $contact = new Contact();
  //       $contact->contactID = $contactID;
  //       $contact->username = $username;
  //       $contact->email = $email;

  //     $contactDAO = new ContactDAO();
  //     $contactDAO->updateContact($contact); 

  //       header("Location: contactListController.php");
  //      exit; 
  //   }
   

  //   function showErrors($debug){
  //       if($debug==1){
  //           ini_set('display_errors', 1);
  //           ini_set('display_startup_errors', 1);
  //           error_reporting(E_ALL);
  //       }
  //   }
?>