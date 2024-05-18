<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile List</title>
    <link rel="stylesheet" href="../CSS/profileview.css">

</head>
<body>
    <div class="container">
        <h1>Admin Profile List</h1>
        <?php
        require_once '../CONTROLLER/profilecontroller.php';
        $profileController = new ProfileController();
        $profiles = $profileController->getAllProfiles();
        foreach ($profiles as $profile) {
        ?>
            <div class="profile">
                <img src="img/profile.jpg" alt="Profile Image">
                <div class="profile-details">
                    <h2><?php echo $profile['NAME']; ?></h2>
                    <p>ID: <?php echo $profile['ID']; ?></p>
                    <p>Email: <?php echo $profile['EMAIL']; ?></p>
                    <p>Age: <?php echo $profile['AGE']; ?></p>
                    <p>Working Days: <?php echo $profile['WORKINGDAYS']; ?></p>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>
</html>
