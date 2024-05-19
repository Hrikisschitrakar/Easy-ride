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
            <li><a href="admin_dashboard.php">Manage Routes</a></li>
            <li><a href="manageprofiles.php">Manage Profiles</a></li>
            <li><a href="ManagesBuses.php">Manage Buses</a></li>
            <li><a href="BookingManage.php">Booking People</a></li>
            <li><a href="PaymentManage.php">Transaction</a></li>
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

        // Check if username is already assigned to a bus
        $check_username_query = "SELECT * FROM `bus_driver` WHERE username=? AND id != ?";
        $check_stmt = $conn->prepare($check_username_query);
        $check_stmt->bind_param("si", $username, $id);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        if ($check_result->num_rows > 0) {
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('This username is already assigned to a bus and cannot be assigned to another bus.');
                window.location.href='updateBusdriverprofile.php';
                </script>");
            exit();
        }

        // Password validation
        $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{4,}$/";
        if (!preg_match($pattern, $Password)) {
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Password must be at least 4 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.');
                window.location.href='updateBusdriverprofile.php';
                </script>");
            exit();
        }

        // Prepare and bind the SQL statement
        $query = "UPDATE `bus_driver` SET user_id=?, First_Name=?, Last_Name=?, username=?, bus_assigned=?, telephone=?, email=?, password=? WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssssssi", $user_id, $First_Name, $Last_Name, $username, $Bus_Name, $Telephone_no, $Email, $Password, $id);

        // Execute the statement
        $query_run = $stmt->execute();

        if($query_run) {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Successfully updated the bus driver profile!');
            window.location.href='Busdriverprofile.php';
            </script>");
        } else {
            echo '<script type="text/javascript">alert("Bus driver profile not updated!")</script>';
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
                    Bus Driver Update/Edit
                </div>
                <form action="#" method="POST">
                    <div class="form_wrap">
                        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">

                        <div class="input_wrap">
                            <label for="user_id">User Id</label>
                            <input type="number" id="user_id" name="user_id" placeholder="User Id" class="idclass" required>
                        </div>
                        <div class="input_wrap">
                            <label for="First_Name">First Name</label>
                            <input type="text" id="First_Name" name="First_Name" placeholder="First Name" required>
                        </div>
                        <div class="input_wrap">
                            <label for="Last_Name">Last Name</label>
                            <input type="text" id="Last_Name" name="Last_Name" placeholder="Last Name" required>
                        </div>
                        <div class="input_wrap">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" placeholder="Username" required>
                        </div>
                        <div class="input_wrap">
                            <label for="bus_assigned">Select Bus</label>
                            <select id="bus_assigned" name="bus_assigned" class="idclass" required>
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
                            <label for="telephone">Telephone no</label>
                            <input type="text" id="telephone" name="telephone" placeholder="Telephone number" class="idclass" required>
                        </div>
                        <div class="input_wrap">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Email" class="idclass" required>
                        </div>
                        <div class="input_wrap">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Password" class="idclass" required>
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
