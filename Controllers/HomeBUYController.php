<?php 
require_once('../Models/alldb.php');
session_start();
if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    $remove = remove_buy($remove_id);
    if ($remove) {
        $_SESSION['remove_status'] ="Removed from cart"; 
       header('location:../Views/PassengerHome.php');
    }
    else{
        $_SESSION['remove_status2'] ="Failed to remove from cart"; 
       header('location:../home.php');
    }
}
?>