<?php
function check_login_admin($conn)
{

    if (isset($_SESSION['username'])) {

        $id = $_SESSION['username'];
        $query = "select * from admin where username = '$id' limit 1";

        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {

            $user_data_admin = mysqli_fetch_assoc($result);
            return $user_data_admin;
        }
    }

    //redirect to login
    header("Location: admin_login.php");
    die;

}

function check_login_station($conn)
{

    if (isset($_SESSION['username'])) {

        $id = $_SESSION['username'];
        $query = "select * from station_manager where username = '$id' limit 1";

        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {

            $user_data_station = mysqli_fetch_assoc($result);
            return $user_data_station;
        }
    }

    //redirect to login
    header("Location: station_m_profile.php");
    die;

}


function check_login($conn)
{

    if (isset($_SESSION['user_id'])) {

        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {

            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login
    header("Location: customer_login.php");
    die;

}
function check_login_bus($conn)
{

    if (isset($_SESSION['user_id'])) {

        $id = $_SESSION['user_id'];
        $query = "select * from bus_driver where user_id = '$id' limit 1";

        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {

            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login
    header("Location: bus_driver_login.php");
    die;

}
function random_num($length)
{

    $text = "";
    if ($length < 5) {
        $length = 5;
    }

    $len = rand(4, $length);

    for ($i = 0; $i < $len; $i++) {
        # code...

        $text .= rand(0, 9);
    }

    return $text;
}





?>