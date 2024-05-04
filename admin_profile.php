<?php 
session_start();

include("connection.php");
include("function.php");

$user_data = check_login($conn);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Bus Ticket System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="admin_profile.css">
</head>
<body> 
    <div class="usern"><b><font color="#fff"> Hello !!! <?php echo $user_data['username'];?></font></b></div>
    <div class="wrapper">
        <div class="left">
            <img src="adminprofile.jpg" alt="user" width="200">
            <button class="btn4">Upload image </button><br>
            <br>
            <a href="admin_dashboard.php"><button class="btn4">Home </button></a>
        </div>
    </div>

    <div class="right">
        <h3>Account Information</h3><hr/><br/>  
        <p>User name:- <?php echo $user_data['username'];?>   </p><br>
        <p>Email:- <?php echo $user_data['email'];?> </p>
        <br>
        <p>First name:-<?php echo $user_data['First_Name'];?></p><br>
        <p>Last name:-<?php echo $user_data['Last_Name'];?></p><br>
        
        <h3>LOGOUT & SECURITY</h3><hr/><br>
        <br><a href="updateProfile.php?id=<?php echo $user_data['id'];?>">
        <button class="btn3">Update</button></a>
        <a href="logout.php">
        <button class="btn3">Logout</button></a>
        <a href="deleteProfile.php?id=<?php echo $user_data['id'];?>">
        <button class="btn3">Delete</button></a>
    </div>
</body>
</html>
