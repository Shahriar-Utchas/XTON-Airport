<?php
require_once '../MODEL/profiledbconnection.php';

class ProfileController {
    private $db;

    public function __construct() {
        $this->db = new ProfileDBConnection();
    }

    public function getAllProfiles() {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM PROFILE";
        $result = $conn->query($sql);
        $profiles = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $profiles[] = $row;
            }
        }
        return $profiles;
    }
}
?>
