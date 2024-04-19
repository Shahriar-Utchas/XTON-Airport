<?php 
function conn(){
    $server ="localhost";
    $userName="root";
    $pass="";
    $db_Name="xton_airport";
    $conn="";
    try{
         $conn = mysqli_connect("$server","$userName","$pass","$db_Name");
    }
    catch(mysqli_sql_exception){
         echo"Database Couldn't Connect! <br>";
    }
    return $conn;
}
?>