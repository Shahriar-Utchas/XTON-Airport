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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <div class="sidebar">
        <div id="logo">
            <a href="../home.php"><img src="../img/Restaurent_Pic/logo.png" alt=""></a>
        </div>
        <div class="profile_pic">
            <?php  
                while($row=mysqli_fetch_assoc($info)){
                echo "<img src='data:;base64,".base64_encode($row['img'])."' alt='image' style='width: 100%; height: 160px;'>";
                }
            ?>
        </div>
        <div class="name">
            <p> Welcome, <?php echo $_SESSION['user'];?></p>
        </div>       
        <div class="options">
        <button id="Home"><i class="fa-solid fa-house"></i>&nbsp;Home</button><br><br>
        <button id="Dashboard"><i class="fa-solid fa-user"></i>&nbsp;Profile</button><br><br>
        <button id="Dashboard"><i class="fa-solid fa-gear"></i>&nbsp;Settings</button><br><br>
        <button id="out" onclick = "logout()"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;Logout</button><br><br>
        </div>

    </div>
    <div class="navbar">
        <button id="Dashboard"><i class="fa-solid fa-house"></i>&nbsp;Home</button>

        <div class="searchBar">
          <input type="text" placeholder="search here" />
          <div class="search-icon">
            <i class="fa-solid fa-magnifying-glass"></i>
          </div>
        </div>

    </div>
    <div class="content">

    </div>
    <script>

        function logout() {
            swal({
                    title: "Are you sure you want to logout?",
                    icon: "warning",
                    buttons: ["Cancel", "Logout"],
                    dangerMode: true,
                }).then((logout) => {
                    if (logout) {
                        // Make an AJAX request to logout.php
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "../Controllers/logout.php", true);
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                // Redirect to login page after successful logout
                                window.location.href = "../Views/LoginRegistration.php";
                            }
                        };
                        xhr.send();
                    }
                });
        }

       
    </script>
    
</body>
</html>