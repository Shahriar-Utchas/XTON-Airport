<?php
require_once('../Models/Admin_Db_Functions.php');
// Check if the Delete button is pressed
if (isset($_POST['Delete'])) {
    $Airlines_Id = $_POST['Airlines_Id'];
    $status=deleteAirlines($Airlines_Id);
    header("location:../Views/Admin_Airlines.php");
}
$List=Airln_List();
?>
