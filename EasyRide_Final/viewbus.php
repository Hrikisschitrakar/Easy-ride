<?php
session_start();

include ("connection.php");
include ("function.php");

$user_data = check_login($conn);

?>

<?php include ("connection.php") ?>
<!DOCTYPE html>
<html>

<head>
    <title>User View</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="sidebar.css">
    <style type="text/css">
        body {
            background-image: url("1.jpg");
            background-position: center;
            background-size: cover;
            height: 700px;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .adminTopic {
            text-align: center;
            color: #fff;
        }

        table {
            width: 99%;
            border-collapse: separate !important;
            margin: auto;
            text-align: center;
            margin-top: 50px;
            background-color: rgb(255, 255, 255);
            border-radius: 10px 10px 0px 0px;
        }

        table th {
            border-bottom: 2px solid rgb(187, 187, 187);
            padding: 10px 0px 10px 0px;
            font-family: "balsamiq_sansitalic" !important;
        }

        table tr td {
            border-right: 2px solid rgb(187, 187, 187);
            height: 58px;
            padding: 22px 0px 0px 0px;
            font-family: "monospace;" !important;
            border-bottom: 2px solid rgb(187, 187, 187);
            font-size: 20px;
        }

        table tr td a {
            color: white;
            border-radius: 5px;
            padding: 6px;
            text-decoration: none;
            margin: 10px;
            font-weight: 700;
        }

        table tr td button:hover {
            padding: 5px 5px 5px 5px;
            border: 2px solid yellow;
            border-radius: 7px;
            background-color: red;
            color: white;
            cursor: pointer;
        }

        button {
            padding: 5px 5px 5px 5px;
        }

        .btnPolicy {
            padding: 5px 5px 5px 5px;
            border: 2px solid yellow;
            border-radius: 7px;
            background-color: red;
            color: white;
            margin-left: 20px;
        }

        .btnPolicy:hover {
            background: red;
            padding: 7px 7px 7px 7px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fa fa-bars" id="btn"></i>
        <i class="fa fa-times" id="cancle"></i>
    </label>
    <div class="sidebar">
        <header><img src="iconpic.jpg">
            <p>
                <?php echo $user_data['username']; ?>
            </p>
        </header>
        <ul>
            <li><a href="profile.php">Profile</a></li>
        </ul>
        <ul>
            <li><a href="viewBus.php">Ticket Booking</a></li>
        </ul>
        <ul>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="sidebar2">
        <h1 class="adminTopic">Booking Your Ticket...</h1>
        <?php
        $sqlget = "SELECT * FROM route";
        $sqldata = mysqli_query($conn, $sqlget) or die('Error getting data from database.');


        echo "<table>";
        echo "<tr>
            <th>ID</th>
            <th>Via City</th>
            <th>Destination</th>
            <th>Bus Name</th>
            <th>Departure Date</th>
            <th>Departure Time</th>
            <th>Departure Status</th>
            <th>Cost</th>
            <th>Booking</th>
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
            echo $row['departure_status'];
            echo "</td><td>";
            echo $row['cost'];
            echo "</td><td>";

            $departure_status = $row['departure_status'];

            // Check departure status
            if ($departure_status == 'not-departed') {
                // Display book now button
                echo '<button style="border:2px solid yellow; border-radius:7px; background-color:red;color:white;">';
                echo '<a href="AddBooking.php?id=' . $row['id'] . '">Book Now</a>';
                echo '</button>';
            } else {
                // Display not available button
                echo '<button class="btnStatus btnDeparted" onclick="sendNotification(\'Bus has departed\')">Not Available</button>';
            }
            echo "</td></tr>";
        }

        echo "</table>";
        ?>
    </div>

    <!-- Pop-up dialog -->
    <div id="popup" style="display: none;">
        <p>Already departed.</p>
    </div>

    <script>
        function sendNotification(message) {
            alert(message);
        }
    </script>
</body>

</html>