<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "xton_airport"; 
$table = "ab3"; 
$rejectTable = "REJECT"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch data of the row to be deleted
    $sqlSelect = "SELECT NAME, ID, EMAIL, SLOTNUMBER FROM $table WHERE ID = $id";
    $resultSelect = $conn->query($sqlSelect);

    if ($resultSelect->num_rows > 0) {
        // Data found, fetch and store in REJECT table
        $row = $resultSelect->fetch_assoc();
        $name = $row["NAME"];
        $email = $row["EMAIL"];
        $slotNumber = $row["SLOTNUMBER"];

        
        
        // Insert data into REJECT table
        $sqlInsert = "INSERT INTO $rejectTable (NAME, ID, EMAIL, SLOTNUMBER) VALUES ('$name', '$id', '$email', '$slotNumber')";
        if ($conn->query($sqlInsert) === TRUE) {
            // Data inserted into REJECT table successfully, now delete from original table
            $sqlDelete = "DELETE FROM $table WHERE ID = $id LIMIT 1"; // Limiting to delete only one row
            if ($conn->query($sqlDelete) === TRUE) {
                // Redirect back to the requestinformation.php page
                header("Location:../VIEWS/requestinformation.php");
                exit(); // Make sure to stop execution after redirection
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        } else {
            echo "Error inserting record into REJECT table: " . $conn->error;
        }
    } else {
        echo "No data found for ID: $id";
    }
}

// Close connection
$conn->close();
?>
