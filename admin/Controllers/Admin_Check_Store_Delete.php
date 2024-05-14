<?php
require_once('../Models/Admin_Db_Functions.php');
session_start();

$id=$_POST['ID'];
$name=$_POST['Name'];
$status=Store_Delete($id,$name);
if($status)
{
    $_SESSION['S_Delete1']="Yes";
    header("location:../Views/Admin_Stores.php");
    return $_SESSION['S_Delete1'];
}
else
{
    $_SESSION['S_Delete2']="Yes";
    header("location:../Views/Admin_Stores.php");
    return $_SESSION['S_Delete2'];
}
?>



