<?php
require_once('../Models/Admin_Db_Functions.php');
session_start();
$id=$_POST['ID'];
$name=$_POST['Name'];
$status=Employee_Delete($id,$name);
if($status)
{
    $_SESSION['Emp_Delete1']="Yes";
    header("location:../Views/Admin_Employees.php");
    return $_SESSION['Emp_Delete1'];
    
}
else
{
    $_SESSION['Emp_Delete2']="Yes";
    header("location:../Views/Admin_Employees.php");
    return $_SESSION['Emp_Delete2'];
}
?>