<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>XTON Airport</title>
  <!-- CSS Stylesheet -->
  <link rel="stylesheet" href="CSS/home.css" />
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="img/logo.ico" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <!-- Roboto Font -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
  <!-- Merriweather Font -->
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
</head>
<body>
  <div class="container">
    <!-- Navigation Bar -->
    <header>
      <!-- Announcement -->
      <div class="nav1">
        <i class="fa-solid fa-circle-exclamation"></i> M25 Junction 10-11 Closure: 15-18 March
      </div>
      <!-- Logo and Navigation Links -->
      <div class="nav2">
        <div class="logo"></div>
        <div class="nav2-content">
          <p><a href="#">At the Airport</a></p>
          <p><a href="#">Flights</a></p>
          <p><a href="#">Booking</a></p>
          <p><a href="#">Reward</a></p>
        </div>
        <!-- Search Bar -->
        <div class="nav2-searchBar">
          <input type="text" placeholder="search here" />
          <div class="search-icon">
            <i class="fa-solid fa-magnifying-glass"></i>
          </div>
        </div>
        <!-- Notification and User Icons -->
        <div class="nav2-login">
         <a href="Views/LoginRegistration.php"><span><i class="fa-solid fa-right-to-bracket"></i></span></a>
        </div>
        <div class="nav2-user">
          <a href="#"><i class="fa-solid fa-user"></i></a>
        </div>
      </div>
    </header>
    <!-- Main Section -->
    <section id="home">
      <!-- Home Text and Discover Link -->
      <div class="home-text">
        <p class="discover">Discover</p>
        <p class="Xton">XTON Airport</p>
        <a href="#">Find Out More</a>
        <i class="fa-solid fa-arrow-right"></i>
      </div>
      <!-- Arrow Links -->
      <div class="arrow-right">
        <a href="#"><i class="fa-solid fa-circle-arrow-right"></i></a>
      </div>
      <div class="arrow-left">
        <a href="#"><i class="fa-solid fa-circle-arrow-left"></i></a>
      </div>
      <!-- Arrivals Section -->
      <section class="arrivals">
        <!-- Arrivals Text and Details -->
        <div class="arrivals-text">
          <p>Arrivals</p>
          <p>Departures</p>
          <p>
            <span>Location | </span><span>Time | </span><span>Temperature</span>
            <i class="fa-solid fa-cloud-sun-rain"></i>
          </p>
        </div>
        <!-- Arrival Inputs -->
        <div class="arrival-input">
          <div class="date">
            pick a date
            <i class="fa-solid fa-arrow-right"></i>
            <input type="date" />
          </div>
          <div class="search-arrivals">
            <input type="text" placeholder="Search airline, flight or city" />
            <div class="search-icon2">
              <i class="fa-solid fa-magnifying-glass"></i>
            </div>
          </div>
          <div class="view-arrivals">
            <a href="#">View all arrivals</a>
            <i class="fa-solid fa-arrow-right"></i>
          </div>
        </div>
      </section>
    </section>
    <!-- Additional Home Section -->
    <section id="home-2">
      <!-- Options Section -->
      <div class="home-2-op">
        <div class="options">
          <div class="target">
            <i class="fa-solid fa-bullseye"></i>
            Which terminal?
          </div>
          <div class="target2">
            <a href="#">Find my terminal</a>
            <i class="fa-solid fa-arrow-right"></i>
          </div>
        </div>
        <div class="options">
          <div class="services">
            <i class="fa-solid fa-hand-holding-heart"></i>
            services
          </div>
          <div class="services2">
            <a href="#">Find a service</a>
            <i class="fa-solid fa-arrow-right"></i>
          </div>
        </div>
        <div class="options">
          <div class="restaurant">
            <i class="fa-solid fa-utensils"></i>
            Restaurants at Airport
          </div>
          <div class="restaurant2">
            <a href="Views/RestaurentPage.php">Browse Cafes and Restaurants</a>
            <i class="fa-solid fa-arrow-right"></i>
          </div>
        </div>
        <div class="options">
          <div class="shopping">
            <i class="fa-solid fa-cart-shopping"></i>
            Shopping at Airport
          </div>
          <div class="shopping2">
            <a href="#">Shop Now</a>
            <i class="fa-solid fa-arrow-right"></i>
          </div>
        </div>
      </div>
    </section>
    <!-- Expert Chat -->
    <div class="expert">
      <p>
        <i class="fa-brands fa-rocketchat"></i>
        Chat With an Expert &nbsp;
      </p>
    </div>
    <!-- Footer Section -->
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
  </div>
</body>
</html>