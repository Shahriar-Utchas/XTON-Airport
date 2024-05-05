<?php 
   require_once('../Models/alldb.php');
   session_start();
   $user  = $_POST['userName'];
   $mail  = $_POST['mail'];
   $pass  = $_POST['pass'];
   $Rpass = $_POST['Rpass'];
   $image = $_FILES['img']['tmp_name'];
   if (!empty($image)) {
      $imgContent = addslashes(file_get_contents($image));
   } else {
      $imgContent = '';
   }
    
   if($pass == $Rpass){
      $registration = registration($user,$mail,$pass,$imgContent);
      if($registration){
         $_SESSION['reg2']="Registration Done";
         header("location:../Views/LoginRegistration.php");
      }
   }else{
      header("location:../Views/LoginRegistration.php");
      $_SESSION['reg']="Your Password mismatched!";
   }
?>
