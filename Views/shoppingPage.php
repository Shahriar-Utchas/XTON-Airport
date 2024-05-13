<?php 
require_once('../Controllers/shoppingController.php');  
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
    <title>Shopping Page</title>
    <link rel="stylesheet" href="../CSS/shoppingPage.css">
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
            <li class="item" id = "airport"><a href="#">At the Airport</a></li>
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
              <li><a href="Views/shoppingPage.php">Shopping</a></li>
              <li><a href="Views/RestaurentPage.php">Restaurent</a></li>
          </div>
      </ul>
      <ul class="drop-down-flights">
          <div class="drop-down-flights-op">
                  <li><a href="#">Arrivals</a></li>
                  <li><a href="#">Departures</a></li>
                  <li><a href="#">Cancel Flights</a></li>
          </div> 
      </ul>
      <ul class="drop-down-booking">
          <div class="drop-down-booking-op">
              <li><a href="#">Parking</a></li>
              <li><a href="#">Lounge</a></li>
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
    <div class="cartItem">
      <table border ="1">
        <tr>
          <th>Item</th>
          <th>Price</th>
        </tr>
        <?php while($r=mysqli_fetch_assoc($shop_cart)){ ?>
           <tr>
                <td><?php echo $r["name"]; ?></td>
                <td><?php echo $r["price"]; ?></td>
                <td>
                  <form action="../Controllers/shoppingController.php" method="get">
                  <button name="buy" value="<?php echo $r['id']; ?>">Buy</button>
                </td>
                <td>
                    <button name="remove" value="<?php echo $r['id']; ?>">Remove</button>
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
        <h3 class="h-primary">XTON : Welcome to XTON / At the Airport/SHOPPING</h3>
        <h1>Shops at XTON</h1>
    </section>
    
  <div class="bigbox">
    <div class="brands">
    <marquee><h1 style="color: blue;">Brands At XTON</h1></marquee>
        
    <section id="brands">
            <div class="box">
            <img src="../img/brands/Bose.png" alt="">
                <button class="btn" id = "bose">View Details</button>
            </div>
            <div class="box">
                <img src="../img/brands/Apple.jpg" alt="">
                <button class = "btn" id = "apple">View Details</button>
                
            </div>
            
            <div class="box">
            <img src="../img/brands/Cartier.png" alt="">
                <button class="btn" id = "cartier">View Details</button>
            </div>
            <div class="box">
            <img src="../img/brands/Prada.png" alt="">
                <button class="btn" id = "prada">View Details</button>
            </div>
            <div class="box">
            <img src="../img/brands/Sony.png" alt="">
                <button class="btn" id = "sony">View Details</button>
            </div>
            <div class="box">
            <img src="../img/brands/TAG.png" alt="">
                <button class="btn" id = "tag">View Details</button>
            </div>

    </section>
    </div>
    
    <div class="foods">
      <section class="shop-selection">
        <div id="shop">
            <!-- bose -->
        <?php 
        while($row=mysqli_fetch_assoc($get_products)){
            echo "<div class='box bose'>";
            echo "<img src='data:;base64,".base64_encode($row['img'])."' alt='image'>";
            echo "<p>".$row['name']."</p>";
            echo "<p> price:" .$row['price']."</p>";
            echo "<form action='../Controllers/shoppingController.php' method='get'>";
            echo "<button class ='btn' name='cart' value='".$row['id']."'>Add to cart</button>";
            echo "</form>";
            echo "</div>";
        }
        ?>
        <!-- apple -->
        <?php 
        while($row=mysqli_fetch_assoc($get_apple)){
            echo "<div class='box apple'>";
            echo "<img src='data:;base64,".base64_encode($row['img'])."' alt='image'>";
            echo "<p>".$row['name']."</p>";
            echo "<p> price:" .$row['price']."</p>";
            echo "<form action='../Controllers/shoppingController.php' method='get'>";
            echo "<button class ='btn' name='cart' value='".$row['id']."'>Add to cart</button>";
            echo "</form>";
            echo "</div>";
        }
        ?>
        <!-- cartier -->
        <?php 
        while($row=mysqli_fetch_assoc($get_cartier)){
            echo "<div class='box cartier'>";
            echo "<img src='data:;base64,".base64_encode($row['img'])."' alt='image'>";
            echo "<p>".$row['name']."</p>";
            echo "<p> price:" .$row['price']."</p>";
            echo "<form action='../Controllers/shoppingController.php' method='get'>";
            echo "<button class ='btn' name='cart' value='".$row['id']."'>Add to cart</button>";
            echo "</form>";
            echo "</div>";
        }
        ?>
        <!-- prada -->
        <?php 
        while($row=mysqli_fetch_assoc($get_prada)){
            echo "<div class='box prada'>";
            echo "<img src='data:;base64,".base64_encode($row['img'])."' alt='image'>";
            echo "<p>".$row['name']."</p>";
            echo "<p> price:" .$row['price']."</p>";
            echo "<form action='../Controllers/shoppingController.php' method='get'>";
            echo "<button class ='btn' name='cart' value='".$row['id']."'>Add to cart</button>";
            echo "</form>";
            echo "</div>";
        }
        ?>
        <!-- sony  -->
        <?php 
        while($row=mysqli_fetch_assoc($get_sony)){
            echo "<div class='box sony'>";
            echo "<img src='data:;base64,".base64_encode($row['img'])."' alt='image'>";
            echo "<p>".$row['name']."</p>";
            echo "<p> price:" .$row['price']."</p>";
            echo "<form action='../Controllers/shoppingController.php' method='get'>";
            echo "<button class ='btn' name='cart' value='".$row['id']."'>Add to cart</button>";
            echo "</form>";
            echo "</div>";
        }
        ?>
        <!-- tag  -->
        <?php 
        while($row=mysqli_fetch_assoc($get_tag)){
            echo "<div class='box tag'>";
            echo "<img src='data:;base64,".base64_encode($row['img'])."' alt='image'>";
            echo "<p>".$row['name']."</p>";
            echo "<p> price:" .$row['price']."</p>";
            echo "<form action='../Controllers/shoppingController.php' method='get'>";
            echo "<button class ='btn' name='cart' value='".$row['id']."'>Add to cart</button>";
            echo "</form>";
            echo "</div>";
        }
        ?>
        </section>
        </div>
  </div>
  
        <script>
            const bosebtn=document.getElementById('bose');
            const applebtn=document.getElementById('apple');
            const cartierbtn=document.getElementById('cartier');
            const pradabtn=document.getElementById('prada');
            const sonybtn=document.getElementById('sony');
            const tagbtn=document.getElementById('tag');


            const boseElements = document.querySelectorAll('.bose');
            const appleElements = document.querySelectorAll('.apple');
            const cartierElements = document.querySelectorAll('.cartier');
            const pradaElements = document.querySelectorAll('.prada');
            const sonyElements = document.querySelectorAll('.sony');
            const tagElements = document.querySelectorAll('.tag');

           applebtn.addEventListener('click',function(){
            appleElements.forEach(element => {
              element.style.display = 'block';
            });
            boseElements.forEach(element => {
                  element.style.display = 'none';
                });
            cartierElements.forEach(element => {
              element.style.display = 'none';
            });
            pradaElements.forEach(element => {
              element.style.display = 'none';
            });
            sonyElements.forEach(element => {
              element.style.display = 'none';
            });
            tagElements.forEach(element => {
              element.style.display = 'none';
            });
            });

            //bose
           bosebtn.addEventListener('click',function(){
            appleElements.forEach(element => {
              element.style.display = 'none';
            });
            boseElements.forEach(element => {
                  element.style.display = 'block';
                });
            cartierElements.forEach(element => {
              element.style.display = 'none';
            });
            pradaElements.forEach(element => {
              element.style.display = 'none';
            });
            sonyElements.forEach(element => {
              element.style.display = 'none';
            });
            tagElements.forEach(element => {
              element.style.display = 'none';
            });
            });
            //cartier
            cartierbtn.addEventListener('click',function(){
              appleElements.forEach(element => {
              element.style.display = 'none';
            });
            boseElements.forEach(element => {
                  element.style.display = 'none';
                });
            cartierElements.forEach(element => {
              element.style.display = 'block';
            });
            pradaElements.forEach(element => {
              element.style.display = 'none';
            });
            sonyElements.forEach(element => {
              element.style.display = 'none';
            });
            tagElements.forEach(element => {
              element.style.display = 'none';
            });
            });
            //prada
            pradabtn.addEventListener('click',function(){
              appleElements.forEach(element => {
              element.style.display = 'none';
            });
            boseElements.forEach(element => {
                  element.style.display = 'none';
                });
            cartierElements.forEach(element => {
              element.style.display = 'none';
            });
            pradaElements.forEach(element => {
              element.style.display = 'block';
            });
            sonyElements.forEach(element => {
              element.style.display = 'none';
            });
            tagElements.forEach(element => {
              element.style.display = 'none';
            });
            });
            //sony
            sonybtn.addEventListener('click',function(){
              appleElements.forEach(element => {
              element.style.display = 'none';
            });
            boseElements.forEach(element => {
                  element.style.display = 'none';
                });
            cartierElements.forEach(element => {
              element.style.display = 'none';
            });
            pradaElements.forEach(element => {
              element.style.display = 'none';
            });
            sonyElements.forEach(element => {
              element.style.display = 'block';
            });
            tagElements.forEach(element => {
              element.style.display = 'none';
            });
            });
            //tag
            tagbtn.addEventListener('click',function(){
              appleElements.forEach(element => {
              element.style.display = 'none';
            });
            boseElements.forEach(element => {
                  element.style.display = 'none';
                });
            cartierElements.forEach(element => {
              element.style.display = 'none';
            });
            pradaElements.forEach(element => {
              element.style.display = 'none';
            });
            sonyElements.forEach(element => {
              element.style.display = 'none';
            });
            tagElements.forEach(element => {
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
            <p>Where To Eat.</p>
            <p>Where to Shop.</p>
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
    <?php 
    if(isset($_SESSION['shop_cart_status'])){
        ?>
        <script>swal("Success", "Added to cart!", "success");</script>
        <?php
        unset($_SESSION['shop_cart_status']);
    }
    if(isset($_SESSION['shop_cart_status2'])){
        ?>
        <script>swal("Failed", "Failed to add to cart!", "error");</script>
        <?php
        unset($_SESSION['shop_cart_status2']);
    }
    if(isset($_SESSION['shop_remove_status'])){
        ?>
        <script>swal("Success", "Removed from cart!", "success");</script>
        <?php
        unset($_SESSION['shop_remove_status']);
    }
    if(isset($_SESSION['shop_remove_status2'])){
        ?>
        <script>swal("Failed", "Failed to remove from cart!", "error");</script>
        <?php
        unset($_SESSION['shop_remove_status2']);
    }
    if(isset($_SESSION['shop_buy_status'])){
        ?>
        <script>swal("Success", "Added to buy!", "success");</script>
        <?php
        unset($_SESSION['shop_buy_status']);
    }
    if(isset($_SESSION['shop_buy_status2'])){
        ?>
        <script>swal("Failed", "Failed to add to buy!", "error");</script>
        <?php
        unset($_SESSION['shop_buy_status2']);
    }
    ?>
    
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