<?php 
  require_once('../Controllers/resturentController.php');
if($_SESSION['user']=="")
{
    header("location:LoginRegistration.php");
}
require_once('../Models/alldb.php');

$info = get_user_info($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RestaurentPage</title>
    <link rel="stylesheet" href="../CSS/RestaurentPage.css">
      <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head> 

<body>
    <nav id="navbar">
        <div id="logo">
            <a href="../home.php"><img src="../img/Restaurent_Pic/logo.png" alt=""></a>
        </div>

        <ul>
            <li class="item" id ="airport"><a href="#">At the Airport</a></li>
            <li class="item" id = "flights"><a href="#">Flights</a></li>
            <li class="item" id = "booking"><a href="#">Booking</a></li>
            <li class="item" id = "help"><a href="#">Help</a></li>
            <li class="item" id = "reward"><a href="#">Reward</a></li>
        </ul>
        <div class="nav2-searchBar">
          <input type="text" placeholder="search here" />
          <div class="search-icon">
            <i class="fa-solid fa-magnifying-glass"></i>
          </div>
        </div>

        <div class="nav2-login">
          <?php  
            while($row=mysqli_fetch_assoc($info)){
            echo "<a href='passengerHome.php'><img src='data:;base64,".base64_encode($row['img'])."' alt='image' style='width: 130%; height: 55px; border-radius: 50%;'></a>";
            }
          ?>
        </div>
        <div class="cart tooltip">
          <i class="fa-solid fa-cart-arrow-down"></i>
          <span class="tooltiptext">cart</span>
        </div>
    </nav>
    <ul class="drop-down">
          <div class="drop-down-op">
              <li><a href="shoppingPage.php">Shopping</a></li>
              <li><a href="RestaurentPage.php">Restaurent</a></li>
          </div>
      </ul>
      <ul class="drop-down-flights">
          <div class="drop-down-flights-op">
                  <li><a href="../home.php">Arrivals</a></li>
                  <li><a href="../home.php">Departures</a></li>
                  <!-- <li><a href="#">Cancel Flights</a></li> -->
          </div> 
      </ul>
      <ul class="drop-down-booking">
          <div class="drop-down-booking-op">
              <li><a href="../parking/SCHEDULE2/schedule2.php">Parking</a></li>
              <li><a href="../parking/VIEWS/lounge.php">Lounge</a></li>
          </div>
      </ul>
      <ul class="drop-down-reward">
          <div class="drop-down-reward-op">
              To see your reward points, please <a href="views/LoginRegistration.php">login</a> first.
          </div>
      </ul>
      <ul class="drop-down-help">
          <div class="drop-down-help-op">
          For help contact us with +8801924482246 or email us at xton@gmail.com
          </div>
      </ul>
    <hr>
    <?php $s=1 ?>
    <?php $s2=1 ?>
    <div class="cartItem">
      <table border ="1">
        <tr>
          <th>Item</th>
          <th>Price</th>
        </tr>
        <?php while($r=mysqli_fetch_assoc($cart_info)){ ?>
           <tr>
                <td><?php echo $r["item"]; ?></td>
                <td><?php echo $r["price"]; ?></td>
                <td>
                  <form action="../Controllers/resturentController.php" method="get">
                    <button name="buy" class = "btn2"value="<?php echo $r['id']; ?>">Buy</button>
                    </td>
                    <td>
                    <button name="remove" class = "btn2" value="<?php echo $r['id']; ?>">Remove</button>
                    </td> 
                    <?php if($s2==1){ ?>
                    <td rowspan="10">
                    <button class = "btn2" name = "rmv_all">Remove All</button>
                    <?php $s2=2; ?>
                    </td>     
                  <?php } ?>
                  </form>
                </td>
           </tr>
           <?php } ?>
           
      </table>
    </div>
    <script>
      const cart = document.querySelector('.cart');
      const cartItem = document.querySelector('.cartItem');
      cart.addEventListener('click',function(){
        cartItem.style.visibility = cartItem.style.visibility === 'visible' ? 'hidden' : 'visible';
      });
    </script>
    <section id="home">
        <h3 class="h-primary">XTON : Welcome to XTON / At the Airport/RESTAURENT</h3>
        <h1>Restaurent at XTON</h1>
    </section>
    
  <div class="bigbox">
    <section class="terminal">
        
        <div class="select-terminal">
            Select a terminal
            <button class="btn" onclick = "reset()">Reset</button>
        </div>
        <script>
            function reset(){
                window.location.href = "RestaurentPage.php";
            }
        </script>
        <div class="terminal-op">
            <button class="btn" id = "t1">T1</button>
            <button class="btn" id = "t2">T2</button>
            <button class="btn" id = "t3">T3</button>
            <button class="btn" id = "t4">T4</button>
        </div>
        <div class="select-terminal">
        Select a Catagory
        </div>
        <div class="select-category">
            <button class="btn" id ="fastfood">Fast Food</button>
            <button class="btn" id ="lunch">Lunch</button>
            <button class="btn" id ="coffee">Coffee House & Cafe</button>
            <button class="btn" id ="interCousine">International Cusine</button>
        </div>
    </section>
    <div class="foods">
      <section class="shop-selection">
        <div id="shop">
        <!-- fastpood show-->
        <?php 
        while($row=mysqli_fetch_assoc($fast_food)){
            echo "<div class='box fastfood'>";
            echo "<img src='data:;base64,".base64_encode($row['img'])."' alt='image'>";
            echo "<p>".$row['name']."</p>";
            echo "<p> price: $" .$row['price']."</p>";
            echo "<form action='../Controllers/resturentController.php' method='get'>";
            echo "<button class ='btn' name='cart' value='".$row['id']."'>Add to cart</button>";
            echo "</form>";
            echo "</div>";
        }
        ?>
        <!-- lunch show-->
        <?php 
        while($row=mysqli_fetch_assoc($lunch)){
            echo "<div class='box lunch'>";
            echo "<img src='data:;base64,".base64_encode($row['img'])."' alt='image' style='width: 120%'>";
            echo "<p>".$row['name']."</p>";
            echo "<p> price: $" .$row['price']."</p>";
            echo "<form action='../Controllers/resturentController.php' method='get'>";
            echo "<button class ='btn' name='cart' value='".$row['id']."'>Add to cart</button>";
            echo "</form>";         
            echo "</div>";
        }
        ?>
        <!-- coffee show-->
        <?php 
        while($row=mysqli_fetch_assoc($coffee)){
            echo "<div class='box coffee'>";
            echo "<img src='data:;base64,".base64_encode($row['img'])."' alt='image'>";
            echo "<p>".$row['name']."</p>";
            echo "<p> price: $" .$row['price']."</p>";
            echo "<form action='../Controllers/resturentController.php' method='get'>";
            echo "<button class ='btn' name='cart' value='".$row['id']."'>Add to cart</button>";
            echo "</form>";;
            echo "</div>";
        }
        ?>
        <!-- interCousine show-->
        <?php
        while($row=mysqli_fetch_assoc($cousine)){
            echo "<div class='box interCousine'>";
            echo "<img src='data:;base64,".base64_encode($row['img'])."' alt='image' style='width: 120%'>";
            echo "<p>".$row['name']."</p>";
            echo "<p> price: $" .$row['price']."</p>";
            echo "<form action='../Controllers/resturentController.php' method='get'>";
            echo "<button class ='btn' name='cart' value='".$row['id']."'>Add to cart</button>";
            echo "</form>";
            echo "</div>";
        }
        ?>
        </section>
        </div>
  </div>
  <?php 
  if(!empty($_SESSION['cart_status'])) {
    ?>
     <script>swal("Success", "Added to cart!", "success");</script>
    <?php
    unset($_SESSION['cart_status']);
  }
  if(!empty($_SESSION['cart_status2'])) {
    ?>
     <script>swal("Failed", "Failed to add to cart!", "error");</script>
    <?php
    unset($_SESSION['cart_status2']);
  }
  if(!empty($_SESSION['buy_status'])) {
    ?>
     <script>swal("Success", "Added to buy!", "success");</script>
    <?php
    unset($_SESSION['buy_status']);
  }
  if(!empty($_SESSION['buy_status2'])) {
    ?>
     <script>swal("Failed", "Failed to add to buy!", "error");</script>
    <?php
    unset($_SESSION['buy_status2']);
  }
  if(!empty($_SESSION['remove_status'])) {
    ?>
     <script>swal("Success", "Removed from cart!", "success");</script>
    <?php
    unset($_SESSION['remove_status']);
  }
  if(!empty($_SESSION['remove_status2'])) {
    ?>
     <script>swal("Failed", "Failed to remove from cart!", "error");</script>
    <?php
    unset($_SESSION['remove_status2']);
  }
  if(!empty($_SESSION['remove_all_status'])) {
    ?>
     <script>swal("Success", "Removed all from cart!", "success");</script>
    <?php
    unset($_SESSION['remove_all_status']);
  }
  
  ?>
  
        <script>
            const fastfoodbtn=document.getElementById('fastfood');
            const lunchbtn=document.getElementById('lunch');
            const coffeebtn=document.getElementById('coffee');
            const interCousinebtn=document.getElementById('interCousine');

            const t1btn=document.getElementById('t1');
            const t2btn=document.getElementById('t2');
            const t3btn=document.getElementById('t3');
            const t4btn=document.getElementById('t4');

            const fastfoodElements = document.querySelectorAll('.fastfood');
            const lunchElements = document.querySelectorAll('.lunch');
            const coffeeElements = document.querySelectorAll('.coffee');
            const interCousineElements = document.querySelectorAll('.interCousine');

            fastfoodbtn.addEventListener('click',function(){
                fastfoodElements.forEach(element => {
                  element.style.display = 'block';
                });
                lunchElements.forEach(element => {
                  element.style.display = 'none';
                });
                coffeeElements.forEach(element => {
                  element.style.display = 'none';
                });
                interCousineElements.forEach(element => {
                  element.style.display = 'none';
                });

            });
            t1btn.addEventListener('click',function(){
                fastfoodElements.forEach(element => {
                  element.style.display = 'block';
                });
                lunchElements.forEach(element => {
                  element.style.display = 'none';
                });
                coffeeElements.forEach(element => {
                  element.style.display = 'none';
                });
                interCousineElements.forEach(element => {
                  element.style.display = 'none';
                });

            });

            lunchbtn.addEventListener('click',function(){  
                lunchElements.forEach(element => {
                  element.style.display = 'block';
                });           
                fastfoodElements.forEach(element => {
                  element.style.display = 'none';
                });
                coffeeElements.forEach(element => {
                  element.style.display = 'none';
                });
                interCousineElements.forEach(element => {
                  element.style.display = 'none';
                });
            });
            t2btn.addEventListener('click',function(){  
                lunchElements.forEach(element => {
                  element.style.display = 'block';
                });           
                fastfoodElements.forEach(element => {
                  element.style.display = 'none';
                });
                coffeeElements.forEach(element => {
                  element.style.display = 'none';
                });
                interCousineElements.forEach(element => {
                  element.style.display = 'none';
                });
            });
            coffeebtn.addEventListener('click',function(){  
                lunchElements.forEach(element => {
                  element.style.display = 'none';
                });           
                fastfoodElements.forEach(element => {
                  element.style.display = 'none';
                });
                coffeeElements.forEach(element => {
                  element.style.display = 'block';
                });
                interCousineElements.forEach(element => {
                  element.style.display = 'none';
                });
            });
            t3btn.addEventListener('click',function(){  
                lunchElements.forEach(element => {
                  element.style.display = 'none';
                });           
                fastfoodElements.forEach(element => {
                  element.style.display = 'none';
                });
                coffeeElements.forEach(element => {
                  element.style.display = 'block';
                });
                interCousineElements.forEach(element => {
                  element.style.display = 'none';
                });
            });
            interCousinebtn.addEventListener('click',function(){  
                lunchElements.forEach(element => {
                  element.style.display = 'none';
                });           
                fastfoodElements.forEach(element => {
                  element.style.display = 'none';
                });
                coffeeElements.forEach(element => {
                  element.style.display = 'none';
                });
                interCousineElements.forEach(element => {
                  element.style.display = 'block';
                });
            });            
            t4btn.addEventListener('click',function(){  
                lunchElements.forEach(element => {
                  element.style.display = 'none';
                });           
                fastfoodElements.forEach(element => {
                  element.style.display = 'none';
                });
                coffeeElements.forEach(element => {
                  element.style.display = 'none';
                });
                interCousineElements.forEach(element => {
                  element.style.display = 'block';
                });
            });            
        </script>
    <footer>
      <!-- First Footer Section -->
      <div class="footer-1st">
        <div class="footer-logo"></div>
        <div class="title">XTON Airport</div>
      </div>
      <!-- Second Footer Section -->
      <div class="footer-2nd">
        <div class="footer2d-info">
          <!-- Contact Information -->
          <div class="info">
            <p>Address</p>
            <address>
              <p>XTON Airport LTD.</p>
              <p>Agargaon, Mirpur.</p>
              <p>Dhaka, Bangladesh.</p>
            </address>
          </div>
          <!-- Discover XTON -->
          <div class="info">
            Discover XTON
            <p>Special Offer.</p>
            <a href="restaurentPage.php"><p>Where To Eat.</p></a>
            <a href="shoppingPage.php"><p>Where to Shop.</p></a>
          </div>
          <!-- Social Media Links -->
          <div class="info">
            <p>Contact us</p>
            <p class="links">
              <i class="fa-brands fa-facebook"></i>
              <i class="fa-brands fa-square-x-twitter"></i>
              <i class="fa-brands fa-square-instagram"></i>
              <i class="fa-brands fa-youtube"></i>
            </p>
          </div>
        </div>
      </div>
      <!-- Last Footer Section -->
      <div class="footer-last">
        <p>privacy</p>
        <p>Terms and Condition</p>
        <p>Accessibility</p>
        <p>Communication</p>
        <p>Health and Safety</p>
        <p>Help</p>
        <p>&copy;XTON Airports Limited</p>
      </div>
    </footer>
    
    <script>
    //Airport Drop-down
    document.getElementById("airport").addEventListener("mouseover", function(){
      const dropDown = document.querySelector(".drop-down");
      if(dropDown.style.visibility === "visible"){
        dropDown.style.visibility = "hidden";
      }
      else{
        dropDown.style.visibility = "visible";
      }
    });
    document.getElementById("airport").addEventListener("mouseout", function(){
      const dropDown = document.querySelector(".drop-down");
      if(dropDown.style.visibility === "visible"){
        dropDown.style.visibility = "hidden";
      }
      else{
        dropDown.style.visibility = "visible";
      }
    });
    document.querySelector(".drop-down").addEventListener("mouseover", function(){
     const dropDown = document.querySelector(".drop-down");
      dropDown.style.visibility = "visible";
    });
    document.querySelector(".drop-down").addEventListener("mouseout", function(){
     const dropDown = document.querySelector(".drop-down");
      dropDown.style.visibility = "hidden";
    });

    //Flights Drop-down
    document.getElementById("flights").addEventListener("mouseover", function(){
      const dropDown2 = document.querySelector(".drop-down-flights");
      if(dropDown2.style.visibility === "visible"){
        dropDown2.style.visibility = "hidden";
      }
      else{
        dropDown2.style.visibility = "visible";
      }
    });

    document.getElementById("flights").addEventListener("mouseout", function(){
      const dropDown2 = document.querySelector(".drop-down-flights");
      if(dropDown2.style.visibility === "visible"){
        dropDown2.style.visibility = "hidden";
      }
      else{
        dropDown2.style.visibility = "visible";
      }
    });

    document.querySelector(".drop-down-flights").addEventListener("mouseover", function(){
     const dropDown = document.querySelector(".drop-down-flights");
      dropDown.style.visibility = "visible";
    });
    document.querySelector(".drop-down-flights").addEventListener("mouseout", function(){
     const dropDown = document.querySelector(".drop-down-flights");
      dropDown.style.visibility = "hidden";
    });

    //Booking Drop-down
    document.getElementById("booking").addEventListener("mouseover", function(){
      const dropDown2 = document.querySelector(".drop-down-booking");
      if(dropDown2.style.visibility === "visible"){
        dropDown2.style.visibility = "hidden";
      }
      else{
        dropDown2.style.visibility = "visible";
      }
    });

    document.getElementById("booking").addEventListener("mouseout", function(){
      const dropDown2 = document.querySelector(".drop-down-booking");
      if(dropDown2.style.visibility === "visible"){
        dropDown2.style.visibility = "hidden";
      }
      else{
        dropDown2.style.visibility = "visible";
      }
    });

    document.querySelector(".drop-down-booking").addEventListener("mouseover", function(){
     const dropDown = document.querySelector(".drop-down-booking");
      dropDown.style.visibility = "visible";
    });
    document.querySelector(".drop-down-booking").addEventListener("mouseout", function(){
     const dropDown = document.querySelector(".drop-down-booking");
      dropDown.style.visibility = "hidden";
    });

    //Reward Drop-down
    document.getElementById("reward").addEventListener("mouseover", function(){
      const dropDown2 = document.querySelector(".drop-down-reward");
      if(dropDown2.style.visibility === "visible"){
        dropDown2.style.visibility = "hidden";
      }
      else{
        dropDown2.style.visibility = "visible";
      }
    });
    document.getElementById("reward").addEventListener("mouseout", function(){
      const dropDown2 = document.querySelector(".drop-down-reward");
      if(dropDown2.style.visibility === "visible"){
        dropDown2.style.visibility = "hidden";
      }
      else{
        dropDown2.style.visibility = "visible";
      }
    });
    document.querySelector(".drop-down-reward").addEventListener("mouseover", function(){
     const dropDown = document.querySelector(".drop-down-reward");
      dropDown.style.visibility = "visible";
    });
    document.querySelector(".drop-down-reward").addEventListener("mouseout", function(){
     const dropDown = document.querySelector(".drop-down-reward");
      dropDown.style.visibility = "hidden";
    });
        //Help Drop-down
        document.getElementById("help").addEventListener("mouseover", function(){
      const dropDown2 = document.querySelector(".drop-down-help");
      if(dropDown2.style.visibility === "visible"){
        dropDown2.style.visibility = "hidden";
      }
      else{
        dropDown2.style.visibility = "visible";
      }
    });
    document.getElementById("help").addEventListener("mouseout", function(){
      const dropDown2 = document.querySelector(".drop-down-help");
      if(dropDown2.style.visibility === "visible"){
        dropDown2.style.visibility = "hidden";
      }
      else{
        dropDown2.style.visibility = "visible";
      }
    });
    document.querySelector(".drop-down-help").addEventListener("mouseover", function(){
     const dropDown = document.querySelector(".drop-down-help");
      dropDown.style.visibility = "visible";
    });
    document.querySelector(".drop-down-help").addEventListener("mouseout", function(){
     const dropDown = document.querySelector(".drop-down-help");
      dropDown.style.visibility = "hidden";
    });

    </script>
</body>
</html>