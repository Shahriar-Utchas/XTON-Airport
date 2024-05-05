<?php 
require_once('../Models/alldb.php');
session_start();
$fast_food=get_fast_foods();
$lunch=get_lunch();
$coffee=get_coffee();
$cousine=get_interCousine();
?>
