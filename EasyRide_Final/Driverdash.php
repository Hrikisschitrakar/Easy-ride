<?php
session_start();

include ("connection.php");
include ("function.php");

$user_data = check_login_bus($conn);

// Fetch data from the route table
$route_query = "SELECT * FROM route";
$route_result = mysqli_query($conn, $route_query);

// Check if the query executed successfully
$route_data = array();
if ($route_result) {
    // Fetch the data
    $route_data = mysqli_fetch_assoc($route_result);
}

// Query the bus_driver table to check if the bus_assigned matches the bus_name from the route
$bus_assigned = $route_data['bus_name'];

$bus_driver_query = "SELECT * FROM bus_driver WHERE bus_assigned = '$bus_assigned'";
$bus_driver_result = mysqli_query($conn, $bus_driver_query);

// Check if the query executed successfully
if ($bus_driver_result) {
    $bus_driver_data = mysqli_fetch_assoc($bus_driver_result);
    // Assuming departure_status is a column in bus_driver table
    $departure_status = $bus_driver_data['departure_status'];
} else {
    // Error handling if the query fails
    $departure_status = null;
}


if (isset($_POST['departed'])) {
    echo "Departed";
    $update_query = "UPDATE `route` SET `departure_status`='departed' 
                        WHERE bus_name = '" . $_POST["departed"] . "'";
    if (mysqli_query($conn, $update_query)) {
        echo $_POST["departed"];
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

}
if (isset($_POST['arrived'])) {
    $update_query = "UPDATE `route` SET `arrival_status`='arrived' 
                        WHERE bus_name = '" . $_POST['arrived'] . "'";
    if (mysqli_query($conn, $update_query)) {
        echo $bus_assigned;
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Bus Driver Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="driverDashboard.css">
</head>

<body>
    <input type="checkbox" id="check" />
    <label for="check">
        <i class="fa fa-bars" id="btn"></i>
        <i class="fa fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
        <header>
            <img src="avatar.png" alt="Avatar" />
            <!-- Replace with actual avatar image -->
            <p>Driver Name</p>
            <!-- Replace with PHP variable for driver's name -->
        </header>
        <ul>
            <li><a href="driverProfile.php">Profile</a></li>
            <li><a href="home.php">Logout</a></li>
        </ul>
    </div>
    <div class="sidebar2">
        <div class="container">
            <h1 class="adminTopic">Bus Driver Dashboard</h1>
            <div id="assignedRoute">
                <h2>Assigned Bus and Route</h2>
                <?php
                $sqlget = "SELECT * FROM route";
                $sqldata = mysqli_query($conn, $sqlget) or die('error getting');

                echo "<table>";
                echo "<tr>
        <th>ID</th>
        <th>Via City</th>
        <th>Destination</th>
        <th>Bus Name</th>
        <th>Departure Date</th>
        <th>Departure Time</th>
        <th>Cost</th>
        <th>Departure status</th>
        <th>Arrival status</th>
    </tr>";

                while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['via_city'] . "</td>";
                    echo "<td>" . $row['destination'] . "</td>";
                    echo "<td>" . $row['bus_name'] . "</td>";
                    echo "<td>" . $row['departure_date'] . "</td>";
                    echo "<td>" . $row['departure_time'] . "</td>";
                    echo "<td>" . $row['cost'] . "</td>";

                    // Comparing bus_name with bus_assigned
                    $departure_statusB = $row['bus_name'];
                    $bus_assigned = $user_data['bus_assigned'];
                    $departure_status = $row['departure_status'];
                    $arrival_status = $row['arrival_status'];
                    $destination = $row['destination'];
                    $city = $row['via_city'];

                    echo "<td>";
                    if ($bus_assigned == $departure_statusB) {
                        // Bus assigned to driver
                        echo '<form action="Driverdash.php" method="post"><button onclick="changeStatusD(this)" name="departed" value="' . $bus_assigned . '" type="submit">' . $departure_status . '</button></form>';
                        $update_query = "UPDATE `route` SET `departure_status`='departed' 
                        WHERE bus_name = '$bus_assigned'";

                    } else {
                        // Bus not assigned to driver
                        echo '<button onclick="changeStatusD(this)">Not Assigned to Driver</button>';
                    }
                    echo "</td>";
                    echo "<td>";
                    if ($bus_assigned == $departure_statusB) {
                        // Bus assigned to driver
                        echo '<form action="Driverdash.php" method="post"><button onclick="changeStatusA(this)" name="arrived" value="' . $bus_assigned . '" type="submit">' . $arrival_status . '</button></form>';


                    } else {
                        // Bus not assigned to driver
                        echo '<button onclick="changeStatusA(this)">Not Assigned to Driver</button>';
                    }
                    echo "</td>";

                    echo "</tr>";
                }

                echo "</table>";
                ?>


                </tr>

            </div>
        </div>
    </div>

    <script>
        function changeStatusD(button) {
            if (button.textContent === "Departure") {
                button.textContent = "Departed";
                alert("Departure notification sent to passengers.");
            } else if (button.textContent === "Not Assigned to Driver") {
                alert("This bus is not assigned to a driver.");
            } else {
                alert("Arrival notification sent to passengers.");
            }
        }
        function changeStatusA(button) {
            if (button.textContent === "Arrival") {
                button.textContent = "Arrived";
                alert("Arrival notification sent to passengers.");
            } else if (button.textContent === "Not Assigned to Driver") {
                alert("This bus is not assigned to a driver.");
            } else {
                alert("Arrival notification sent to passengers.");
            }
        }
    </script>

</body>

</html>