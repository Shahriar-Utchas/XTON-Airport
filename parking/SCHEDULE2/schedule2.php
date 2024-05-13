<!DOCTYPE html>
<html>
<head>
    <title>Confirmation Form</title>
    <link rel="stylesheet" href="schedule2.css">
    <script>
        function validateForm() {
            var id = document.getElementById("id").value;
            var date = document.getElementById("date").value;
            var time = document.getElementById("time").value;
            var slots = document.querySelectorAll('input[name="selected_slot[]"]:checked').length;

            if (id === "" || date === "" || time === "" || slots === 0) {
                alert("Please select input your ID, Date, Time, and at least one slot.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="scheduleform">   
    <h2>Confirmation Form</h2>
    <form method="post" action="../CONTROLLER/confirm.php" onsubmit="return validateForm()">
        <label for="id">ID:</label>
        <input type="text" name="id" id="id" style="border-radius:5px;" required placeholder="INPUT YOUR ID"><br><br>
        
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" style="border-radius:5px;" required><br><br>
        
        <label for="time">Time:</label>
        <select name="time" id="time" style="border-radius:5px;" required>
            <option value="">Select Time</option>
            <option value="9:00 AM-11:00 AM">9:00 AM-11:00 AM</option>
            <option value="11:00 AM-1:00 PM">11:00 AM-1:00 PM</option>
            <option value="1:00 PM-3:00PM">1:00 PM-3:00PM</option>
            <!-- Add more options for different times -->
        </select><br><br>
        
        <label for="slots" class="slotheadline">Select a Slot:</label><br>
        <?php
        // Assuming there are 40 slots
        echo "<div class='checkbox-container'>";
        echo "<table>";
        echo "<tr>";
        for ($i = 1; $i <= 40; $i++) {
            if ($i % 5 == 1 && $i != 1) {
                echo "</tr><tr>"; // Start a new row after every 5 checkboxes
            }
            echo "<td><input type='checkbox' name='selected_slot[]' value='$i'> Slot $i</td>";
        }
        echo "</tr>";
        echo "</table>";
        echo "</div>";
        

        ?>
        <br>
        
     <input type="submit" value="Confirm" class="confirmbutton"> 
    </form>
    </div>

</body>
</html>
