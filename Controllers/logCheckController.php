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
      if(!empty($_SESSION['restaurant2'])){
      
         header("location:../Views/RestaurentPage.php");
         unset($_SESSION['restaurant2']);
      }
      else{
         header("location:../Views/passengerHome.php");
         unset($_SESSION['restaurant2']);
      }
   }
   else{
      header("location:../Views/LoginRegistration.php");
      $_SESSION['mess']="Your ID & Pass is invalid";
   }
?>