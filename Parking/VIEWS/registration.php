<?php

require_once '../MODEL/connectiondb.php';

// Initialize variables to empty values
$name = $email = $id = $password = "";
$nameErr = $emailErr = $idErr = $passwordErr = "";
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    // Validate ID
    if (empty($_POST["id"])) {
        $idErr = "ID is required";
    } else {
        $id = test_input($_POST["id"]);
        // Check if ID already exists
        $sql_check_id = "SELECT * FROM ab2 WHERE ID='$id'";
        $result_check_id = mysqli_query($conn, $sql_check_id);
        if (mysqli_num_rows($result_check_id) > 0) {
            $idErr = "This ID is already used";
        }
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Check if email address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        // Check if password contains at least one uppercase letter, one lowercase letter, and one digit
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
            $passwordErr = "Password must contain at least one uppercase letter, one lowercase letter, and one digit";
        }
    }

    // If all fields are valid, insert into database
    if (empty($nameErr) && empty($emailErr) && empty($idErr) && empty($passwordErr)) {
        $sql = "INSERT INTO ab2 (NAME, ID, EMAIL, PASSWORD) VALUES ('$name', '$id', '$email', '$password')";

        if (mysqli_query($conn, $sql)) {
            $success_message = "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
    <title>User Registration</title>
    <link rel="stylesheet" href="../REGISTRATIONPAGE/registration.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="fullbackground">

    
    <h2>User Registration</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Name: <input type="text" name="name" value="<?php echo $name;?>">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>
        ID: <input type="text" name="id" value="<?php echo $id;?>">
        <span class="error">* <?php echo $idErr;?></span>
        <br><br>
        Email: <input type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
        Password: <input type="password" name="password" value="<?php echo $password;?>">
        <span class="error">* <?php echo $passwordErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Register">
    </form>

    <span class="success"><?php echo $success_message;?></span>

    <?php if(isset($success_message)) { ?>
        <!-- <p>Registration successful! Click below to login:</p> -->
       <button class="loginbutton"> <a href="../LOGINPAGE/login.php" >Login</a></button> 
    <?php } ?>

    </div>
</body>
</html>
