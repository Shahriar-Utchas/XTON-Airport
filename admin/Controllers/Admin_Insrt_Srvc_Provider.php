<?php
require_once('../Models/Admin_Db_Functions.php');
session_start();

$Id=$_POST['Id'];
$Name=$_POST['Name'];
$Pass=$_POST['Password'];
$Mobile=$_POST['Mobile'];
$Email=$_POST['Email'];
$Address=$_POST['Address'];
if(isset($_FILES['Image']) && $_FILES['Image']['size'] > 0) {
$Image=addslashes(file_get_contents($_FILES['Image']['tmp_name']));}
$Salary=$_POST['Salary'];
$Ratings=$_POST['Ratings'];
$Gender=$_POST['Gender'];
if(empty($Id) || empty($Name) || empty($Pass) || empty($Mobile)){
    $_SESSION['Sp_Insert2']="yes";
    header("location:../Views/Admin_Service_Provider.php");
    return $_SESSION['Sp_Insert2'];
}
else 
{
    $Status=Service_Provider_Add($Id,$Name,$Pass,$Mobile,$Email,$Address,$Image,$Salary,$Ratings,$Gender);
    if($Status)
    {
        $_SESSION['Sp_Insert1']="yes";
	    header("location:../Views/Admin_Service_Provider.php");
        return $_SESSION['Sp_Insert1'];
    }
    else
    {
        $_SESSION['Sp_Insert3']="yes";
        header("location:../Views/Admin_Service_Provider.php");
        return $_SESSION['Sp_Insert3'];
    }
}

?>
