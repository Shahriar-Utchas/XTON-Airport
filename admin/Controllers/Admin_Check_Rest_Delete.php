<?php
require_once('../Models/Admin_Db_Functions.php');
session_start();
$id=$_POST['ID'];
$name=$_POST['Name'];
$status=Rest_Delete($id,$name);
if($status)
{
    $_SESSION['R_Delete1']="Yes";
    header("location:../Views/Admin_Restaurants.php");
    return $_SESSION['R_Delete1'];
    
}
else
{
    $_SESSION['R_Delete2']="Yes";
    header("location:../Views/Admin_Restaurants.php");
    return $_SESSION['R_Delete2'];
}
?>



