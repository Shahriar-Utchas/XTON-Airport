<?php
require_once('../Models/Admin_Db_Functions.php');
session_start();

$id=$_POST['ID'];
$name=$_POST['Name'];
$Mobile=$_POST['Mobile'];
$Destination=$_POST['Destination'];
$Type=$_POST['Type'];
$status=Airln_Update($id,$name,$Mobile,$Destination,$Type);
if($status)
{
    $_SESSION['A_Update1']="Yes";
    header("location:../Views/Admin_Airlines.php");
    return $_SESSION['A_Update1'];
}
else
{
    $_SESSION['A_Update2']="Yes";
    header("location:../Views/Admin_Airlines.php");
    return $_SESSION['A_Update2'];
}
?>