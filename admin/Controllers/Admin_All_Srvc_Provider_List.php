<?php
require_once('../Models/Admin_Db_Functions.php');
// Check if the Delete button is pressed
if (isset($_POST['Delete'])) {
    $Provider_Id = $_POST['Provider_Id'];
    $status=deleteService_Provider($Provider_Id);
    header("location:../Views/Admin_Service_Provider.php");
}
$List=Srvc_Provider_List();
?>
