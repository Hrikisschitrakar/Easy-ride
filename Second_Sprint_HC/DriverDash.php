<?php

session_start();


?>
<?php include ("connection.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Bus Driver Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="sidebar.css" />
    <link rel="stylesheet" href="driverDashboard.css" />
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

   </tr>";

                while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
                    echo "<tr><td>";
                    echo $row['id'];
                    echo "</td><td>";
                    echo $row['via_city'];
                    echo "</td><td>";
                    echo $row['destination'];
                    echo "</td><td>";
                    echo $row['bus_name'];
                    echo "</td><td>";
                    echo $row['departure_date'];
                    echo "</td><td>";
                    echo $row['departure_time'];
                    echo "</td><td>";
                    echo $row['cost'];
                    echo "</td>";


                    ?>
                    <td>
                        <button class="btn" onclick="sendNotification('Departure')">
                            Departure
                        </button>
                        <button class="btn" onclick="sendNotification('Arrived')">
                            Arrived at Destination
                        </button>
                    </td>
                    </tr>

                    <?php
                }

                echo "</table>";


                ?>
                <!-- Replace status dynamically with PHP variable -->

                </tr>

            </div>
        </div>
    </div>

    <script>
        function sendNotification(status) {
            if (status === "Departure") {
                alert("Departure notification sent to passengers.");
            } else if (status === "Arrived") {
                alert("Arrival notification sent to passengers.");
            }
        }
    </script>
</body>

</html>