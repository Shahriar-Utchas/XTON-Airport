<?php
require_once('../Models/Admin_Db_Functions.php');
// Check if the Delete button is pressed
if (isset($_POST['Delete'])) {
    $user_id = $_POST['user'];
    $status=deletePassenger($user_id);
    header("location:../Views/Admin_Passenger.php");
}
$List=Passenger_List();
?>
