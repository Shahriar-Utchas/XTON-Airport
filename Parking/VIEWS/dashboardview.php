<?php
// Database connection settings
require_once '../MODEL/connectiondb.php';

// Handle form submission to add VIP
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['vip_id']) && isset($_POST['vip_name'])) {
    $vip_id = $_POST['vip_id'];
    $vip_name = $_POST['vip_name'];
    
    // Start transaction
    $conn->begin_transaction();
    
    try {
        // Insert into VIP table
        $stmt = $conn->prepare("INSERT INTO VIP (ID, NAME) VALUES (?, ?)");
        $stmt->bind_param("is", $vip_id, $vip_name);
        
        if ($stmt->execute()) {
            // Delete from original table
            $delete_stmt = $conn->prepare("DELETE FROM ab3 WHERE id = ? AND name = ?");
            $delete_stmt->bind_param("is", $vip_id, $vip_name);
            
            if ($delete_stmt->execute()) {
                echo "Added to VIP and deleted from original table successfully.";
                // Commit transaction
                $conn->commit();
            } else {
                throw new Exception("Error deleting from original table: " . $delete_stmt->error);
            }
        } else {
            throw new Exception("Error inserting into VIP: " . $stmt->error);
        }
    } catch (Exception $e) {
        // Rollback transaction if any error occurs
        $conn->rollback();
        echo $e->getMessage();
    }
    
    $stmt->close();
    if (isset($delete_stmt)) {
        $delete_stmt->close();
    }
}

// SQL query to count occurrences of each id and get the name
$sql = "SELECT id, name, COUNT(id) as count FROM ab3 GROUP BY id, name";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard View</title>
    <link rel="stylesheet" href="../CSS/dashboardview.css">
</head>
<body>
    <h1>Dashboard View</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Count</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["count"] . "</td>";
                    echo "<td>";
                    echo "<form method='POST' action=''>";
                    echo "<input type='hidden' name='vip_id' value='" . $row["id"] . "'>";
                    echo "<input type='hidden' name='vip_name' value='" . $row["name"] . "'>";
                    echo "<button type='submit' class='vip-button'>Send as VIP</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No results found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
    // Close the database connection
    $conn->close();
    ?>

    <form action="requestinformation.php">
        <button class="backbutton">BACK TO HOME</button>
    </form>
</body>
</html>
