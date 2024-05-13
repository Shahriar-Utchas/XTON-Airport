<?php
require_once('../Models/Admin_Db_Functions.php');
$total_pass_served=Admin_Pass_Serve_Show();
$total_flight_operated=Admin_Flight_Operated_Show();
$total_earnings=Admin_Earnings_Show();
$total_expenses=Admin_Expenses_Show();
?>
