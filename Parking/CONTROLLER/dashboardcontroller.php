<?php
require_once '../MODEL/dashboardconnection.php';

class DashboardController {
    public function showDashboard() {
        $connection = new DashboardConnection();
        $data = $connection->getData();
        return $data;
    }
}
?>
