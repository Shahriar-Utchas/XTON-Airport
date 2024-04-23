<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RestaurentPage</title>
    <link rel="stylesheet" href="../CSS/RestaurentPage.css">
      <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head> 

<body>
    <div class="nav1">
        <i class="fa-solid fa-circle-exclamation"></i> M25 Junction 10-11 Closure: 15-18 March
    </div>
    <nav id="navbar">
        <div id="logo">
            <img src="../img/Restaurent_Pic/logo.png" alt="">
        </div>

        <ul>
            <li class="item"><a href="#">At the Airport</a></li>
            <li class="item"><a href="#">Flights</a></li>
            <li class="item"><a href="#">Booking</a></li>
            <li class="item"><a href="#">Help</a></li>
            <li class="item"><a href="#">Reward</a></li>
        </ul>
        <div class="nav2-searchBar">
          <input type="text" placeholder="search here" />
          <div class="search-icon">
            <i class="fa-solid fa-magnifying-glass"></i>
          </div>
        </div>

        <div class="nav2-login">
         <a href="../Views/LoginRegistration.php"><span><i class="fa-solid fa-right-to-bracket"></i></span></a>
        </div>
    </nav>
    <hr>

    <section id="home">
        <h3 class="h-primary">XTON : Welcome to XTON / At the Airport/RESTAURENT</h3>
        <h1>Restaurent at XTON</h1>
    </section>
    
    <div class="bigbox">
    <section class="terminal">
        
        <div class="select-terminal">
            Select a terminal
            <button class="btn">Reset</button>
        </div>
        <div class="terminal-op">
            <button class="btn">T1</button>
            <button class="btn">T2</button>
            <button class="btn">T3</button>
            <button class="btn">T4</button>
        </div>
        <div class="select-terminal">
        Select a Catagory
        </div>
        <div class="select-category">
            <button class="btn">Family Favourits</button>
            <button class="btn">Casual Dining</button>
            <button class="btn">Coffee House & Cafe</button>
            <button class="btn">International Cusine</button>
        </div>
    </section>
    

        <section class="shop-selection">
        <h1 class="h-primary"></h1>
        <div id="shop">
            <div class="box">
                <img src="../img/Restaurent_Pic/Bigsmoke.jpeg" alt="">
                <a href="https://www.big-smoke.co.uk/" target="_blank" class="btn">View Details</a>
            
            </div>
            <div class="box">
                <img src="../img/Restaurent_Pic/Black Sheep Coffee.jpeg" alt="">
                <a href="https://leavetheherdbehind.com/" target="_blank" class="btn">View Details</a>
            </div>
            <div class="box">
                <img src="../img/Restaurent_Pic/Cavier House.jpg" alt="">
                <a href="https://www.caviarhouse-prunier.com/" target="_blank" class="btn">View Details</a>
            </div>
            <div class="box">
                <img src="../img/Restaurent_Pic/Girraffe.png" alt="">
                <a href="https://www.emiratesleisureretail.com/brands/giraffe-world-kitchen/" target="_blank" class="btn">View Details</a>
        </div>
        </section>

        <section class="shop-selection2">
        <h1 class="h-primary"></h1>
        <div id="shop">
            <div class="box2">
                <img src="../img/Restaurent_Pic/Cafe Nero.jpg" alt="">
                <a href="https://www.caffenero.com/" target="_blank" class="btn">View Details</a>
            </div>
            <div class="box2">
                <img src="../img/Restaurent_Pic/StarBucks.jpg" alt="">
                <a href="https://www.starbucks.com/" target="_blank" class="btn">View Details</a>
            </div>
            <div class="box2">
                <img src="../img/Restaurent_Pic/Ocean.jpg" alt="">
                <a href="https://www.rwsentosa.com/en/restaurants/signature-restaurants/ocean-restaurant" target="_blank" class="btn">View Details</a>>
            </div>
            <div class="box2">
                <img src="../img/Restaurent_Pic/QueensArms.jpg" alt="">
                <a href="https://www.thequeensarmskensington.co.uk/" target="_blank" class="btn">View Details</a>
        </div>
        </section>
    </section>
    </div>
    
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
    
</body>
</html>
