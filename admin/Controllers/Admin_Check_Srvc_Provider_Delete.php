<?php
require_once('../Models/Admin_Db_Functions.php');
session_start();

$id=$_POST['ID'];
$name=$_POST['Name'];
$status=Srvc_Provider_Delete($id,$name);
if($status)
{
    $_SESSION['Sp_Delete1']="Yes";
    header("location:../Views/Admin_Service_Provider.php");
    return $_SESSION['Sp_Delete1'];
}
else
{
    $_SESSION['Sp_Delete2']="Yes";
    header("location:../Views/Admin_Service_Provider.php");
    return $_SESSION['Sp_Delete2'];
}
?>



