<?php 
session_start();
?>
<?php include("connection.php")?>

<!DOCTYPE html>
<html>
<head>
    <title>Easy Ride</title>
    <!-- CDN icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="signUp.css">
    <link rel="stylesheet" href="updateRoute.css">
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
        <li><a href="StationManager_dashboard.php">Manage Routes</a></li>
            <li><a href="StationManagesBuses.php">Manage Buses</a></li>
            <li><a href="StationBusdriverprofile.php">Manage Bus Driver</a></li>
            <li><a href="StationBookingManage.php">Booking People</a></li>
            <li><a href="StationPaymentManage.php">Transaction</a></li>
            <li><a href="loginMenu.php">logout</a></li>

        </ul>
    </div>
    <?php 
    if(isset($_POST['routeUpdate'])){
        $id=$_POST['id'];
        $via_city=$_POST['via_city'];
        $destination=$_POST['destination'];
        $bus_name=$_POST['bus_name'];
        $dep_date=$_POST['departure_date'];
        $dep_time=$_POST['departure_time'];
        $departure_status=$_POST['departure_status'];
        $arrival_status=$_POST['arrival_status'];
        $cost=$_POST['cost'];

        // Check if the via_city and destination are the same
        if($via_city == $destination) {
            // via_city and destination are the same, show a popup
            echo '<script>alert("Via city and destination cannot be the same. Please choose different locations."); window.location.href="StationManagerUpdateRoute.php";</script>';
        } else {
            // Check if the bus is already booked for the selected departure date
            $check_bus_query = "SELECT id FROM route WHERE bus_name = ? AND departure_date = ?";
            $check_bus_stmt = $conn->prepare($check_bus_query);
            $check_bus_stmt->bind_param("ss", $bus_name, $dep_date);
            $check_bus_stmt->execute();
            $check_bus_result = $check_bus_stmt->get_result();

            if($check_bus_result->num_rows > 0) {
                // Bus already booked for the selected date, show a popup
                echo '<script>alert("This bus is already booked for the selected date. Please choose another date."); window.location.href="StationManagerUpdateRoute.php";</script>';
            } else {
                // Proceed with updating the route details
                $query = "UPDATE `route` SET via_city=?, destination=?, bus_name=?, departure_date=?, departure_time=?, departure_status=?, arrival_status=?, cost=? WHERE id=?";
                 $stmt = $conn->prepare($query);
                 $stmt->bind_param("ssssssssi", $via_city, $destination, $bus_name, $dep_date, $dep_time, $departure_status,$arrival_status, $cost, $id);
                 $query_run = $stmt->execute();

                 if($query_run){
                    echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Successfully Updated Route!!!');
                    window.location.href='StationManager_dashboard.php';
                    </script>");
                } else {
                    echo '<script type="text/javascript">alert("Route not updated!!!")</script>';
                }
            }
            $check_bus_stmt->close();
        }
    }
    ?>
    <div class="sidebar2">
        <div class="wrapper">
            <div class="registration_form">
                <div class="title">
                    Bus Route Update/Edit
                </div>
                <form action="#" method="POST">
                    <div class="form_wrap">
                        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
                        <div class="input_wrap">
                            <label for="via_city">Select City</label>
                            <select id="via_city" name="via_city" class="idclass" required>
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
                            <label for="destination">Select Destination</label>
                            <select id="destination" name="destination" class="idclass" required>
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
                            <label for="bus_name">Select Bus</label>
                            <select id="bus_name" name="bus_name" class="idclass" required>
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
                            <label for="departure_date">Departure Date</label>
                            <input type="date" id="departure_date" name="departure_date" placeholder="Departure Date" class="idclass" required>
                        </div>
                        <div class="input_wrap">
                            <label for="departure_time">Departure Time</label>
                            <input type="time" id="departure_time" name="departure_time" placeholder="Departure Time" class="idclass" required>
                        </div>
                        <div class="input_wrap">
                            <label for="departure_status">Departure Status</label>
                            <input type="text" id="departure_status" name="departure_status" placeholder="Departure Status" class="idclass" value="not-departed" required>
                        </div>
                        <div class="input_wrap">
                            <label for="arrival_staus">Arrival status</label>
                            <input type="text" id="arrival_status" name="arrival_status" placeholder="Arrival Status" class="idclass" value="not-arrived" required>
                        </div>
                        <div class="input_wrap">
                            <label for="cost">Cost</label>
                            <input type="number" id="cost" name="cost" placeholder="Cost" class="idclass" required>
                        </div>
                        <div class="input_wrap">
                            <input type="submit" value="Update Route Now" class="submit_btn" name="routeUpdate">
                        </div>
                    </div>
                </form>
            </div>
        </div>
