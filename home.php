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
          <p >
            <a href="#" id ="airport">At the Airport</a>
          </p>
          <p>
            <a href="#" id = "flights">Flights</a>
          </p>
          <p>
            <a href="#" id = "booking">Booking</a>
          </p>
          <p>
            <a href="#" id = "reward">Reward</a>
          </p>
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
      </div>
      <ul class="drop-down">
          <div class="drop-down-op">
              <li><a href="#">Shopping</a></li>
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
            <span id = "loc">Dhaka, Bangladesh | </span><span id = "time">Time | </span><span id = "temp"> Temperature</span>
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
           <span id = "arrival"> View all Arrivals </span>
            <i class="fa-solid fa-arrow-right"></i>
          </div>
        </div>
        <?php 
            require_once('Controllers/homeController.php');
            $result = getArrivals();
        ?>
        <div class="arrival-table">
        <table border="1" style="background-color: #f2f2f2;">
           <tr>
               <th>Time</th>
               <th>Flight</th>
               <th>Arriving From</th>
               <th>Airline</th>
               <th>Terminal</th>
               <th>Status</th>
           </tr>
           <?php while($r=mysqli_fetch_assoc($result)){ ?>
           <tr>
                <td><?php echo $r["time"]; ?></td>
                <td><?php echo $r["flight"]; ?></td>
                <td><?php echo $r["from"]; ?></td>
                <td><?php echo $r["airline"]; ?></td>
                <td><?php echo $r["terminal"]; ?></td>
                <td><?php echo $r["status"]; ?></td>
           </tr>
           <?php } ?>
           
        </table>
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

  <script>
    function updateClock() {
    const now = new Date();
    let hours = now.getHours();
    const meridiem = hours >= 12 ? "PM" : "AM";
    hours = hours % 12 || 12;
    hours = hours.toString().padStart(2, 0);
    const minutes = now.getMinutes().toString().padStart(2, 0);
    const seconds = now.getSeconds().toString().padStart(2, 0);
    const timeString = ` ${hours}:${minutes}:${seconds} ${meridiem} |`;
    document.getElementById("time").textContent = timeString;
    }
  updateClock();
  setInterval(updateClock, 1000);  
  </script>

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

    //arrivals

    document.getElementById("arrival").addEventListener("click", function(){
      if(document.querySelector(".arrival-table").style.visibility === "hidden"){
        document.querySelector(".arrival-table").style.visibility = "visible";
      }
      else {
        document.querySelector(".arrival-table").style.visibility = "hidden";
      }
    });

  </script>
  <script src="JS/weather.js"></script>

</body>
</html>
