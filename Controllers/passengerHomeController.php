<?php 
require_once('../Models/alldb.php');
session_start();
$user = $_POST['user'];
$password = $_POST['pass'];
$email = $_POST['email'];
$image = $_FILES['img']['tmp_name'];
if (!empty($image)) {
    $imgContent = addslashes(file_get_contents($image));
 } else {
    $imgContent = '';
 }

if(empty($user) && empty($password) && empty($email) && empty($imgContent)){
    header("location:../Views/passengerHome.php");
    $_SESSION['updateMT']="Please";
}else{
    if(!empty($user)) {
        $updateUser = updateUser($user,$_SESSION['user']);
        if($updateUser){
            $updatecart = updateCart($user,$_SESSION['user']);
            $updateBuy = updateBuy($user,$_SESSION['user']);
            $_SESSION['user']=$user;
            $_SESSION['updateUser']="User";
            header("location:../Views/passengerHome.php");
        }
    }
    if(!empty($password)) {
        $updatePass = updatePass($password,$_SESSION['user']);
        if($updatePass){
            $_SESSION['updateUser']="Password";
            header("location:../Views/passengerHome.php");
        }
    }
    if(!empty($email)) {
        $updateEmail = updateEmail($email,$_SESSION['user']);
        if($updateEmail){
            $_SESSION['updateUser']="Email";
            header("location:../Views/passengerHome.php");
        }
    }
    if(!empty($imgContent)) {
        $updateImg = updateImg($imgContent,$_SESSION['user']);
        if($updateImg){
            $_SESSION['updateUser']="Image";
            header("location:../Views/passengerHome.php");
        }
    }

}
?>