<?php
require_once('../Models/Admin_Db_Functions.php');
session_start();

$id=$_POST['ID'];
$name=$_POST['Name'];
$Mobile=$_POST['Mobile'];
$Address=$_POST['Address'];
$Type=$_POST['Type'];
$status=Rest_Update($id,$name,$Mobile,$Address,$Type);
if($status)
{
    $_SESSION['R_Update1']="Yes";
    header("location:../Views/Admin_Restaurants.php");
    return $_SESSION['R_Update1'];
}
else
{
    $_SESSION['R_Update2']="Yes";
    header("location:../Views/Admin_Restaurants.php");
    return $_SESSION['R_Update2'];
}
?>