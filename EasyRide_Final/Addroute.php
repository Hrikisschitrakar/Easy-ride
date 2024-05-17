<?php 
session_start();
?>
<?php include("connection.php")?>

<!DOCTYPE html>
<html>
<head>
    <title>Routes adding</title>
    <!-- CDN icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="signUp.css">
    <link rel="stylesheet" href="Addroute.css">
    <script>
        // JavaScript function to format time input
        function formatTimeInput(input) {
            // Remove milliseconds
            input.value = input.value.replace(/\.\d{3}/, '');
        }

        // JavaScript function to check if via city and destination are same
        function checkSameCity() {
            var viaCity = document.getElementById('via_city').value;
            var destination = document.getElementById('destination').value;
            if (viaCity === destination) {
                alert("Via city and destination cannot be the same.");
                document.getElementById('destination').value = ''; // Clear destination selection
            }
        }
    </script>
</head>
<body>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fa fa-bars" id="btn"></i>
        <i class="fa fa-times" id="cancle"></i>
    </label>

    <div class="sidebar">
        <header><img src="iconpic.jpg">
            <p><?php echo $_SESSION['username']; ?></p>
        </header>
        <ul>
            <li><a href="admin_dashboard.php">Manage Routes</a></li>
            <li><a href="manageprofiles.php">Manage Profiles</a></li>
            <li><a href="ManagesBuses.php">Manage Buses</a></li>
            <li><a href="BookingManage.php">Booking People</a></li>
            <li><a href="PaymentManage.php">Transaction</a></li>
            <li><a href="loginMenu.php">logout</a></li>
        </ul>
    </div>

    <div class="sidebar2">
    <?php 
if(isset($_POST['routeAdd'])){
    $id=$_POST['id'];
    $via_city=$_POST['via_city'];
    $destination=$_POST['destination'];
    $bus_name=$_POST['bus_name'];
    $dep_date=$_POST['departure_date'];
    $dep_time=$_POST['departure_time'];
    $departure_status=$_POST['departure_status'];
    $arrival_status=$_POST['arrival_status'];
    $cost=$_POST['cost'];

    // Check if the ID already exists
    $check_query = "SELECT id FROM route WHERE id = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("s", $id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if($check_result->num_rows > 0) {
        // ID already exists, show a popup
        echo '<script>alert("ID already exists. Please choose another ID."); window.location.href="Addroute.php";</script>';
    } else {
        // Check if the via_city and destination are the same
        if($via_city == $destination) {
            // via_city and destination are the same, show a popup
            echo '<script>alert("Via city and destination cannot be the same. Please choose different locations."); window.location.href="Addroute.php";</script>';
        } else {
            // Check if the bus is already booked for the selected departure date
            $check_bus_query = "SELECT id FROM route WHERE bus_name = ? AND departure_date = ?";
            $check_bus_stmt = $conn->prepare($check_bus_query);
            $check_bus_stmt->bind_param("ss", $bus_name, $dep_date);
            $check_bus_stmt->execute();
            $check_bus_result = $check_bus_stmt->get_result();

            if($check_bus_result->num_rows > 0) {
                // Bus already booked for the selected date, show a popup
                echo '<script>alert("This bus is already booked for the selected date. Please choose another date."); window.location.href="Addroute.php";</script>';
            } else {
                // ID does not exist, via_city and destination are different, and bus is available for booking on the selected date, proceed with inserting the data
                $stmt=$conn->prepare("INSERT INTO route(id,via_city,destination,bus_name,departure_date,departure_time,departure_status,arrival_status,cost) VALUES(?,?,?,?,?,?,?,?,?)");
                $stmt->bind_param("ssssssssi",$id,$via_city,$destination,$bus_name,$dep_date, $dep_time,$departure_status,$arrival_status,$cost);

                if($stmt->execute()) {
                    echo '<script>alert("Successfully added route"); window.location.href="admin_dashboard.php";</script>';
                } else {
                    echo '<script>alert("Failed to add bus. Please try again."); window.location.href="Addroute.php";</script>';
                }

                $stmt->close();
            }
            $check_bus_stmt->close();
        }
    }

    $check_stmt->close();
}     
?>


        <div class="wrapper">
            <div class="registration_form">
                <div class="title">
                    Routes adding
                </div>

                <form action="#" method="POST">
                    <div class="form_wrap">
                        <div class="input_wrap">
                            <label for="title">Id</label>
                            <input type="number" id="title" name="id" placeholder="Id"  class="idclass" required>
                        </div>
                        <div class="input_wrap">
                            <label for="title">Select City</label>
                            <select id="title" name="via_city"  class="idclass" required>
                                <?php 
                                $sql = "SELECT via_city FROM location";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<option value='".$row['via_city']."'>".$row['via_city']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="input_wrap">
                            <label for="title">Select Destination</label>
                            <select id="title" name="destination"  class="idclass" required>
                                <?php 
                                $sql = "SELECT Destination FROM location";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<option value='".$row['Destination']."'>".$row['Destination']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="input_wrap">
                            <label for="title">Select Bus</label>
                            <select id="title" name="bus_name"  class="idclass" required>
                                <?php 
                                $sql = "SELECT Bus_Name FROM bus";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<option value='".$row['Bus_Name']."'>".$row['Bus_Name']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="input_wrap">
                            <label for="title">Departure Date</label>
                            <input type="date" id="title" name="departure_date" placeholder="Date of Departure" class="idclass" required>
                        </div>

                        <div class="input_wrap">
                            <label for="title">Departure Time</label>
                            <!-- Add oninput event to call JavaScript function -->
                            <input type="time" id="title" name="departure_time" placeholder="Time of Departure" class="idclass" oninput="formatTimeInput(this)" required>
                        </div>

                        <div class="input_wrap">
                            <label for="title">Departure status</label>
                            <!-- Add oninput event to call JavaScript function -->
                            <input type="text" id="title" name="departure_status" placeholder="Departure status" class="idclass" value="not-departed" readonly required >
                        </div>

                        <div class="input_wrap">
                            <label for="title">Arrival Status</label>
                            <!-- Add oninput event to call JavaScript function -->
                            <input type="text" id="title" name="arrival_status" placeholder="Arrival status" class="idclass" value="not-arrived" readonly required>
                        </div>

                        <div class="input_wrap">
                            <label for="title">Cost</label>
                            <input type="text" id="title" name="cost" placeholder="Cost" class="idclass" required>
                        </div>

                        <div class="input_wrap">
                            <input type="submit" value="Add Route Now" class="submit_btn" name="routeAdd">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
