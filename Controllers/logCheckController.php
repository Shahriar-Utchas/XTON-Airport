<?php 
   require_once('../Models/alldb.php');
   session_start();
   $user = $_POST['user'];
   $password = $_POST['pass'];
   $status=logCheck($user,$password);
   $_SESSION['user']="";

   if($status)
   {
      $_SESSION['user']=$user;
      header("location:../Views/passengerHome.php");
   }
   else{
      header("location:../Views/LoginRegistration.php");
      $_SESSION['mess']="Your ID & Pass is invalid";
   }
?>
