<?php
require_once('../Models/Admin_Db_Functions.php');
// Check if the Delete button is pressed
if (isset($_POST['Delete'])) {
    $Emp_Id = $_POST['Emp_Id'];
    $status=deleteEmployee($Emp_Id);
    header("location:../Views/Admin_Employees.php");
}
$List=Employee_List();
?>
