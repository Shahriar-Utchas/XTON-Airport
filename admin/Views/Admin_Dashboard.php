<?php
session_start();
if(empty($_SESSION['admin'])){
  header("location:../../Views/LoginRegistration.php");
}
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AdminDashboard</title>
        <link rel="stylesheet" href="Admin_Dashboard.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==
        " crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body onload="initClock()">
        <div class="BackgroundImg"></div>
        <form method="get">
            <div>
                <button formaction="Admin_Dashboard.php" id="logo"></button> 
            </div> 
        </form>
        <form method="post">  
            <div id="button_f">
                <button formaction="Admin_Dashboard.php" id="Dashboard"><i class="fa-solid fa-chart-column"></i>&nbsp;Dashboard</button><br><br>
                <button formaction="Admin_Passenger.php" class="Other_button" id="Passengers"><i class="fa-solid fa-person-walking-luggage"></i>&nbsp;Passengers</img></button><br><br>
                <button formaction="Admin_Restaurants.php" class="Other_button" id="Resturents"><i class="fa-solid fa-utensils"></i>&nbsp;Restaurants</button><br><br>
                <button formaction="Admin_Stores.php" class="Other_button" id="Stores"><i class="fa-solid fa-store"></i>&nbsp;Stores</button><br><br>
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

        </div> 
        <form method="get">
                                        <!--Outbox-->
            <div id="outer_f"></div>
                                        <!--Notification-->
            <?php 
            ob_start();
            require_once('../Controllers/Admin_Notification_Check.php'); 
            ob_end_flush();     
          //Pop Up Code--------------------------------------------------------------
           if(!empty($_SESSION['Nf_Check1']))
          {   
          ?> 
              <form method="post" action="">
              <button type="submit" name="2" id="Notification2"></button>
           
          </form>
          <?php 
           
           if(isset($_REQUEST['2']))
            {
              require_once('../Controllers/Admin_Unseen_to_Seen.php'); 
              ?>
              <script>swal("Warning!", "New Comment and Review Added.", "warning").then(() => {
                window.location.reload();
            });
        </script>           
            <?php
            unset($_SESSION['Nf_Check1']);
            }            
          }
          else 
          { 
          ?>
          <form method="post" action="">
              <button type="submit" name="1" id="Notification1"></button>   
          </form> 
          <?php
          }
          ?>   
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
            <div id="content_Name"><p>Dashboard</p></div>
                                        <!--Content Form-->
            <div id="content_f"></div>
                                        <!--Time-Date-->
        </form>
        <div class="datetime">
            <div class="time"></div>
            <div class="date"></div>
            <script type="text/javascript" src="clock.js" defer></script>  
        </div>                
                               <!--  Forms inside  -->
        <div id="Form1">
        <h1>&nbsp;&nbsp;Yearly Revenue</h1><br>
            <canvas id="BarChart" aria-label="chart" role="img"></canvas>
            <?php require_once('../Controllers/Admin_Yearly_Revenue_Show.php');
            while($req1 = mysqli_fetch_assoc($List1)){
                foreach($req1 as $data1){
                    $Year[]=$data1;
                    
                }
            }
            require_once('../Controllers/Admin_Yearly_Revenue_Show.php');
            while($req2 = mysqli_fetch_assoc($List2)){
                foreach($req2 as $data2){
                    $Amount[]=$data2;
                    
                }
            }  
            ?>
            <script>
    var ctx = document.getElementById("BarChart").getContext("2d");

        let Label = <?php echo json_encode($Year) ?>;
let Data = <?php echo json_encode($Amount) ?>;
let Bg_Color = [
  "#9bb7ff",
  //"#a159da",
  //"#da59d3",
  //"#7759da",
  //"#5990da",
  //"#59ceda",
  //"#59da96",
  //"#83da59",
  //"#bcda59",
  //"#dab359",
];

var BarChart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: Label,
    datasets: [
      {
        label: "Revenue($)",
        data: Data,
        backgroundColor: Bg_Color,
        borderColor: ["black"],
        borderWidth: 2,
        
      },
    ],
  },
  options: {
    resposive: true,
    layout: {
      padding: {
        left: 10,
        right: 10,
        bottom: 9,
      },
    },
  },
  tooltips: {
    enabled: true,
    titleFontSize: 30,
  },
});
</script>
           
            </div>
        </div>

                                                                           
            <div id="Form2">
              <div class="wrapper">
                <div class="testimonial-container" id="testimonial-container"></div>
                <button id="prev">&lt;</button>
                <button id="next">&gt;</button>
              </div>  
              <!--Comment Using JavaScript-->
              <script>
