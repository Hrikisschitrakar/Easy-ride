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
    <!-- Include navigation bar -->
    <?php include ("nav.php"); ?>

    <!-- PHP login logic -->
    <?php
    session_start();
    include ("connection.php");
    include ("function.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
            $query = "select * from bus_driver where username = '$user_name' limit 1";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if ($user_data['password'] === $password) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location:viewBus.php");
                    die;
                }
            }
            echo "Wrong username or password!";
        } else {
            echo "Wrong username or password!";
        }
    }
    ?>

    <!-- Login form for EZfare -->

    <!-- Login form for EasyRide -->
    <div class="login-box">
        <img src="iconpic.jpg" class="avatar">
        <h1>Login For EasyRide Bus Driver</h1>
        <form method="post">
            <p>Username</p>
            <input type="text" name="user_name" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="login" value="Login">
            <a href="signUp.php" class="sign_up">Sign up</a>

        </form>
    </div>

</body>

</html>