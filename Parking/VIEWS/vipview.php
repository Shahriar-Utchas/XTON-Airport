<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIP List</title>
    <link rel="stylesheet" href="../CSS/vipview.css">
</head>
<body>
    <?php
    // Include the connection setup
    require_once '../MODEL/connectiondb.php';

    // SQL query to fetch data
    $sql = "SELECT ID, NAME FROM VIP";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<h1> VIP LIST </h1>";
        echo "<table border='1'><tr><th>ID</th><th>Name</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["NAME"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    // Close connection
    $conn->close();
    ?>
            <form action="requestinformation.php">
               
                 <button class="backbutton" >BACK TO HOME</button>
            </form>


</body>
</html>
