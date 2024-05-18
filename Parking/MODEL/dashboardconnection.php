<?php
class DashboardConnection {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'xton_airport';

    public function getData() {
        $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        





   



}
?>
