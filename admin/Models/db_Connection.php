<?php 
function conn()
{
	$serverName="localhost";
    $userName="root";
    $pass="";
    $dbName="xton_airport";
    $conn=new mysqli($serverName,$userName,$pass,$dbName);
    return $conn;
}
?>

