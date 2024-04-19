<?php 
   require_once('../Models/alldb.php');
   session_start();
   $user = $_POST['user'];
   $password = $_POST['pass'];
   $status=logCheck($user,$password);

   if($status)
   {
      echo"Login Successfull";
   }
   else{
      header("location:../Views/LoginRegistration.php");
      $_SESSION['mess']="Your ID & Pass is invalid";
   }
?>