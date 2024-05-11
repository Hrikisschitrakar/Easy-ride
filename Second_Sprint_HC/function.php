<?php

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
function route($conn)
{
	$query = "SELECT * FROM route "; // Remove the WHERE clause

	$result = mysqli_query($conn, $query);
	if ($result && mysqli_num_rows($result) > 0) {
		$user_data = mysqli_fetch_assoc($result);
		return $user_data;
	}
}
// function route($conn)
// {
// 	$query = "SELECT * FROM route LIMIT 1";

// 	$result = mysqli_query($conn, $query);
// 	if ($result) {
// 		if (mysqli_num_rows($result) > 0) {
// 			$user_data = mysqli_fetch_assoc($result);
// 			return $user_data;
// 		} else {
// 			// No rows found
// 			return null;
// 		}
// 	} else {
// 		// Query execution failed
// 		return null;
// 	}
// }

// function route($conn)
// {
// 	if (isset($_SESSION['user_id'])) {

// 		$id = $_SESSION['user_id'];
// 		$query = "select * from route where user_id = '$id' limit 1";

// 		$result = mysqli_query($conn, $query);
// 		if ($result && mysqli_num_rows($result) > 0) {

// 			$user_data = mysqli_fetch_assoc($result);
// 			return $user_data;
// 		}
// 	}

// }
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