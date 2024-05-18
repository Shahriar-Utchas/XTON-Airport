<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Information</title>
    
    <!-- <link rel="stylesheet" href="request.css"> -->
    <link rel="stylesheet" href="requestinformation.css">
    <link rel="icon" type="image/x-icon" href="img/logo.ico" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
       
    </style>
</head>
<body>

   <div class="navbarbackground">
    <div class="logo">
        <img src="img/requestpic/logo.png" alt="" class="navlogo">
    </div>
    <div class="notificationicon">
        <img src="img/requestpic/notificationicon.png" alt="" class="notificationimage">
    </div>

    <div class="logouticon">
        <img src="img/requestpic/logouticon.png" alt="" class="logoutimage">
        
    </div>
  <div class="name">
    <h5>SHAH KAMAL</h5>
  </div>
   </div>


<div class="navbar">

    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Payment</a></li>
        <li><a href="#">Settings</a></li>
    </ul>

</div>

</div>


<div class="leftoptions">

    


<div class="parking">
    <a href="parkingtable.php">
        <div class="parkingicon">
            <img src="img/requestpic/parkingicon.png" alt="" class="parkingimage">
            <div class="parkingname">
                <h4>parking</h4>
            </div>
        </div>
    </a>
</div>



<div class="lounge">
    <div class="loungeicon">
  <img src="img/requestpic/loungeicon.png" alt="" class="loungeimage">
   <div class="loungename">
    <h4>lounge</h4>
   </div>
    </div>
</div>



<div class="emergency">
    <div class="emergencyicon">
  <img src="img/requestpic/emergencyicon.png" alt="" class="emergencyimage">
   <div class="emergencyname">
    <h4>emergency</h4>
   </div>
    </div>
</div>



<div class="terminaldrop">
    <div class="terminaldropicon">
  <img src="img/requestpic/droppofficon.png" alt="" class="terminaldropimage">
   <div class="terminaldropname">
    <h4>  Drop-off</h4>
   </div>
    </div>
</div>




<div class="vip">
    <div class="vipicon">
  <img src="img/requestpic/vip-card.png" alt="" class="vipiconimage">
   <div class="vipname">
    <h4>  VIP</h4>
   </div>
    </div>
</div>


</div>




<div class="application"></div>
 
<div class="applicationheadline">
    <h2>Request Application</h2>
</div>
  

<!-- <div class="applicationheadline2">
    <h2>Request History</h2>
</div> -->

<!-- <h2>Table Data</h2> -->
<div class="container">
    <div class="table-container">
        <table>
            <tr>
                <th>Name</th>
                <th>ID</th>
                <th>Email</th>
                <th>Date</th>
                <th>Time</th>
                <th>Slot Number</th>
                <th>Action</th> <!-- Added a new column for the delete icon -->
            </tr>
            <?php
            // Database connection parameters
            $servername = "localhost"; // Change this if your MySQL server is on a different host
            $username = "root"; // Your MySQL username
            $password = ""; // Your MySQL password
            $dbname = "abb"; // Your database name
            $table = "ab3"; // Your table name

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to select all data from the table
            $sql = "SELECT NAME, ID, EMAIL, DATE, TIME, SLOTNUMBER FROM $table";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data in a table format
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["NAME"] . "</td>";
                    echo "<td>" . $row["ID"] . "</td>";
                    echo "<td>" . $row["EMAIL"] . "</td>";
                    echo "<td>" . $row["DATE"] . "</td>";
                    echo "<td>" . $row["TIME"] . "</td>";
                    echo "<td>" . $row["SLOTNUMBER"] . "</td>";
                    // Add the delete icon with a link to delete.php passing the row ID
                    echo "<td>";
                    echo "<a href='delete_record.php?id=" . $row["ID"] . "&type=wrong'>";
                    echo "<img src='img/requestpic/wrongicon.png' alt='Delete' class='delete-icon'>";
                    echo "</a>";
                    // Add the right icon with a link to delete.php passing the row ID
                    echo "<a href='delete_record.php?id=" . $row["ID"] . "&type=right'>";
                    echo "<img src='img/requestpic/righticon.png' alt='Accept' class='delete-icon'>";
                    echo "</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>0 results</td></tr>";
            }

            // Close connection
            $conn->close();
            ?>
        </table>
    </div>
</div>


<div class="acceptcontainer">
    <div class="accepttable-container">
    <h2>ACCEPT PASSENGER</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>ID</th>
                <th>Email</th>
                <th>Slot Number</th>
            </tr>
            <?php
            // Database connection parameters
            $servername = "localhost"; // Change this if your MySQL server is on a different host
            $username = "root"; // Your MySQL username
            $password = ""; // Your MySQL password
            $dbname = "abb"; // Your database name
            $table = "ACCEPT"; // Your table name

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to select all data from the table
            $sql = "SELECT NAME, ID, EMAIL, SLOTNUMBER FROM $table";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data in a table format
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["NAME"] . "</td>";
                    echo "<td>" . $row["ID"] . "</td>";
                    echo "<td>" . $row["EMAIL"] . "</td>";
                    echo "<td>" . $row["SLOTNUMBER"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>0 results</td></tr>";
            }

            // Close connection
            $conn->close();
            ?>
        </table>
    </div>
</div>


<div class="rejectcontainer">
    <div class="rejecttable-container">
    <h2>REJECT PASSENGER</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>ID</th>
                <th>Email</th>
                <th>Slot Number</th>
            </tr>
            <?php
            // Database connection parameters
            $servername = "localhost"; // Change this if your MySQL server is on a different host
            $username = "root"; // Your MySQL username
            $password = ""; // Your MySQL password
            $dbname = "abb"; // Your database name
            $table = "REJECT"; // Your table name

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to select all data from the table
            $sql = "SELECT NAME, ID, EMAIL, SLOTNUMBER FROM $table";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data in a table format
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["NAME"] . "</td>";
                    echo "<td>" . $row["ID"] . "</td>";
                    echo "<td>" . $row["EMAIL"] . "</td>";
                    echo "<td>" . $row["SLOTNUMBER"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>0 results</td></tr>";
            }

            // Close connection
            $conn->close();
            ?>
        </table>
    </div>
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

</body>
</html>
