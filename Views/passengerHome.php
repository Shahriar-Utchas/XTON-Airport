<?php 
require_once('../Models/alldb.php');
require_once('../Controllers/resturentController.php');
if($_SESSION['user']=="")
{
    header("location:../Views/LoginRegistration.php");
}

$info = get_user_info($_SESSION['user']);
$info2 = get_user_info($_SESSION['user']);
$buy_shop_info = get_shop_buy_info($_SESSION['user']);
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
    <?php 
    if(!empty($_SESSION['updateMT'])) {
        ?>
        <script>swal("Info", "You need to fill up the box for change", "info");</script>
       <?php
        unset($_SESSION['updateMT']);
      } 
    if(!empty($_SESSION['updateUser'])) {
        ?>
        <script>swal("Success!", "You information updated successfully!", "success");</script>
       <?php
        unset($_SESSION['updateUser']);
      } 
      ?>
    <div class="sidebar">
        <div id="logo">
            <a href="../home.php"><img src="../img/Restaurent_Pic/logo.png" alt=""></a>
        </div>
        <div class="profile_pic">
            <?php  
                while($row=mysqli_fetch_assoc($info)){
                echo "<img src='data:;base64,".base64_encode($row['img'])."' alt='image' style='width: 100%; height: 150px;'>";
                }
            ?>
        </div>
        <div class="name">
            <p> Welcome, <?php echo $_SESSION['user'];?></p>
        </div>       
        <div class="options">
        <button id="home"><i class="fa-solid fa-house"></i>&nbsp;Home</button><br><br>
        <button id="profile"><i class="fa-solid fa-user"></i>&nbsp;Profile</button><br><br>
        <button id="settings"><i class="fa-solid fa-gear"></i>&nbsp;Settings</button><br><br>
        <div class="settings-op">
        <button id="dlt-acc" onclick = "deleteAcc()"><i class="fa-solid fa-user-slash"></i>&nbsp;Delete Account</button><br><br>
        </div>
        <button id="out" onclick = "logout()"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;Logout</button><br><br>
        </div>

    </div>
    <div class="navbar">
        <button id="Dashboard" class = "nav-text">Home</button>

        <div class="searchBar">
          <input type="text" placeholder="search here" />
          <div class="search-icon">
            <i class="fa-solid fa-magnifying-glass"></i>
          </div>
        </div>

    </div>
    <div class="content">
        <div class="home">
            <div class="resturent-orders">
            <h1>Restaurent orders</h1>
            <table border ="1">
            <tr>
              <th>Item</th>
              <th>Price</th>
              <th>Order ID</th>
            </tr>
            <?php while($r=mysqli_fetch_assoc($buy_info)){ ?>
               <tr>
                    <td><?php echo $r["item"]; ?></td>
                    <td><?php echo $r["price"]; ?></td>
                    <td><?php echo $r["id"]; ?></td>
                    <td>
               </tr>
               <?php } ?>
            </table>
            <br>
            <h3><a href="restaurentPage.php">Order more foods <i class="fa-solid fa-arrow-right"></i></a></h3>
        </div>

            <div class="shop-orders">
            <h1>Shop orders</h1>
            <table border ="1">
            <tr>
              <th>Item</th>
              <th>Price</th>
              <th>Order ID</th>
            </tr>
            <?php while($r=mysqli_fetch_assoc($buy_shop_info)){ ?>
               <tr>
                    <td><?php echo $r["name"]; ?></td>
                    <td><?php echo $r["price"]; ?></td>
                    <td><?php echo $r["id"]; ?></td>
               </tr>
               <?php } ?>
            </table>
            <br>
            <h3><a href="shoppingPage.php">Order more items <i class="fa-solid fa-arrow-right"></i></a></h3>
            
        </div>
        </div>
        <div class="profile" style="display: none;">
            <div class="infos options">
                <?php  
                while($row=mysqli_fetch_assoc($info2)){
                echo "<img src='data:;base64,".base64_encode($row['img'])."' alt='image' style='width: 200px; height: 230px;'>"; 
                ?>
                <div class="about">
                    <br>
                <p><span style="color: blue;">Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span> <?php echo $row['user']; ?></p>
                <p><span style="color: blue;">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span> <?php echo $row['Email']; ?></p>
                </div>
                <?php 
                 } ?>
                 <br>
                 <div class="changing" style = "display:none;">
                <form action="../Controllers/passengerHomeController.php"   method="post" enctype="multipart/form-data">
                <label for="img">Upload your image to change:</label> <input type="file" name="img" accept=".jpg, .jpeg, .png">
                <br> <br>
                    <div class="input-box">
                        <input type="text" placeholder="Change your name" name="user">
                    </div>                 
                    <div class="input-box">
                        <input type="email" placeholder="Change your Email" name="email">
                    </div>                 
                    <div class="input-box">
                        <input type="password" placeholder="Change your password" name="pass">
                    </div>
                    <div class="button-container">
                    <button id="update" type = "submit"><i class="fa-solid fa-screwdriver-wrench"></i>&nbsp;update</button>
                    <button id="cancel" type="button"  style="display:none;"><i class="fa-solid fa-screwdriver-wrench"></i>&nbsp;cancel</button>
                    </div>
                </form>                 
                 </div>
                    
                    <button id="change_info"><i class="fa-solid fa-screwdriver-wrench"></i>&nbsp;Change Information</button>
                    
                    
                
            </div>
        </div>
        <div class="settings" style="display: none;">
           
        </div>
            
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
    <script>
        function deleteAcc() {
            swal({
                    title: "Are you sure you want to delete your account?",
                    text: "Once deleted, you will not be able to recover this account!",
                    icon: "warning",
                    buttons: ["Cancel", "Delete"],
                    dangerMode: true,
                }).then((deleteAccount) => {
                    if (deleteAccount) {
                        // Make an AJAX request to delete.php
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "../Controllers/delete.php", true);
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                // Redirect to login page after successful deletion
                                window.location.href = "../Views/LoginRegistration.php";
                            }
                        };
                        xhr.send();
                    }
                });
        }

    </script>
    <script>
        document.getElementById("home").addEventListener("click", function() {
            document.querySelector(".home").style.display = "block";
            document.querySelector(".profile").style.display = "none";
            // document.querySelector(".settings").style.display = "none";
            // document.querySelector(".out").style.display = "none";
            document.querySelector(".nav-text").innerHTML = "Home";
            document.querySelector(".about").style.display = "block";
            document.querySelector("#cancel").style.display = "none";
            document.querySelector(".changing").style.display = "none";
            document.querySelector("#change_info").style.display = "block";
        });
        document.getElementById("profile").addEventListener("click", function() {
            document.querySelector(".home").style.display = "none";
            document.querySelector(".profile").style.display = "block";
            // document.querySelector(".settings").style.display = "none";
            // document.querySelector(".out").style.display = "none";
            document.querySelector(".nav-text").innerHTML = "Profile";
            document.querySelector(".about").style.display = "block";
            document.querySelector("#cancel").style.display = "none";
            document.querySelector(".changing").style.display = "none";
            document.querySelector("#change_info").style.display = "block";
        });
        // document.getElementById("settings").addEventListener("click", function() {
        //     document.querySelector(".home").style.display = "none";
        //     document.querySelector(".profile").style.display = "none";
        //     document.querySelector(".settings").style.display = "block";
        //     document.querySelector(".about").style.display = "block";
        //     document.querySelector("#cancel").style.display = "none";
        //     // document.querySelector(".out").style.display = "none";
        //     document.querySelector(".nav-text").innerHTML = "Profile";
        //     document.querySelector(".changing").style.display = "none";
        //     document.querySelector("#change_info").style.display = "block";
        // });
        document.getElementById("settings").addEventListener("click", function() {
            document.querySelector(".settings-op").style.display = document.querySelector(".settings-op").style.display === "block" ? "none" : "block";
        });
        document.getElementById("change_info").addEventListener("click", function() {
            document.querySelector(".about").style.display = "none";
            document.querySelector("#cancel").style.display = "block";
            document.querySelector(".changing").style.display = "block";
            document.querySelector("#change_info").style.display = "none";
            
        });
        document.getElementById("cancel").addEventListener("click", function() {
            document.querySelector(".about").style.display = "block";
            document.querySelector("#cancel").style.display = "none";
            document.querySelector(".changing").style.display = "none";
            document.querySelector("#change_info").style.display = "block";
        });
    </script>
    
</body>
</html>