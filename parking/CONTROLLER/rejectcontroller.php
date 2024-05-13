<?php
require_once '../MODEL/rejectdbconnection.php'; // Include the model

$table_data = ""; // Initialize variable to hold table data HTML

// SQL query to select all data from the table
$sql = "SELECT NAME, ID, EMAIL,  SLOTNUMBER FROM $table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data in a table format
    while ($row = $result->fetch_assoc()) {
        $table_data .= "<tr>";
        $table_data .= "<td>" . $row["NAME"] . "</td>";
        $table_data .= "<td>" . $row["ID"] . "</td>";
        $table_data .= "<td>" . $row["EMAIL"] . "</td>";
     
        $table_data .= "<td>" . $row["SLOTNUMBER"] . "</td>";
        // Add the delete and accept icons with links to controller.php passing the row ID and action type
    
    }
} else {
    $table_data .= "<tr><td colspan='7'>0 results</td></tr>";
}

// Close connection
$conn->close();
?>
