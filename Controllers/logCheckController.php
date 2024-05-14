<?php 
   require_once('../Models/alldb.php');
   session_start();
   $user = $_POST['user'];
   $password = $_POST['pass'];
   $status=logCheck($user,$password);
   $_SESSION['user']="";
   // $_SESSION['admin']="";

   if($status)
   {    
      // if(!empty($_SESSION['restaurant2'])){
      //       $_SESSION['user'] = $user;
      //       header("location:../Views/RestaurentPage.php");
      //       unset($_SESSION['restaurant2']);
         
      // }
      // else{
         if(!empty($_SESSION['admin'])){
            header("location:../admin/Views/Admin_Dashboard.php");
         }
         else{
            $_SESSION['user'] = $user;
            $_SESSION['admin']="";
            header("location:../Views/passengerHome.php");
         }
         // unset($_SESSION['restaurant2']);
      // }
   }
   else{
      if($user=="parking" && $password=="parking"){
         header("location:../parking/VIEWS/requestinformation.php");
      }
      else if($user=="lounge" && $password=="lounge"){
         header("location:../parking/VIEWS/loungerequestinformation.php");
      }
      else{

         header("location:../Views/LoginRegistration.php");
         $_SESSION['mess']="Your ID & Pass is invalid";
      }
   }
?>