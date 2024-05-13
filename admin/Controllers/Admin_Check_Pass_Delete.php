<?php
require_once('../Models/Admin_Db_Functions.php');
session_start();
$user=$_POST['User'];
$status=Passenger_Delete($user);
if($status)
{
    $_SESSION['Pass_Delete1']="Yes";
    header("location:../Views/Admin_Passenger.php");
    return $_SESSION['Pass_Delete1'];
    
}
else
{
    $_SESSION['Pass_Delete2']="Yes";
    header("location:../Views/Admin_Passenger.php");
    return $_SESSION['Pass_Delete2'];
}
?>