<?php
require_once('../Models/Admin_Db_Functions.php');
session_start();

$name=$_POST['Name'];
$password=$_POST['Password'];
$address=$_POST['Address'];
$mobile=$_POST['Mobile'];
$email=$_POST['Email'];
if(isset($_FILES['Image']) && $_FILES['Image']['size'] > 0) {
$image=addslashes(file_get_contents($_FILES['Image']['tmp_name']));}
$status=Admin_Update($name,$password,$address,$mobile,$email,$image);
if($status)
{
    $_SESSION['Ad_Update1']="Yes";
    header("location:../Views/Admin_Settings.php");
    return $_SESSION['Ad_Update1'];
}
else
{
    $_SESSION['Ad_Update2']="Yes";
    header("location:../Views/Admin_Settings.php");
    return $_SESSION['Ad_Update2'];
}
?>