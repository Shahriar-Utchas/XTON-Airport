<?php 
session_start();
if($_SESSION['user']=="")
{
    header("location:../Views/LoginRegistration.php");
}
require_once('../Models/alldb.php');

$info = get_user_info($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/passengerHome.css">
    <title>Passenger Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==
        " crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="sidebar">
        <div id="logo">
            <a href="../home.php"><img src="../img/Restaurent_Pic/logo.png" alt=""></a>
        </div>
        <div class="profile_pic">
            <?php  
                while($row=mysqli_fetch_assoc($info)){
                echo "<img src='data:;base64,".base64_encode($row['img'])."' alt='image' style='width: 120%; height: 200px;'>";
                }
            ?>
        </div>
        <div class="name">
            <p> Welcome <?php echo $_SESSION['user'];?></p>
        </div>       
        <div class="options">
        <button id="Dashboard"><i class="fa-solid fa-chart-column"></i><a href="#">Home</a></button><br><br>
        <button id="Dashboard"><i class="fa-solid fa-chart-column"></i><a href="#">Profile</a></button><br><br>
        <button id="Dashboard"><i class="fa-solid fa-chart-column"></i><a href="#">Settings</a></button><br><br>
        <button id="Dashboard"><i class="fa-solid fa-chart-column"></i><a href="#">Logout</a></button><br><br>
        </div>

    </div>
    <div class="navbar">
        
    </div>
    <div class="content">

    </div>
    
</body>
</html>