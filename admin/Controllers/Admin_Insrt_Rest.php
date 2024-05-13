<?php
require_once('../Models/Admin_Db_Functions.php');
session_start();

$Id=$_POST['Id'];
$Name=$_POST['Name'];
$Mobile=$_POST['Mobile'];
$Address=$_POST['Address'];
$Type=$_POST['Type'];
$Rating=$_POST['Rating'];
$Revenue=$_POST['Revenue'];
if(empty($Id) || empty($Name) || empty($Mobile) || empty($Address)){
    $_SESSION['R_Insert2']="yes";
    header("location:../Views/Admin_Restaurants.php");
    return $_SESSION['R_Insert2'];
}
else 
{
    $Status=Rest_Add($Id,$Name,$Mobile,$Address,$Type,$Rating,$Revenue);
    if($Status)
    {
        $_SESSION['R_Insert1']="yes";
	    header("location:../Views/Admin_Restaurants.php");
        return $_SESSION['R_Insert1'];
    }
    else
    {
        $_SESSION['R_Insert3']="yes";
        header("location:../Views/Admin_Restaurants.php");
        return $_SESSION['R_Insert3'];
    }
}

?>
