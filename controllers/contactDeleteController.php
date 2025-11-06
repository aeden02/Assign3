<?php
    require_once 'model/ContactDAO.php';
    require_once 'controllers/Controller.php';


    class ContactDeleteController extends Controller{

      public function get(){
          $contactID=intval($_GET['contactID']);
          $contactDAO = new ContactDAO();
          $contact = $contactDAO->getContact($contactID);
          include "views/contactDelete-view.php";
      
      }

      public function post(){
        $contactID = isset($_POST['contactID']) ? intval($_POST['contactID']) : 0;
        $submit = isset($_POST['submit']) ? $_POST['submit'] : '';
        if($contactID > 0 && $submit=='Confirm'){
            $contactDAO = new ContactDAO();
            $contactDAO->deleteContact($contactID);
        }
       
       header("Location: home.php?action=delete");
        exit;
      }
    }

    //************************
    //*  Contoller Template  *
    //************************
//     showErrors(0);  //1 - Turn on Error Display

//     $method=$_SERVER['REQUEST_METHOD'];
//     //* Process HTTP GET Request
//     if($method=='GET'){
//         $contactID=intval($_GET["contactID"]);
//         $contactDAO = new ContactDAO();
//         $contact = $contactDAO->getContact($contactID);

//         include "views/contactDelete-view.php";
//         exit;
        
//    }
    
//     //* Process HTTP POST Request
//      if($method=='POST'){
//         $contactID = isset($_POST['contactID']) ? intval($_POST['contactID']) : 0;
//         $submit = isset($_POST['submit']) ? $_POST['submit'] : '';
//         if($contactID > 0 && $submit=='Confirm'){
//             $contactDAO = new ContactDAO();
//             $contactDAO->deleteContact($contactID);
//         }
       
//        header("Location: contactListController.php");
//         exit;
//     }
   

//     function showErrors($debug){
//         if($debug==1){
//             ini_set('display_errors', 1);
//             ini_set('display_startup_errors', 1);
//             error_reporting(E_ALL);
//         }
//     }
?>