const testimonials = [
    {
      name: "Eva Sawyer",
      Ratings: "5",
      image: "Images/1.jpeg",
      testimonial:
        " Very Good Experience.Thank you.",
    },
    {
      name: "Katey Topaz",
      Ratings: "2",
      image: "Images/2.jpeg",
      testimonial:
        "Very Disappointed. Not satisfied with the service",
    },
    {
      name: "Jae Robin",
      Ratings: "3",
      image: "Images/3.jpeg",
      testimonial:
        "Average experience, could be better.",
    },
    {
      name: "Nicol Blakely",
      Ratings: "4",
      image: "Images/4.jpeg",
      testimonial:
        "Good, but room for improvement.",
    },
  ];
  
  //Current Slide
  let i = 0;
  //Total Slides
  let j = testimonials.length;
  let testimonialContainer = document.getElementById("testimonial-container");
  let nextBtn = document.getElementById("next");
  let prevBtn = document.getElementById("prev");
  nextBtn.addEventListener("click", () => {
    i = (j + i + 1) % j;
    displayTestimonial();
  });
  prevBtn.addEventListener("click", () => {
    i = (j + i - 1) % j;
    displayTestimonial();
  });
  let displayTestimonial = () => {
    if(testimonials[i].Ratings == "1")
  {
    testimonials[i].Ratings = "Images/1-Star.PNG";
  }
  else if(testimonials[i].Ratings == "2"){
    testimonials[i].Ratings = "Images/2-Star.PNG";
  }
  else if(testimonials[i].Ratings == "3"){
    testimonials[i].Ratings = "Images/3-Star.PNG";
  }
  else if(testimonials[i].Ratings == "4"){
    testimonials[i].Ratings = "Images/4-Star.PNG";
  }
  else if(testimonials[i].Ratings == "5"){
    testimonials[i].Ratings = "Images/5-Star.PNG";
  }
    testimonialContainer.innerHTML = `
      <p>${testimonials[i].testimonial}</p>
      <img src=${testimonials[i].image}>
      <h3>${testimonials[i].name}</h3>
      <h6><img src=${testimonials[i].Ratings}><h6>
    `;
  };
  window.onload = displayTestimonial;</script>
        </div>

        <div class="Form3">
                                        <!--  Sub Form-1  -->
            <div id="Form3-1">
                <h2>&nbsp;&nbsp;Total Earnings</h2><br>
                <h1>&nbsp;
                    <?php 
                    require_once('../Controllers/Admin_Dash_F3_Show.php');
            while($req = mysqli_fetch_assoc($total_earnings)){
                echo $req["total_sum"];
            }
            ?> $</h1>
                
            </div>
                                        <!--  Sub Form-2  -->
            <div id="Form3-2">
                <h2>&nbsp;&nbsp;Total Expenses</h2><br>
                <h1>&nbsp;<?php 
                    require_once('../Controllers/Admin_Dash_F3_Show.php');
            while($req = mysqli_fetch_assoc($total_expenses)){
                echo $req["total_sum"];
            }
            ?> $</h1>
                
            </div>
                                        <!--  Sub Form-3  -->
            <div id="Form3-3">
                <h2>&nbsp;&nbsp;Passenger Served</h2><br>
                
            <h1>&nbsp;
            <?php 
            require_once('../Controllers/Admin_Dash_F3_Show.php');
            while($req = mysqli_fetch_assoc($total_pass_served)){
                echo $req["total_sum"];
            }
            ?>
            </h1>
                
            </div>
                                        <!--  Sub Form-4  -->
            <div id="Form3-4">
                <h2>&nbsp;&nbsp;Flights Operated</h2><br>
                <h1>&nbsp;
                    <?php 
                    require_once('../Controllers/Admin_Dash_F3_Show.php');
            while($req = mysqli_fetch_assoc($total_flight_operated)){
                echo $req["total_sum"];
            }
            ?></h1>
                
            </div>
        </div>

        <div id="Form4">
        <h1>&nbsp;Avarage Earnings</h1><br>
            <?php require_once('../Controllers/Admin_Average_Earnings_Show.php');
            $New=array();
            while($req = mysqli_fetch_assoc($List)){
                $New[]="['".$req['Earnings_Source']."',".$req['Earnings_Amount']."],";
            } 
            ?>
            <div id="PieChart">
            <script>google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ['Source','Earnings'],
    <?php
        foreach ($New as $New)  {
            echo $New;
            }
        ?>
             ]);

            var options = {
            //title: '',
         Left: 10,
            width: 520,
                height: 240,
                };

            var chart = new google.visualization.PieChart(
             document.getElementById("PieChart")
            );

                chart.draw(data, options);
            }
            </script>



        </div>
    </body>
</html>