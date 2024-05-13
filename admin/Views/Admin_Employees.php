<?php
session_start();
if(empty($_SESSION['admin'])){
    header("location:../../Views/LoginRegistration.php");
  }
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AdminEmployees</title>
        <link rel="stylesheet" href="Admin_Employees.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==
        " crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <div class="BackgroundImg"></div>
        <form method="get">
            <div>
                <button formaction="Admin_Dashboard.php" id="logo"></button> 
            </div> 
        </form>
        
        <form method="get">
            <div id="button_f">
            <button formaction="Admin_Dashboard.php" class="Other_button1" id="Dashboard"><i class="fa-solid fa-chart-column"></i>&nbsp;Dashboard</button><br><br>
            <button formaction="Admin_Passenger.php" class="Other_button" id="Passengers"><i class="fa-solid fa-person-walking-luggage"></i>&nbsp;Passengers</img></button><br><br>
            <button formaction="Admin_Restaurants.php" class="Other_button" id="Resturents"><i class="fa-solid fa-utensils"></i>&nbsp;Restaurants</button><br><br>
            <button formaction="Admin_Stores.php" class="Other_button" id="Stores"><i class="fa-solid fa-store"></i>&nbsp;Stores</button><br><br>
            <button formaction="Admin_Employees.php" id="Employees"><i class="fa-solid fa-user-tie"></i>&nbsp;Employees</button><br><br>
            <button formaction="Admin_Service_Provider.php" class="Other_button" id="Service_Provider"><i class="fa-solid fa-user-gear"></i>Service Provider</button><br><br>
            <button formaction="Admin_Airlines.php" class="Other_button" id="Airlines"><i class="fa-solid fa-plane-departure"></i>&nbsp;Airlines</button><br><br>
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
        <form method="get">
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
            <div id="content_Name"><p>Employees</p></div>
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
                <div id="Contents1">
                    <!-- Employee LIST-->
                    <h2 id="H">List of the Employees</h2>
                    <div id="Scrolable-Table">
                        <?php require_once('../Controllers/Admin_All_Emp_List.php');?>
                        <form method="post" action="../Controllers/Admin_All_Emp_List.php">
                            <table id="Table" border="1">
                                <tr id="TH">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Image</th>
                                    <th>Salary</th>
                                    <th>Role</th>
                                    <th>Ratings</th>
                                    <th>Gender</th>
                                </tr>
                                <?php
                                    while($r = mysqli_fetch_assoc($List)){ 
                                ?>
        
                                <tr id="TD">
                                    <td> <?php echo $r["Emp_Id"] ?> </td>
                                    <td> <?php echo $r["Emp_Name"] ?> </td>
                                    <td> <?php echo $r["Emp_Mobile"] ?> </td>
                                    <td> <?php echo $r["Emp_Email"] ?> </td>
                                    <td> <?php echo $r["Emp_Address"] ?> </td>
                                    <td> <?php echo "<img src='data:;base64,".base64_encode($r["Emp_Image"]).
                                    "' alt='image' style='width: 3vw'>" ?> </td>
                                    <td> <?php echo $r["Emp_Salary"] ?>$</td>
                                    <td> <?php echo $r["Emp_Role"] ?> </td>
                                    <td> <?php echo $r["Emp_Ratings"] ?> </td>
                                    <td> <?php echo $r["Emp_Gender"] ?> </td>
                                </tr> <?php
                                }
                                ?>
                            </table>
                        </form>
                    </div> 
                
                <!--ADD Employee-->
                <div id="Contents2">
                    <div id="Add">
                        <h2 id="H">Insert New Employee</h2>
                        '*' Symbol included box should be filled to complete insertion.
                        <form method="post" enctype="multipart/form-data" action="../Controllers/Admin_Insrt_Emp.php">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID:<input type="number" class="Contents2" id="Id" name="Id"><lebel id="star">*</lebel><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;Name:<input type="text" class="Contents2" id="Name" name="Name"><lebel id="star">*</lebel><br>
                            &nbsp;&nbsp;Password:<input type="password" class="Contents2" id="Password" name="Password"><lebel id="star">*</lebel><br>
                            &nbsp;&nbsp;Mobile:<input type="number" class="Contents2" id="Mobile" name="Mobile"><lebel id="star">*</lebel><br>
                            &nbsp;&nbsp;Email:<input type="email" class="Contents2" id="Email" name="Email"><br>
                            Address:<input type="text" class="Contents2" id="Address" name="Address"><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Image:<input type="file" class="Contents2" id="Image" name="Image"><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Salary:<input type="float" class="Contents2" id="Salary" name="Salary"><br>
                            &nbsp;&nbsp; Role:<input type="text" class="Contents2" id="Role" name="Role"><br>
                            &nbsp;&nbsp; Ratings:<input type="number" class="Contents2" id="Ratings" name="Ratings"><br>
                            Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="Radio" id="Gender" name="Gender" value="Male">Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" class="Radio" id="Gender" name="Gender" value="Female">Female<br>
                            <button type="submit" id="Insert"><i class="fa-solid fa-file-arrow-down"></i> Insert</button>
                            <?php
                            //Pop Up Code--------------------------------------------------------------
                            if(!empty($_SESSION['Emp_Insert1']))
                            { 
                            ?>
                            <script>swal("Success!", "Employee Added.", "success");</script>
                            <?php unset($_SESSION['Emp_Insert1']) ?>
                            <?php
                            }
                            else if(!empty($_SESSION['Emp_Insert2']))
                            { 
                            ?>
                            <script>swal("Failed", "Please, fill the box correctly.", "error");</script>
                            <?php unset($_SESSION['Emp_Insert2']) ?>
                            <?php
                            }
                            else if(!empty($_SESSION['Emp_Insert3']))
                            { 
                            ?>
                            <script>swal("Failed", "Please, fill the box correctly.", "error");</script>
                            <?php unset($_SESSION['Emp_Insert3']) ?>
                            <?php
                            }
                            ?>
                        </form>
                    </div>
                </div>
                <!-- Delete Item From List -->
                <div id="Contents3">
                    <div id="Delete-Item">
                        <h2 id="H">Delete Employee</h2><br>
                        <form method="post" action='../Controllers/Admin_Check_Emp_Delete.php'>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID:<input id="ID" type="number" name="ID"><br><br>
                            Name:<input id="Name" type="text" name="Name"><br>
                            <button  type="submit" id="Delete" name="delete"> <i class="fa-solid fa-trash"></i> Delete</button>
                            <?php
                            //Pop Up Code--------------------------------------------------------------
                            if(!empty($_SESSION['Emp_Delete1']))
                                { 
                            ?>
                                <script>swal("Success!", "Employee Deleted.", "success");</script>
                            <?php unset($_SESSION['Emp_Delete1']) ?>
                
                            <?php
                            }
                            else if(!empty($_SESSION['Emp_Delete2']))
                            { 
                            ?>
                            <script>swal("Failed", "Please, fill the box Correctly.", "error");</script>
                            <?php unset($_SESSION['Emp_Delete2']) ?>
                            <?php
                            }
                            ?>
                        </form> 
                    </div>
                </div>       
            </div>        
    </body>     
</html>