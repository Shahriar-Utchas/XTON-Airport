<?php
session_start();
require_once '../Models/alldb.php';
$delete = DeleteAcc($_SESSION['user']);
if($delete){
    session_destroy();
    $_SESSION['dlt'] = "Account Deleted";
}
else{
    $_SESSION['dlt'] = "";
}

?>