<?php
require_once('../Models/Admin_Db_Functions.php');
// Check if the Delete button is pressed
if (isset($_POST['Delete'])) {
    $Rest_Id = $_POST['Rest_Id'];
    $status=deleteRestaurant($Rest_Id);
    header("location:../Views/Admin_Restaurants.php");
}
$List=Rest_List();
?>
