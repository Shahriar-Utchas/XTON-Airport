
<!DOCTYPE html>
<html>
<head>
    <title>Confirmation Page</title>
    <link rel="stylesheet" href="../CSS/confirm.css">
    <script>
        function printDetails() {
            window.print(); // Print the page
        }
        function showAlertAndRedirect(message) {
            alert(message);
            window.location.href = '../SCHEDULE2/schedule2.php'; // Redirect back to schedule2.php
        }
        function validateForm() {
            var id = document.forms["confirmationForm"]["id"].value;
            var date = document.forms["confirmationForm"]["date"].value;
            var time = document.forms["confirmationForm"]["time"].value;
            var slots = document.forms["confirmationForm"]["selected_slot"];
            var countSelectedSlots = 0;
            for (var i = 0; i < slots.length; i++) {
                if (slots[i].checked) {
                    countSelectedSlots++;
                }
            }
            if (countSelectedSlots != 1) {
                showAlertAndRedirect('Please select only one slot.');
                return false;
            }
            if (id == "" || date == "" || time == "") {
                showAlertAndRedirect('Please fill in all fields.');
                return false;
            }
        }
    </script>
</head>
<body>


<?php
// Database connection
$hostname = "localhost"; // Change this to your MySQL hostname
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "xton_airport"; // Change this to your MySQL database name

$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $selectedSlot = $_POST["selected_slot"];
    
    // Validate form data
    if (count($selectedSlot) != 1) {
        echo "<script>showAlertAndRedirect('Please select only one slot.');</script>";
        exit(); // Stop further execution
    }
    if (empty($id) || empty($date) || empty($time)) {
        echo "<script>showAlertAndRedirect('Please fill in all fields.');</script>";
        exit(); // Stop further execution
    }
    
    // Convert the selected slot array to string
    $selectedSlot = $selectedSlot[0];
    
    // Check if the selected date, time, and slot number match any existing row in the database
    $check_query = "SELECT * FROM ab2 WHERE DATE = ? AND TIME = ? AND SLOTNUMBER = ?";
    $stmt_check = $conn->prepare($check_query);
    $stmt_check->bind_param("sss", $date, $time, $selectedSlot);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        // If there's a match, display a pop-up message and redirect back to schedule2.php
        echo "<script>showAlertAndRedirect('The selected date, time, and slot number are already booked. Please choose another slot.');</script>";
    } else {
        // Proceed with updating the database since no duplicate record found
        $update_query = "UPDATE ab2 SET DATE = ?, TIME = ?, SLOTNUMBER = ? WHERE ID = ?";
        $stmt_update = $conn->prepare($update_query);
        $stmt_update->bind_param("ssss", $date, $time, $selectedSlot, $id);
        
        if ($stmt_update->execute() === TRUE) {
            // Insert data into ab3 table
            $insert_query = "INSERT INTO ab3 (NAME, ID, EMAIL, DATE, TIME, SLOTNUMBER) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt_insert = $conn->prepare($insert_query);
            $stmt_insert->bind_param("ssssss", $name, $id, $email, $date, $time, $selectedSlot);
            
            // Retrieve name and email from ab2 table
            $query_ab2 = "SELECT NAME, EMAIL FROM ab2 WHERE ID = ?";
            $stmt_ab2 = $conn->prepare($query_ab2);
            $stmt_ab2->bind_param("s", $id);
            $stmt_ab2->execute();
            $result_ab2 = $stmt_ab2->get_result();
            
            if ($result_ab2->num_rows > 0) {
                $row_ab2 = $result_ab2->fetch_assoc();
                $name = $row_ab2["NAME"];
                $email = $row_ab2["EMAIL"];
                
                // Insert data into ab3 table
                $stmt_insert->execute();
                
                $stmt_insert->close();
                $stmt_ab2->close();
            }
            
            // Display success message if update and insert are successful
            // echo "<h3>Parking Slot Successfully Updated</h3>";
            // echo "<p>Date: $date</p>";
            // echo "<p>Time: $time</p>";
            // echo "<p>Slot Number: $selectedSlot</p>";
          
            // Retrieve and display full row information for the given ID
            $query = "SELECT * FROM ab2 WHERE ID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<h2>PARKING INFORMATION FOR ID: $id</h2>";
                while ($row = $result->fetch_assoc()) {
                    echo "<p>ID: " . $row["ID"] . "</p>";
                    echo "<p>Name: " . $row["NAME"] . "</p>";
                    echo "<p>Email: " . $row["EMAIL"] . "</p>";
                    echo "<p>Date: " . $row["DATE"] . "</p>";
                    echo "<p>Parking Time: " . $row["TIME"] . "</p>";
                    echo "<p>Slot Number: " . $row["SLOTNUMBER"] . "</p>";
                    echo "<button onclick='printDetails()'>Print</button>";
                    echo "<form method='post' action='../SCHEDULE2/schedule2.php'>";
                    echo"<br>";
                    echo "<button type='submit'>Back to Home</button>";
                    echo "</form>";
                }
            } else {
                echo "<p> YOUR ID IS INVALID : <br> $id IS NOT FOUND IN OUR RECORDS</p>";
                echo "<form method='post' action='../SCHEDULE2/schedule2.php'>";
                echo "<button type='submit'>Back to Home</button>";
                echo "</form>";
                
                
            }

            $stmt->close();
        } else {
            // Display error message if update fails
            echo "<p>Error updating record: " . $stmt_update->error . "</p>";
        }

        // Close statement
        $stmt_update->close();
    }
}

$conn->close();
?>
