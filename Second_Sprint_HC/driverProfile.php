<?php

session_start();

include ("connection.php");
include ("function.php");

$user_data = check_login_bus($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Driver Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="driverProfile.css">
</head>

<body>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fa fa-bars" id="btn"></i>
        <i class="fa fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
        <header>
            <img src="avatar.png" alt="Avatar"> <!-- Replace with actual avatar image -->
            <p>Driver Name</p> <!-- Replace with PHP variable for driver's name -->
        </header>
        <ul>
            <li><a href="DriverDash.php">Dashboard</a></li>
            <li><a href="home.php">Logout</a></li>
        </ul>
    </div>
    <div class="sidebar2">
        <h1 class="adminTopic">Driver Profile</h1>

        <div class="info">
            <table>
                <tr>
                    <th>First name:-</th>
                    <td>
                        <?php echo $user_data['First_Name']; ?>
                    </td>
                </tr> <!-- Replace with actual data -->
                <tr>
                    <th>Last name:-</th>
                    <td>
                        <?php echo $user_data['Last_Name']; ?>
                    </td>
                </tr>
                <tr>
                    <th>User name:-</th>
                    <td>
                        <?php echo $user_data['username']; ?>
                    </td>
                </tr> <!-- Replace with actual data -->
                <tr>
                    <th>Email:-</th>
                    <td>
                        <?php echo $user_data['email']; ?>
                    </td>
                </tr>
                <tr>
                <tr>
                    <th>Bus driver ID:</th>
                    <td>
                        <?php echo $user_data['user_id']; ?>
                    </td>
                </tr>
            </table>

        </div>
    </div>
</body>

</html>