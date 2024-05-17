<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="signUp.css">
    <link rel="stylesheet" href="nav.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css"> <!-- Link to the external CSS file -->
</head>

<body>

    <!-- Header (navigation bar) -->
    <nav>
        <ul>
            <li class="logo">
                <h4>EasyRide</h4>
            </li>
            <li class="btn"><span class="fas fa-bars"></span></li>
            <div class="items">
                <li><a href="home.php">Home</a></li>
                <li><a href="loginMenu.php">Login</a></li>
                <li><a href="AboutUs.html">About Us</a></li>
                <li><a href="contact_us.html">Contact Us</a></li>
                <li><a href="slide.html">Services</a></li>
            </div>
        </ul>
    </nav>

   
<div class="confirm">
<?php
session_start();
include("connection.php");
include("function.php");

if (isset($_POST['submit_btn'])) {
    // Retrieve posted data
    $user_id = $_POST['user_id'];
    $First_Name = $_POST['First_Name'];
    $Last_Name = $_POST['Last_Name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password = $_POST['password'];
    $con_pass = $_POST['cpassword'];  // Added confirm password

    // Check if all fields are filled
    if (!empty($username) && !empty($password) && !is_numeric($username)) {
        // Check if passwords match
        if ($password == $con_pass) {
            // Do not hash the password before storing it (not recommended for security reasons)
            $plain_password = $password;

            // Prepare the SQL statement
            $stmt = $conn->prepare("INSERT INTO users (user_id, First_Name, Last_Name, username, email, telephone, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("issssss", $user_id, $First_Name, $Last_Name, $username, $email, $telephone, $plain_password);

            // Execute the statement
            if ($stmt->execute()) {
                echo "<script LANGUAGE='JavaScript'>window.alert('Successfully signed up!'); window.location.href='customer_login.php';</script>";
            } else {
                echo "Error: " . htmlspecialchars($stmt->error);
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Please enter the same password in the confirm password field!";
        }
    } else {
        echo "Please enter valid information!";
    }
}
?>


</div>

<div class="wrapper">
        <div class="registration_form">
            <div class="title">
                Sign Up for EasyRide Bus Service
            </div>
            <form action="" method="POST">
                <div class="form_wrap">
                    <div class="input_wrap">
                        <label for="user_id">User ID</label>
                        <input type="number" id="user_id" name="user_id" placeholder="User ID" required>
                    </div>
                    <div class="input_grp">
                        <div class="input_wrap">
                            <label for="First_Name">First Name</label>
                            <input type="text" id="First_Name" name="First_Name" placeholder="First Name" required>
                        </div>
                        <div class="input_wrap">
                            <label for="Last_Name">Last Name</label>
                            <input type="text" id="Last_Name" name="Last_Name" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="input_wrap">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Username" required>
                    </div>
                    <div class="input_wrap">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="E-mail" required>
                    </div>
                    <div class="input_wrap">
                        <label for="telephone">Telephone</label>
                        <input type="number" id="telephone" name="telephone" placeholder="Telephone" required>
                    </div>
                    <div class="input_wrap">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="input_wrap">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" required>
                    </div>
                    <div class="input_wrap">
                        <input type="submit" value="Register Now" class="submit_btn" name="submit_btn">
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>