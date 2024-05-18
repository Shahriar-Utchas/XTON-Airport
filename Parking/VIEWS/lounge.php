



<!DOCTYPE html>
<html>
<head>
    <title>Appointment Scheduler</title>
    <link rel="stylesheet" href="../CSS/lounge.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <style>
       


    </style>
</head>
<body>


<h2>Choose your lounge time </h2>
<div>
    <form method="post" action="../CONTROLLER/confirmlounge.php" onsubmit="return validateForm()">
    <div class="iddate">  
  
    
    
    <label for="id" >Enter ID:</label>
    <input type="text" id="id" name="id" required>
  
  
    
    <label for="datepicker" style="margin-left: 20px;">Choose Date:</label>
    <input type="text" id="datepicker" name="date" required>
    

    </div>


<div class="slotsposition">


        <div id="slots">
       
            <input type="hidden" id="shift" name="shift" value="<?php echo $shift; ?>">
            
            <label for="slot" style=" position:absolute; margin-top:100px; margin-left:-60px;">Choose Shift:</label><br>

            <div class="slot" data-slot="morning">
            <img src="img/morning.jpg" alt="morning Shift" style="width: 200px; height: 150px; border-radius: 5px; border: 2px solid white;">
                Morning Shift (8AM - 12PM)</div>

            <div class="slot" data-slot="noon">
            <img src="img/noon.jpg" alt="Noon Shift" style="width: 200px; height: 150px; border-radius: 5px; border: 2px solid white;">
                Noon Shift (12PM - 4PM)
                </div>

            <div class="slot" data-slot="evening">
            <img src="img/evening.jpg" alt="evening Shift" style="width: 200px; height: 150px; border-radius: 5px; border: 2px solid white;">
             Evening Shift (4PM - 8PM)</div>

            <div class="slot" data-slot="night">
            <img src="img/night.jpg" alt="night Shift" style="width: 200px; height: 150px; border-radius: 5px; border: 2px solid white;">
            Night Shift (8PM - 4AM)
        </div>
        </div><br><br>
       
        <input class="submitbutton" type="submit" name="submit" value="Submit">
    </form>
</div>

<!-- <div id="appointment-details">
    <h2>Selected Appointment Details:</h2>
    <p><strong>ID:</strong> </p>
    <p><strong>Date:</strong> </p>
    <p><strong>Shift:</strong> <span id="selected-shift"></span></p>
</div> -->

<script>
    $(function() {
        $("#datepicker").datepicker();
        $(".slot").click(function() {
            $(".slot").removeClass("selected");
            $(this).addClass("selected");
            var shift = $(this).data("slot");
            $("#selected-shift").text(shift);
            $("#shift").val(shift);
        });
    });

    function validateForm() {
        var id = document.getElementById('id').value;
        var date = document.getElementById('datepicker').value;
        var shift = document.getElementById('shift').value;

        if (id == "" || date == "" || shift == "") {
            alert("Please fill in all fields");
            return false;
        }
        return true;
    }
</script>

</body>
</html>
