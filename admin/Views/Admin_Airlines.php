<?php
session_start();
if(empty($_SESSION['admin'])){
    header("location:../../Views/LoginRegistration.php");
}
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AdminAirlines</title>
        <link rel="stylesheet" href="Admin_Airlines.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==
        " crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <div class="BackgroundImg"></div>
        <form method="post">
            <div>
                <button formaction="Admin_Dashboard.php" id="logo"></button> 
            </div> 
        </form>
        
        <form method="post">
            <div id="button_f">
            <button formaction="Admin_Dashboard.php" class="Other_button1" id="Dashboard"><i class="fa-solid fa-chart-column"></i>&nbsp;Dashboard</button><br><br>
            <button formaction="Admin_Passenger.php" class="Other_button" id="Passengers"><i class="fa-solid fa-person-walking-luggage"></i>&nbsp;Passengers</img></button><br><br>
            <button formaction="Admin_Restaurants.php" class="Other_button" id="Resturents"><i class="fa-solid fa-utensils"></i>&nbsp;Restaurants</button><br><br>
            <button formaction="Admin_Stores.php" class="Other_button" id="Stores"><i class="fa-solid fa-store"></i>&nbsp;Stores</button><br><br>
            <button formaction="Admin_Employees.php" class="Other_button" id="Employees"><i class="fa-solid fa-user-tie"></i>&nbsp;Employees</button><br><br>
            <button formaction="Admin_Service_Provider.php" class="Other_button" id="Service_Provider"><i class="fa-solid fa-user-gear"></i>Service Provider</button><br><br>
            <button formaction="Admin_Airlines.php" id="Airlines"><i class="fa-solid fa-plane-departure"></i>&nbsp;Airlines</button><br><br>
            <button formaction="Admin_Settings.php"class="Other_button" id="Settings"><i class="fa-solid fa-gear"></i>&nbsp;Settings</button><br><br> 
            </div>
        </form>

           <div>
                <button id="Logout" onclick = "logout()"></button>
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
                                window.location.href = "../../Views/LoginRegistration.php";
                            }
                        };
                        xhr.send();

                  }
            });

        }
    </script>
        <form method="post">
            <!--Outbox-->
            <div id="outer_f"></div>
            <!--Search box-->
          <div>
            <form method="post" action="">
              <input type="text" placeholder="Search..." id="search" name="search">
              <button type="submit" name="search_i" id="search_i"><i class="fa-solid fa-magnifying-glass"></i></button>
              <?php 
              if(isset($_POST['search_i']))
              {
                if($_POST['search']=="D" || $_POST['search']=="d"){
                header("location: Admin_Dashboard.php");
              }
              else if ($_POST['search']=="P" || $_POST['search']=="p") {
                header("location: Admin_Passenger.php");
              }
              else if ($_POST['search']=="R" || $_POST['search']=="r") {
                header("location: Admin_Restaurants.php");
              }
              else if ($_POST['search']=="St" || $_POST['search']=="st" || $_POST['search']=="St" || $_POST['search']=="sT") {
                header("location: Admin_Stores.php");
              }
              else if ($_POST['search']=="E" || $_POST['search']=="e") {
                header("location: Admin_Employees.php");
              }
              else if ($_POST['search']=="S" || $_POST['search']=="s") {
                header("location: Admin_Settings.php");
              }
              else if ($_POST['search']=="SP" || $_POST['search']=="sp" || $_POST['search']=="Sp" || $_POST['search']=="sP") {
                header("location: Admin_Service_Provider.php");
              }
              else if ($_POST['search']=="A" || $_POST['search']=="a") {
                header("location: Admin_Airlines.php");
              }
              }
              ?>
            </form>
          </div> 
            <!--Admin Name-->
            <p id="admin_Name">
            <?php 
            require_once('../Controllers/Admin_Name_Show.php');
            while($req = mysqli_fetch_assoc($name)){
                echo $req["Admin_Name"];
            }
            ?>
            </p>
            <!--Admin Photo-->
            <form method="post">
                <button formaction="Admin_Settings.php" id="admin_Photo">   
            </form>
            <?php 
            require_once('../Controllers/Admin_Image_Show.php');
            while($req = mysqli_fetch_assoc($Image)){
                echo "<img src='data:;base64,".base64_encode($req["Admin_Image"])."' alt='image' style='width: 3vw'>";
            }
            ?>
            </button>
            
            <!--Content Name-->
            <div id="content_Name"><p>Airlines</p></div>
            <!--Content Form-->
            <div id="content_f"></div>
        </form>
    </form>
    <div class="datetime">
        <div class="time"></div>
        <div class="date"></div>
        <script type="text/javascript" src="clock.js" defer></script>  
    </div>
    <!--Inside Form-->
