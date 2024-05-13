<?php
require_once('../Models/Admin_Db_Functions.php');
session_start();

$Id=$_POST['Id'];
$Name=$_POST['Name'];
$Mobile=$_POST['Mobile'];
$Destination=$_POST['Destination'];
$Type=$_POST['Type'];
$Rating=$_POST['Rating'];
$Revenue=$_POST['Revenue'];
if(empty($Id) || empty($Name) || empty($Mobile) || empty($Destination)){
    $_SESSION['A_Insert2']="yes";
    header("location:../Views/Admin_Airlines.php");
    return $_SESSION['A_Insert2'];
}
else 
{
    $Status=Airln_Add($Id,$Name,$Mobile,$Destination,$Type,$Rating,$Revenue);
    if($Status)
    {
        $_SESSION['A_Insert1']="yes";
	    header("location:../Views/Admin_Airlines.php");
        return $_SESSION['A_Insert1'];
    }
    else
    {
        $_SESSION['A_Insert3']="yes";
        header("location:../Views/Admin_Airlines.php");
        return $_SESSION['A_Insert3'];
    }
}

?>
