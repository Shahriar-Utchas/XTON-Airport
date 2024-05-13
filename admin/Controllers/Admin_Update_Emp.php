<?php
require_once('../Models/Admin_Db_Functions.php');
session_start();

$id=$_POST['Id'];
$name=$_POST['Name'];
$n_name=$_POST['N_Name'];
$mobile=$_POST['Mobile'];
$email=$_POST['Email'];
$address=$_POST['Address'];
if(isset($_FILES['Image']) && $_FILES['Image']['size'] > 0) {
$image=addslashes(file_get_contents($_FILES['Image']['tmp_name']));}
$salary=$_POST['Salary'];
$role=$_POST['Role'];
$status=Employee_Update($id,$name,$n_name,$mobile,$email,$address,$image,$salary,$role);
if($status)
{
    $_SESSION['Emp_Update1']="Yes";
    header("location:../Views/Admin_Employees.php");
    return $_SESSION['Emp_Update1'];
}
else
{
    $_SESSION['Emp_Update2']="Yes";
    header("location:../Views/Admin_Employees.php");
    return $_SESSION['Emp_Update2'];
}
?>