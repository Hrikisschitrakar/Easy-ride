<?php 
session_start();

include("connection.php");
include("function.php");

$user_data_station = check_login_station($conn);
?>

<!DOCTYPE html>

<html>
<head>
    <title>Online Bus Ticket System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="admin_profiles.css">
</head>
<body> 

<div class="user-greeting"><b><font color="#fff"> Hello !!! <?php echo $user_data_station['username'];?></font></b></div>
<div class="content-wrapper">
    <div class="left">
        <img src="iconpic.jpg" alt="user" width="100" class="avatar">
        <br>
        <a href="StationManager_dashboard.php"><button class="btn home-btn">Home </button></a>
    </div>

    <div class="right">
        <h2>Account Information</h2><hr/>
        <div class="info">
            <p><strong>User name:- </strong> <?php echo $user_data_station['username']; ?>   </p>
            <p><strong>Email:-</strong> <?php echo $user_data_station['email'];?> </p>
            <p><strong>First name:-</strong><?php echo $user_data_station['First_Name'];?></p>
            <p><strong>Last name:-</strong><?php echo $user_data_station['Last_Name'];?></p>
        </div> 

        <h2>Logout & Security</h2><hr>
        <div class='actions'>
            <a href="updateProfile.php?id=<?php echo $user_data_station['id'];?>">
                <button class="btn update-btn">Update</button>
            </a>
            <a href="loginMenu.php">
                <button class="btn logout-btn">Logout</button>
            </a>
            <a href="deleteProfile.php?id=<?php echo $user_data_station['id'];?>">
                <button class="btn delete-btn">Delete</button>
            </a>
        </div>
    </div>
</div>

</body>
</html>
