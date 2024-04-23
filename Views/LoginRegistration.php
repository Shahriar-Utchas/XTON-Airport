<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="../CSS/LoginRegistration.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
    <h2>Login</h2>
    <form method="post" action="../Controllers/logCheckController.php">
      <div class="input-box">
        <input type="text" placeholder="User Name" required name="user">
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" required name="pass">
      </div>
      <div class="remember-forgot">  <label><input type="checkbox">Remember Me</label>
        <a id="forgot" href="#" class="fgt">Forgot Password?</a>
      </div>
      <button class="btn" name="log">LogIn</button>
    </form>
    <div class="register-link">
      Don't have an account?
      <button id="registerBtn">Register Now</button>
    </div>
    
    <?php 
      if(!empty($_SESSION['mess'])) {
        echo $_SESSION['mess'];
        unset($_SESSION['mess']);
      }
      if(!empty($_SESSION['reg'])) {
        echo $_SESSION['reg'];
        unset($_SESSION['reg']);
      }
    ?>
  </div>
  <div class="wrapper2 register-form hidden">
    <h2>Register Now</h2>
    <form method="POST" action="../Controllers/registrationController.php">
      <div class="input-box">
        <input type="text" placeholder="Enter Your User Name" required name="userName">
    </div>
    <div class="input-box">
        <input type="e-mail" placeholder="Enter Your E-mail" required name="mail">
    </div>
    <div class="input-box">
        <input type="text" placeholder="Create a Password" required name="pass">
    </div>
    <div class="input-box">
        <input type="text" placeholder="Re-type your Password" required name="Rpass">
    </div>
      <button class="btn" name="log">Complete Registration</button>
    </form>
    <div class="register-link">
      Already have an account?
      <button id="loginBtn">Login Now</button>
    </div>
  </div>

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
