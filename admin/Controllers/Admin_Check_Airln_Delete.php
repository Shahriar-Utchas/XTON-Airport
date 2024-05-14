<?php
require_once('../Models/Admin_Db_Functions.php');
session_start();
$id=$_POST['ID'];
$name=$_POST['Name'];
$status=Airln_Delete($id,$name);
if($status)
{
    $_SESSION['A_Delete1']="Yes";
    header("location:../Views/Admin_Airlines.php");
    return $_SESSION['A_Delete1'];
    
}
else
{
    $_SESSION['A_Delete2']="Yes";
    header("location:../Views/Admin_Airlines.php");
    return $_SESSION['A_Delete2'];
}
?>



