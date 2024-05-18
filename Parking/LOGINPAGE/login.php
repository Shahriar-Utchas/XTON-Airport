<?php
// Database connection
$servername = "localhost"; // Assuming localhost
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "xton_airport"; // Your database name

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize variables
$id = $password = "";
$idErr = $passwordErr = "";
$login_err = "";
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate ID
    if (empty($_POST["id"])) {
        $idErr = "ID is required";
    } else {
        $id = test_input($_POST["id"]);
    }

    // Validate password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
    }

    // If all fields are valid, check credentials
    if (empty($idErr) && empty($passwordErr)) {
        $sql = "SELECT * FROM ab2 WHERE ID='$id' AND PASSWORD='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $success_message = "Login successful!";
            $show_button = true; // Set to true if login successful
        } else {
            $login_err = "Invalid ID or password";
            $show_button = false; // Set to false if login failed
        }
    }
}

// Function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="login.css"> <!-- Link to your CSS file -->
</head>
<body>
    <h2>User Login</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        ID: <input type="text" name="id" value="<?php echo $id;?>">
        <span class="error">* <?php echo $idErr;?></span>
        <br><br>
        Password: <input type="password" name="password">
        <span class="error">* <?php echo $passwordErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Login">
    </form>

    <span class="error"><?php echo $login_err;?></span>
    <span class="success"><?php echo $success_message;?></span>

    <?php if (isset($show_button) && $show_button) : ?>
        <a href="../SCHEDULE2/schedule2.php"><button class="schedulebutton">Choose Your Schedule</button></a>
    <?php endif; ?>
</body>
</html>