<div class="Contents">
                <!-- Airlines LIST-->
    <div id="Contents1">
        <h2 id="H">List of the Airlines</h2>
        <div id="Scrolable-Table">
            <?php require_once('../Controllers/Admin_All_Airln_List.php');?>
            <form method="post" action="../Controllers/Admin_All_Airln_List.php">
            <table id="Table" border="1">
            <tr id="TH">
               <th>ID</th>
               <th>Name</th>
               <th>Mobile</th>
               <th>Destinations</th>
               <th>Type</th>
               <th>Rating</th>
               <th>Revenue</th>
               <th>Passenger Served</th>
               <th>Flight Operated</th>
            </tr>
            <?php
            while($r = mysqli_fetch_assoc($List)){ 
            ?>
        
            <tr id="TD">
            <td> <?php echo $r["Airlines_Id"] ?> </td>
            <td> <?php echo $r["Airlines_Name"] ?> </td>
            <td> <?php echo $r["Airlines_Mobile"] ?> </td>
            <td> <?php echo $r["Airlines_Destination"] ?> </td>
            <td> <?php echo $r["Airlines_Type"] ?> </td>
            <td> <?php echo $r["Airlines_Rating"] ?> </td>
            <td> <?php echo $r["Airlines_Revenue"] ?> </td>\
            <td> <?php echo $r["Pass_Served"] ?> </td>
            <td> <?php echo $r["Flight_Operated"] ?> </td>
            </tr>
            <?php
            }
            ?>
            </table>
            </form>
        </div>
    
                 <!-- Delete Item From List -->
        <div id="Delete-Item">
        <h2 id="H">Delete Airline</h2><br>
        <form method="post" action='../Controllers/Admin_Check_Airln_Delete.php'>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID:<input id="ID" type="number" name="ID"><br><br>
        Name:<input id="Name" type="text" name="Name"><br>
        <button  type="submit" id="Delete" name="delete"> <i class="fa-solid fa-trash"></i> Delete</button>
        <?php
        //Pop Up Code--------------------------------------------------------------
        if(!empty($_SESSION['A_Delete1']))
        { 
        ?>
            <script>swal("Success!", "Airline Deleted.", "success");</script>
            <?php unset($_SESSION['A_Delete1']) ?>
            
        <?php
        }
        else if(!empty($_SESSION['A_Delete2']))
        { 
        ?>
            <script>swal("Failed", "Please, fill the box correctly.", "error");</script>
            <?php unset($_SESSION['A_Delete2']) ?>
        <?php
        }
    ?>
        </form> 
    </div>
</div>
                            <!--ADD Airline-->
    <div id="Contents2">
    <div id="Add">
    <h2 id="H">Insert New Airline</h2>
        '*' Symbol included box should be filled to complete insertion.
        <form method="post" action="../Controllers/Admin_Insrt_Airln.php">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID:<input type="number" class="Contents2" id="Id" name="Id"><lebel id="star">*</lebel><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name:<input type="text" class="Contents2" id="Name" name="Name"><lebel id="star">*</lebel><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile:<input type="number" class="Contents2" id="Mobile" name="Mobile"><lebel id="star">*</lebel><br>
            Destination:<input type="text" class="Contents2" id="Destination" name="Destination"><lebel id="star">*</lebel><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Type:<input type="text" class="Contents2" id="Type" name="Type"><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rating:<input type="number" class="Contents2" id="Rating" name="Rating"><br>
            &nbsp;&nbsp;&nbsp;&nbsp;Revenue:<input type="number" class="Contents2" id="Revenue" name="Revenue"><br>
            <button type="submit" id="Insert"><i class="fa-solid fa-file-arrow-down"></i> Insert</button>
            <?php
        //Pop Up Code--------------------------------------------------------------
            if(!empty($_SESSION['A_Insert1']))
            { 
            ?>
                <script>swal("Success!", "Airline Added.", "success");</script>
                <?php unset($_SESSION['A_Insert1']) ?>
                
            <?php
            }
            else if(!empty($_SESSION['A_Insert2']))
            { 
            ?>
                <script>swal("Failed", "Please, fill the box correctly.", "error");</script>
                <?php unset($_SESSION['A_Insert2']) ?>
            <?php
            }
            else if(!empty($_SESSION['A_Insert3']))
            { 
                ?>
                    <script>swal("Failed", "Please, fill the box correctly.", "error");</script>
                    <?php unset($_SESSION['A_Insert3']) ?>
                <?php
            }
            ?>
        </form>
    </div>
    </div>
                            <!--UPDATE Airline INFO -->
    <div id="Contents3">
    <div id="Update"> 
    <h2 id="H">Update Existing Airline</h2><br>
        <form method="post" action="../Controllers/Admin_Update_Airln.php">
            ID: <input id="ID" type="number" name="ID">
            Name: <input id="Name" type="text" name="Name"><br>
            <h3 id="H3"><u>New Entry Form.</u></h3>
            <label id="Label">(Keep empty if no update require in any field.)</label><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New-Mobile: <input type="number" name="Mobile" id="Mobile"><br>
            New-Destinatios: <input type="text" name="Destination" id="Destination"><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New-Type: <input type="text" name="Type" id="Type"><br>
            <button type="submit" id="UpdateB"><i class="fa-solid fa-arrow-up-from-bracket"></i> Update</button>
            <?php
        //Pop Up Code--------------------------------------------------------------
            if(!empty($_SESSION['A_Update1']))
            { 
            ?>
                <script>swal("Success!", "Airline Updated.", "success");</script>
                <?php unset($_SESSION['A_Update1']) ?>
                
            <?php
            }
            else if(!empty($_SESSION['A_Update2']))
            { 
            ?>
                <script>swal("Failed", "Please, fill the box correctly.", "error");</script>
                <?php unset($_SESSION['A_Update2']) ?>
            <?php
            }
        ?>
        </form>
    </div>
    </div>
</div>

    </body>
</html>