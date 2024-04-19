<?php 
   require_once('../Models/alldb.php');
   session_start();
   $user  = $_POST['userName'];
   $mail  = $_POST['mail'];
   $pass  = $_POST['pass'];
   $Rpass = $_POST['Rpass'];
   if($pass == $Rpass){
      $registration = registration($user,$mail,$pass,$Rpass);
      if($registration){
         echo "Registration Done";
      }
   }else{
      header("location:../Views/LoginRegistration.php");
      $_SESSION['reg']="Your Password mismatched!";
   }
?>