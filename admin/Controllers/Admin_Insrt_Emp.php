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
$Role=$_POST['Role'];
$Ratings=$_POST['Ratings'];
$Gender=$_POST['Gender'];
if(empty($Id) || empty($Name) || empty($Pass) || empty($Mobile)){
    $_SESSION['Emp_Insert2']="yes";
    header("location:../Views/Admin_Employees.php");
    return $_SESSION['Emp_Insert2'];
}
else 
{
    $Status=Employee_Add($Id,$Name,$Pass,$Mobile,$Email,$Address,$Image,$Salary,$Role,$Ratings,$Gender);
    if($Status)
    {
        $_SESSION['Emp_Insert1']="yes";
	    header("location:../Views/Admin_Employees.php");
        return $_SESSION['Emp_Insert1'];
    }
    else
    {
        $_SESSION['Emp_Insert3']="yes";
        header("location:../Views/Admin_Employees.php");
        return $_SESSION['Emp_Insert3'];
    }
}

?>
