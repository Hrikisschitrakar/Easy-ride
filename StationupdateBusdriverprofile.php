<?php
session_start();
?>
<?php include("connection.php")?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel EasyRide</title>
    <!--cdn icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="signUp.css">
    <link rel="stylesheet" href="updateBusdriverprofile.css">
</head>
<body>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fa fa-bars" id="btn"></i>
        <i class="fa fa-times" id="cancle"></i>
    </label>
    <div class="sidebar">
        <header><img src="iconpic.jpg">
            <p><?php echo $_SESSION['username']; ?></p>
        </header>
        <ul>
            <li><a href="StationManager_dashboard.php">Manage Routes</a></li>
            <li><a href="StationManagesBuses.php">Manage Buses</a></li>
            <li><a href="StationBusdriverprofile.php">Manage Bus Driver</a></li>
            <li><a href="StationBookingManage.php">Booking People</a></li>
            <li><a href="StationPaymentManage.php">Transaction</a></li>
            <li><a href="loginMenu.php">logout</a></li>
        </ul>
    </div>

    <?php 
    if(isset($_POST['UpdateBusDriver'])){
        $id = $_POST['id'];
        $user_id = $_POST['user_id'];
        $First_Name = $_POST['First_Name'];
        $Last_Name = $_POST['Last_Name'];
        $username = $_POST['username'];
        $Bus_Name = $_POST['bus_assigned'];
        $Telephone_no = $_POST['telephone'];
        $Email = $_POST['email'];
        $Password = $_POST['password'];

        $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{4,}$/";
        if (!preg_match($pattern, $Password)) {
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Password must be at least 4 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.');
                window.location.href='StationupdateBusdriverprofile.php';
                </script>");
            exit();
        }

        // Check if username is already assigned to a bus (excluding current bus driver)
        $check_username_query = "SELECT * FROM `bus_driver` WHERE username=? AND id != ?";
        $check_stmt = $conn->prepare($check_username_query);
        $check_stmt->bind_param("si", $username, $id);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        if ($check_result->num_rows > 0) {
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('This username is already assigned to a bus and cannot be assigned to another bus.');
                window.location.href='StationupdateBusdriverprofile.php?id=".$id."'; // Redirect back to the update page with the same ID
                </script>");
            exit();
        }

        // Prepare and bind the SQL statement
        $query = "UPDATE `bus_driver` SET user_id=?, First_Name=?,Last_Name=?,username=?, bus_assigned=?, telephone=?, email=?, password=? WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssssssi", $user_id, $First_Name, $Last_Name, $username, $Bus_Name, $Telephone_no, $Email, $Password, $id);

        // Execute the statement
        $query_run = $stmt->execute();

        if($query_run) {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Successfully Transaction Updated!!!');
            window.location.href='StationBusdriverprofile.php';
            </script>");
        } else {
            echo '<script type="text/javascript">alert("Bus Driver Profile Not updated!!!")</script>';
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
    ?>

    <div class="sidebar2">
        <div class="wrapper">
            <div class="registration_form">
                <div class="title">
                    Bus Driver update/Edit
                </div>
                <form action="#" method="POST">
                    <div class="form_wrap">
                        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
                        
                        <div class="input_wrap">
                            <label for="title">User Id</label>
                            <input type="number" id="title" name="user_id" placeholder="user id" class="idclass" required>
                        </div>
                        <div class="input_wrap">
                            <label for="title">First Name</label>
                            <input type="text" id="title" name="First_Name" placeholder="First Name" required>
                        </div>

                        <div class="input_wrap">
                            <label for="title">Last Name</label>
                            <input type="text" id="title" name="Last_Name" placeholder="Last Name" required>
                        </div>

                        <div class="input_wrap">
                            <label for="title">Username</label>
                            <input type="text" id="title" name="username" placeholder="Username" required>
                        </div>

                        <div class="input_wrap">
                            <label for="title">Select Bus</label>
                            <select id="title" name="bus_assigned" class="idclass" required>
                                <?php 
                                $sql = "SELECT Bus_Name FROM bus";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<option value='".$row['Bus_Name']."'>".$row['Bus_Name']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input_wrap">
                            <label for="title">Telephone no</label>
                            <input type="text" id="title" name="telephone" placeholder="Telephone number" class="idclass">
                        </div>
                        <div class="input_wrap">
                            <label for="title">Email</label>
                            <input type="email" id="title" name="email" placeholder="Email" class="idclass">
                        </div>
                        <div class="input_wrap">
                            <label for="title">Password</label>
                            <input type="password" id="title" name="password" placeholder="Password" class="idclass" required>
                        </div>
                        <div class="input_wrap">
                            <input type="submit" value="Update Bus Driver Now" class="submit_btn" name="UpdateBusDriver">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
