<?php
session_start();
if(empty($_SESSION['admin'])){
    header("location:../../Views/LoginRegistration.php");
  }
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AdminStores</title>
        <link rel="stylesheet" href="Admin_Stores.css">
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
            <button formaction="Admin_Stores.php" id="Stores"><i class="fa-solid fa-store"></i>&nbsp;Stores</button><br><br>
            <button formaction="Admin_Employees.php" class="Other_button" id="Employees"><i class="fa-solid fa-user-tie"></i>&nbsp;Employees</button><br><br>
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
          
    </script>
            <form method="get">
            <!--Outbox-->
            <div id="outer_f"></div>
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
            <div id="content_Name"><p>Stores</p></div>
            <!--Content Form-->
            <div id="content_f"></div>
            </form>
            <div class="datetime">
                <div class="time"></div>
                <div class="date"></div>
                <script type="text/javascript" src="clock.js" defer></script>  
            </div>


    <!--Inside Form-->
<div class="Contents">
                <!-- Store LIST-->
    <div id="Contents1">
        <h2 id="H">List of the Stores</h2>
        <!--Search box-->
        <div>           
                <input type="text" placeholder="Search..." id="search" onkeyup="filterTable()">
                <button type="button" id="search_i"><i class="fa-solid fa-magnifying-glass"></i></button>
                <script>
                function filterTable() {
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("search");
                    filter = input.value.toLowerCase();
                    table = document.getElementById("Table");
                    tr = table.getElementsByTagName("tr");

                    for (i = 1; i < tr.length; i++) { // start from 1 to skip the header row
                        tr[i].style.display = "none"; // hide the row initially
                        td = tr[i].getElementsByTagName("td");
                        for (var j = 0; j < td.length; j++) {
                            if (td[j]) {
                                txtValue = td[j].textContent || td[j].innerText;
                                if (txtValue.toLowerCase().indexOf(filter) > -1) {
                                    tr[i].style.display = ""; // show the row if a match is found
                                    break;
                                }
                            }
                        }
                    }
                }
                </script>
                </div>
        <div id="Scrolable-Table">
            <?php require_once('../Controllers/Admin_All_Store_List.php');?>
            <form method="post" action="../Controllers/Admin_All_Store_List.php">
            <table id="Table" border="1">
            <tr id="TH">
               <th>ID</th>
               <th>Name</th>
               <th>Mobile</th>
               <th>Address</th>
               <th>Type</th>
               <th>Rating</th>
               <th>Revenue</th>
               <th>Action</th>
               
            </tr>
            <?php
            while($r = mysqli_fetch_assoc($List)){ 
            ?>
            <tr id="TD">
            <td> <?php echo $r["Store_Id"] ?> </td>
            <td> <?php echo $r["Store_Name"] ?> </td>
            <td> <?php echo $r["Store_Mobile"] ?> </td>
            <td> <?php echo $r["Store_Address"] ?> </td>
            <td> <?php echo $r["Store_Type"] ?> </td>
            <td> <?php echo $r["Store_Rating"] ?> </td>
            <td> <?php echo $r["Store_Revenue"] ?> </td>
            <td>
                    <form method="post" action="../Controllers/Admin_All_Store_List.php">
                        <input type="hidden" name="Store_Id" value="<?php echo $r['Store_Id']; ?>">
                        <button type="submit" id="Delete" name="Delete">
                            <i class="fa-solid fa-trash"></i> Delete
                        </button>
                      </form></td>
            </tr>
            <?php
            }
            ?>
            </table>
            </form>
        </div>
                            <!--ADD Store-->
    <div id="Contents2">
    <div id="Add">
    <h2 id="H">Insert New Store</h2>
        '*' Symbol included box should be filled to complete insertion.
        <form method="post" action="../Controllers/Admin_Insrt_Store.php">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID:<input type="number" class="Contents2" id="Id" name="Id"><lebel id="star">*</lebel><br>
            &nbsp;&nbsp;&nbsp;&nbsp;Name:<input type="text" class="Contents2" id="Name" name="Name"><lebel id="star">*</lebel><br>
            &nbsp;&nbsp;Mobile:<input type="number" class="Contents2" id="Mobile" name="Mobile"><lebel id="star">*</lebel><br>
            Address:<input type="text" class="Contents2" id="Address" name="Address"><lebel id="star">*</lebel><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Type:<input type="text" class="Contents2" id="Type" name="Type"><br>
            &nbsp;&nbsp; Rating:<input type="float" class="Contents2" id="Rating" name="Rating"><br>
            Revenue:<input type="float" class="Contents2" id="Revenue" name="Revenue"><br>
            <button type="submit" id="Insert"><i class="fa-solid fa-file-arrow-down"></i> Insert</button>
            <?php
        //Pop Up Code--------------------------------------------------------------
            if(!empty($_SESSION['S_Insert1']))
            { 
            ?>
                <script>swal("Success!", "Store Added.", "success");</script>
                <?php unset($_SESSION['S_Insert1']) ?>
                
            <?php
            }
            else if(!empty($_SESSION['S_Insert2']))
            { 
            ?>
                <script>swal("Failed", "Please, fill the box correctly.", "error");</script>
                <?php unset($_SESSION['S_Insert2']) ?>
            <?php
            }
            else if(!empty($_SESSION['S_Insert3']))
            { 
                ?>
                    <script>swal("Failed", "Please, fill the box correctly.", "error");</script>
                    <?php unset($_SESSION['S_Insert3']) ?>
                <?php
            }
            ?>
            
        </form>
    </div>
    </div>
                            <!--UPDATE Store INFO -->
    <div id="Contents3">
    <div id="Update"> 
    <h2 id="H">Update Existing Store</h2><br>
        <form method="post" action="../Controllers/Admin_Update_Store.php">
            ID: <input id="ID" type="number" name="ID">
            Name: <input id="Name" type="text" name="Name"><br>
            <h3 id="H3"><u>New Entry Form.</u></h3>
            <label id="Label">(Keep empty if no update require in any field.)</label><br>
            &nbsp;&nbsp;New-Mobile: <input type="number" name="Mobile" id="Mobile"><br>
            New-Address: <input type="text" name="Address" id="Address"><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New-Type: <input type="text" name="Type" id="Type"><br>
            <button type="submit" id="UpdateB"><i class="fa-solid fa-arrow-up-from-bracket"></i> Update</button>
            <?php
        //Pop Up Code--------------------------------------------------------------
            if(!empty($_SESSION['S_Update1']))
            { 
            ?>
                <script>swal("Success!", "Store Updated.", "success");</script>
                <?php unset($_SESSION['S_Update1']) ?>
                
            <?php
            }
            else if(!empty($_SESSION['S_Update2']))
            { 
            ?>
                <script>swal("Failed", "Please, fill the box correctly.", "error");</script>
                <?php unset($_SESSION['S_Update2']) ?>
            <?php
            }
        ?>
        </form>
    </div>
    </div>
</div>

    </body>
</html>