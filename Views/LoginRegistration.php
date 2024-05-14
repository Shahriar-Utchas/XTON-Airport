<?php
  session_start(); 
  if(!empty($_SESSION['user'])){
    header("location:passengerHome.php");
  }
  if(!empty($_SESSION['admin'])){
    header("../admin/Views/Admin_Dashboard.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="../CSS/LoginRegistration.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style>
    .hidden {
      display: none;
    }
  </style>
</head>
<body>

  <div class="background_image">
    
  </div>
  <div class="wrapper">
    <!-- login form -->
    <a href="../home.php"><img src="../img/Restaurent_Pic/logo.png" alt=""></a>
    <h2>Login</h2>
    <form method="post" action="../Controllers/logCheckController.php">
      <div class="input-box">
        <input type="text" placeholder="User Name" required name="user">
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" required name="pass">
      </div>
      <div class="remember-forgot" style="display: none;">  <label><input type="checkbox">Remember Me</label>
    </div>
    <!-- <button id="forgetBtn">Forget your password?</button> -->
      <button class="btn" name="log">LogIn</button>
    </form>
    <div class="register-link">
      Don't have an account?
      <button id="registerBtn">Register Now</button>
    </div>
    
    <?php 
      if(!empty($_SESSION['mess'])) {
        ?>
         <script>swal("Error", "ID/Password Incorrect", "error");</script>
        <?php
        unset($_SESSION['mess']);
      }
      if(!empty($_SESSION['reg'])) {
        ?>
        <script>swal("Error", "Please, fIll the box correctly.", "error");</script>
       <?php
        unset($_SESSION['reg']);
      }
      if(!empty($_SESSION['reg2'])) {
        ?>
        <script>swal("success", "Registration Successfull. Try login Now!", "success");</script>
       <?php
        unset($_SESSION['reg2']);
      }
      if(!empty($_SESSION['restaurant'])) {
        ?>
        <script>swal("Info", "You need to login first!", "info");</script>
       <?php
        unset($_SESSION['restaurant']);
      }
    ?>
  </div>

  <!-- Register form -->
  <div class="wrapper2 register-form hidden">
  <a href="../home.php"><img src="../img/Restaurent_Pic/logo.png" alt=""></a>
    <h2>Register Now</h2>
    <form method="POST" action="../Controllers/registrationController.php" enctype="multipart/form-data">
      <div class="input-box">
        <input type="text" placeholder="Enter Your User Name" required name="userName">
    </div>
    <div class="input-box">
        <input type="email" placeholder="Enter Your E-mail" required name="mail">
    </div>
    <div class="input-box">
        <input type="password" placeholder="Create a Password" required name="pass">
    </div>
    <div class="input-box">
        <input type="password" placeholder="Re-type your Password" required name="Rpass">
    </div>

    Upload your image: <input type="file" name="img" accept=".jpg, .jpeg, .png">

      <button class="btn" name="log" type="submit">Complete Registration</button>
    </form>
    <div class="register-link">
      Already have an account?
      <button id="loginBtn">Login Now</button>
    </div>
  </div>

  <div class="wrapper2 forget-form hidden">
  <a href="../home.php"><img src="../img/Restaurent_Pic/logo.png" alt=""></a>
    <h2>Reset</h2>
    <form method="POST" action="../Controllers/registrationController.php" enctype="multipart/form-data">
    <div class="input-box">
        <input type="email" placeholder="Enter Your E-mail" required name="mail">
    </div>
      <button class="btn" name="log" type="submit">Submit</button>
    </form>
    <div class="register-link">
      Already have an account?
      <button id="loginBtn2">Login Now</button>
    </div>
  </div>
  <script>
      document.getElementById("forgetBtn").addEventListener("click", function() {
      // Hide the login form
      document.querySelector(".wrapper").classList.add("hidden");
      // Show the forget password form
      document.querySelector(".forget-form").classList.remove("hidden");
      });

      // Add event listener to go back to login form
      document.getElementById("loginBtn2").addEventListener("click", function() {
        // Hide the register form
        document.querySelector(".forget-form").classList.add("hidden");
        // Show the login form
        document.querySelector(".wrapper").classList.remove("hidden");
      });
    </script>
  <script>
    document.getElementById("registerBtn").addEventListener("click", function() {
      // Hide the login form
      document.querySelector(".wrapper").classList.add("hidden");
      // Show the register form
      document.querySelector(".register-form").classList.remove("hidden");
    });

    // Add event listener to go back to login form
    document.getElementById("loginBtn").addEventListener("click", function() {
      // Hide the register form
      document.querySelector(".register-form").classList.add("hidden");
      // Show the login form
      document.querySelector(".wrapper").classList.remove("hidden");
      
    });
  </script>
</body>

</html>