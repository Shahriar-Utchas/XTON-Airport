<?php

// Database connection parameters
$servername = "localhost"; // Change this if your MySQL server is on a different host
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "xton_airport"; // Your database name
$table = "LOUNGEHISTORY"; // Your table name
$acceptTable = "LOUNGEACCEPT"; // Your reject table name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch data of the row to be deleted
    $sqlSelect = "SELECT NAME, ID, EMAIL, DATE,RESTINGTIME FROM $table WHERE ID = $id";
    $resultSelect = $conn->query($sqlSelect);

    if ($resultSelect->num_rows > 0) {
        // Data found, fetch and store in ACCEPT table
        $row = $resultSelect->fetch_assoc();
        $name = $row["NAME"];
        $email = $row["EMAIL"];
        $slotNumber = $row["RESTINGTIME"];
        
        // Insert data into ACCEPT table
        $sqlInsert = "INSERT INTO $acceptTable (NAME, ID, EMAIL, RESTINGTIME) VALUES ('$name', '$id', '$email', '$slotNumber')";
        if ($conn->query($sqlInsert) === TRUE) {
            // Data inserted into ACCEPT table successfully, now delete from original table
            $sqlDelete = "DELETE FROM $table WHERE ID = $id LIMIT 1"; // Limiting to delete only one row
            if ($conn->query($sqlDelete) === TRUE) {
                // Redirect back to the requestinformation.php page
                header("Location:../VIEWS/loungerequestinformation.php");
                exit(); // Make sure to stop execution after redirection
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        } else {
            echo "Error inserting record into LOUNGEACCEPT table: " . $conn->error;
        }
    } else {
        echo "No data found for ID: $id";
    }
}

// Close connection
$conn->close();
?>
