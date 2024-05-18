<?php
require_once('../Models/Admin_Db_Functions.php');
// Check if the Delete button is pressed
if (isset($_POST['Delete'])) {
    $Store_Id = $_POST['Store_Id'];
    $status=deleteStore($Store_Id);
    header("location:../Views/Admin_Stores.php");
}
$List=Store_List();
?>
