<?php
require_once '../MODEL/loungeconnectiondb.php'; 

$table_data = ""; 

// SQL query to select all data from the table
$sql = "SELECT NAME, ID, EMAIL, DATE, RESTINGTIME FROM $table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data in a table format
    while ($row = $result->fetch_assoc()) {
        $table_data .= "<tr>";
        $table_data .= "<td>" . $row["NAME"] . "</td>";
        $table_data .= "<td>" . $row["ID"] . "</td>";
        $table_data .= "<td>" . $row["EMAIL"] . "</td>";
        $table_data .= "<td>" . $row["DATE"] . "</td>";
        $table_data .= "<td>" . $row["RESTINGTIME"] . "</td>";
        
    
        $table_data .= "<td>";
        $table_data .= "<a href='../CONTROLLER/loungedelete.php?id=" . $row["ID"] . "&action=delete'>";
        $table_data .= "<img src='img/requestpic/wrongicon.png' alt='Delete' class='delete-icon'>";
        $table_data .= "</a>";
        $table_data .= "<a href='../CONTROLLER/loungedelete_record.php?id=" . $row["ID"] . "&action=accept'>";
        $table_data .= "<img src='img/requestpic/righticon.png' alt='Accept' class='delete-icon'>";
        $table_data .= "</a>";
        $table_data .= "</td>";
        $table_data .= "</tr>";
    }
} else {
    $table_data .= "<tr><td colspan='7'>0 results</td></tr>";
}

// Close connection
$conn->close();
?>
