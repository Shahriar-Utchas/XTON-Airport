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
if(empty($Id) or empty($Name) or empty($Mobile) or empty($Address)){
    $_SESSION['S_Insert2']="yes";
    header("location:../Views/Admin_Stores.php");
    return $_SESSION['S_Insert2'];
}
else 
{
    $Status=Store_Add($Id,$Name,$Mobile,$Address,$Type,$Rating,$Revenue);
    if($Status)
    {
        $_SESSION['S_Insert1']="yes";
	    header("location:../Views/Admin_Stores.php");
        return $_SESSION['S_Insert1'];
    }
    else
    {
        $_SESSION['S_Insert3']="yes";
        header("location:../Views/Admin_Stores.php");
        return $_SESSION['S_Insert3'];
    }
}

?>
