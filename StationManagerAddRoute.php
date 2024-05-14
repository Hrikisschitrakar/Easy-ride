<?php 

session_start();

?>
<?php include("connection.php")?>
<!--
<!DOCTYPE html>
<html>
<head>
    <title>Easy Ride</title>
</head>
<body>

   <?php// echo "welcome:".  $_SESSION['id']; ?>
   <a href="loginMenu.php"><button class="btnHome">logout</button></a>

</body>
</html>

-->


<!DOCTYPE html>
<html>
<head>
    <title>Routes adding</title>
    <!--cdn icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="signUp.css">
    <link rel="stylesheet" href="Addroute.css">

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

    <div class="sidebar2">
        <?php 
        if(isset($_POST['routeAdd'])){
            $id=$_POST['id'];
            $via_city=$_POST['via_city'];
            $destination=$_POST['destination'];
            $bus_name=$_POST['bus_name'];
            $dep_date=$_POST['departure_date'];
            $dep_time=$_POST['departure_time'];
            $cost=$_POST['cost'];

            // Check if the ID already exists
            $check_query = "SELECT id FROM route WHERE id = ?";
            $check_stmt = $conn->prepare($check_query);
            $check_stmt->bind_param("s", $id);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();

            if($check_result->num_rows > 0) {
                // ID already exists, show a popup
                echo '<script>alert("ID already exists. Please choose another ID."); window.location.href="StationManager_dashboard.php";</script>';
            } else {
                // ID does not exist, proceed with inserting the data
                if($conn->connect_error){
                    die('Connection Failed :'.$conn->connect_error);
                } else {
                    $stmt=$conn->prepare("INSERT INTO route(id,via_city,destination,bus_name,departure_date,departure_time,cost) VALUES(?,?,?,?,?,?,?)");
                    $stmt->bind_param("ssssssi",$id,$via_city,$destination,$bus_name,$dep_date, $dep_time,$cost);

                    if($stmt->execute()) {
                        echo '<script>alert("Successfully added bus!"); window.location.href="StationManager_dashboard.php";</script>';
                    } else {
                        echo '<script>alert("Failed to add bus. Please try again."); window.location.href="StationManager_dashboard.php";</script>';
                    }

                    $stmt->close();
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
                            <input type="number" id="title" name="id" placeholder="id" class="idclass" required>
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
                            <input type="Time" id="title" name="departure_time" placeholder="Time of Departure" class="idclass" required>
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
