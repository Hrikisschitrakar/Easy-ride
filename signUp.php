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

    <?php include("nav.php");
             ?>

<div class="confirm">
<?php
session_start();
include("connection.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $user_name = $_POST['user_name'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $con_pass = $_POST['cpassword'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        if ($password == $con_pass) {
            //save to database
            $user_id = random_num(20);
            $query = "INSERT INTO users (user_id, First_Name, Last_Name, username, email, password) VALUES ('$user_id','$fname','$lname','$user_name','$email','$password')";
            
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "<script LANGUAGE='JavaScript'>window.alert('Successfully signed up!'); window.location.href='Login.php';</script>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Please enter confirm password as previous one!!";
        }
    } else {
        echo "Please enter some valid information!";
    }
}
?>
</div>


    <div class="wrapper">
        <div class="registration_form">
            <div class="title">
                Sign Up for EasyRide Bus Service
            </div>
            <form action="connection.php" method="POST">
                <div class="form_wrap">
                    <div class="input_grp">
                        <div class="input_wrap">
                            <label for="fname">First Name</label>
                            <input type="text" id="fname" name="fname" placeholder="First Name" required>
                        </div>
                        <div class="input_wrap">
                            <label for="lname">Last Name</label>
                            <input type="text" id="lname" name="lname" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="input_wrap">
                        <label for="email">Email Address</label>
                        <input type="text" id="email" name="email" placeholder="E-mail" required>
                    </div>
                    <div class="input_wrap">
                        <label for="uname">Username</label>
                        <input type="text" id="uname" name="user_name" placeholder="Username" required>
                    </div>
                    <div class="input_wrap">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="password" required>
                    </div>
                    <div class="input_wrap">
                        <label for="Confirm_password">Confirm Password</label>
                        <input type="password" id="password" name="cpassword" placeholder="password" required>
                    </div>
                    <div class="input_wrap">
                        <input type="submit" value="Register Now" class="submit_btn">
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
