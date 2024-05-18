<?php
class ProfileDBConnection {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "xton_airport";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>
