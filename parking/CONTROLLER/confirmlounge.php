<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "xton_airport";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$id = $date = $shift = "";
$booking_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $date = $_POST['date'];
    $shift = $_POST['shift'];

    // Check if all fields are filled
    if (empty($id) || empty($date) || empty($shift)) {
        $booking_error = "Please fill in all fields";
    } else {
        // Check if ID, date, and shift already exist in the database
        $sql_check_booking = "SELECT * FROM LOUNGE WHERE  DATE = '$date' AND RESTINGTIME = '$shift'";
        $result_check_booking = $conn->query($sql_check_booking);

        if ($result_check_booking->num_rows > 0) {
            // Shift is already booked
            echo "<script>alert('Shift is already booked');</script>";
            echo "<script>window.location.href = '../VIEWS/lounge.php';</script>";
        } else {
            // Check if ID exists in the database
            $sql_check_id = "SELECT * FROM LOUNGE WHERE ID = '$id'";
            $result_check_id = $conn->query($sql_check_id);

            if ($result_check_id->num_rows > 0) {
                // Update the row with the given ID
                $sql_update = "UPDATE LOUNGE SET DATE = '$date', RESTINGTIME = '$shift' WHERE ID = '$id'";
                    
                if ($conn->query($sql_update) === TRUE) {
                    // Fetch relevant data from LOUNGE table
                    $sql_fetch_data = "SELECT * FROM LOUNGE WHERE ID = '$id'";
                    $result_fetch_data = $conn->query($sql_fetch_data);

                    if ($result_fetch_data->num_rows > 0) {
                        // Fetching data successful, now insert into LOUNGEHISTORY
                        $row = $result_fetch_data->fetch_assoc();
                        $name = $row['NAME'];
                        $email = $row['EMAIL'];
                        $date = $row['DATE'];
                        $restingtime = $row['RESTINGTIME'];

                        // Insert into LOUNGEHISTORY
                        $sql_insert_history = "INSERT INTO LOUNGEHISTORY (NAME, ID, EMAIL, DATE, RESTINGTIME) 
                                               VALUES ('$name', '$id', '$email', '$date', '$restingtime')";
                        
                        if ($conn->query($sql_insert_history) === TRUE) {
                            // Successful insertion into LOUNGEHISTORY
                            echo "<script>alert('Successfully requested for your resting shift ');</script>";
                           
                            echo "<form method='post' action='../VIEWS/lounge.php'>";
                            echo "<button type='submit'>Back to Home</button>";
                            echo "</form>";

                        } else {
                            // Error inserting into LOUNGEHISTORY
                            echo "Error inserting into LOUNGEHISTORY: " . $conn->error;
                        }
                    } else {
                        // Error fetching data from LOUNGE table
                        echo "Error fetching data from LOUNGE table";
                    }
                    
                    // Now, the PDF functionality should be integrated here
                    // Add the code to generate and download PDF
                    // echo "<script>window.print();</script>"; // This line prints the page
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {
                echo "<script>alert('Your ID $id is not found');</script>";
                echo "<script>window.location.href = '../VIEWS/lounge.php';</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirmation Page</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
</head>
<body>

<h1>Appointment Confirmation</h1>
<?php if (!empty($booking_error)) : ?>
    <script>
        alert('<?php echo $booking_error; ?>');
    </script>
<?php endif; ?>
<p><strong>ID:</strong> <?php echo $id; ?></p>
<p><strong>Date:</strong> <?php echo $date; ?></p>
<p><strong>Shift:</strong> <?php echo $shift; ?></p>

<button onclick="window.print();">Print</button>

</body>
</html>
