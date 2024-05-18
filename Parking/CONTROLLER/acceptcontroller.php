<?php
require_once '../MODEL/acceptdbconnection.php'; 

$table_data = ""; 


$sql = "SELECT NAME, ID, EMAIL,  SLOTNUMBER FROM $table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while ($row = $result->fetch_assoc()) {
        $table_data .= "<tr>";
        $table_data .= "<td>" . $row["NAME"] . "</td>";
        $table_data .= "<td>" . $row["ID"] . "</td>";
        $table_data .= "<td>" . $row["EMAIL"] . "</td>";
     
        $table_data .= "<td>" . $row["SLOTNUMBER"] . "</td>";
     
    
    }
} else {
    $table_data .= "<tr><td colspan='7'>0 results</td></tr>";
}


$conn->close();
?>
