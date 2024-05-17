<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <!-- Include CSS files -->
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="footer_l.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Include Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Font Awesome Pro -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>


    <!-- PHP login logic -->
    <?php
    session_start();
    include ("connection.php");
    include ("function.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (!empty($username) && !empty($password) && !is_numeric($username)) {
            $query = "select * from station_manager where username = '$username' limit 1";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $user_data_station = mysqli_fetch_assoc($result);
                if ($user_data_station['password'] === $password) {
                    $_SESSION['username'] = $user_data_station['username'];
                    header("Location:station_m_profile.php");
                    die;
                }
            }
            echo "Incorrect username or password!";
        } else {
            echo "Incorrect username or password!";
        }
    }
    ?>

    <!-- Login form for EZfare -->

    <!-- Login form for EasyRide -->
    <div class="login-box">
        <img src="iconpic.jpg" class="avatar">
        <h1>Login For EasyRide Station Manager</h1>
        <form method="post">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="login" value="Login">
        </form>
    </div>

</body>

</html>