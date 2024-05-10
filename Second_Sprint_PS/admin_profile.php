<?php 
session_start();

       include("connection.php");
       include("function.php");

       $user_data_admin = check_login_admin($conn);

?>

<!DOCTYPE html>

<html>
<head>
    <title>Online Bus Ticket System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="admin_profiles.css">
</head>
<body> 
    <div class="user-greeting"><b><font color="#fff"> Hello !!! <?php echo $user_data_admin['username'];?></font></b></div>
    <div class="content-wrapper">
        <div class="left">
            <img src="iconpic.jpg" alt="user" width="100" class="avatar">
            <br>
            <a href="admin_dashboard.php"><button class="btn home-btn">Home </button></a>
        </div>
    </div>

    <div class="right">
        <h2>Account Information</h2><hr/>
        <div class="info">
        <p><strong>User name:- <?php echo $user_data_admin['username'];?>   </p><br>
        <p><strong>Password:- <?php echo $user_data_admin['password'];?> </p></div> 
       
        
        <h2>LOGOUT & SECURITY</h2><hr>
        <br>
        <div class='actions'>
        <a href="updateProfile.php?id=<?php echo $user_data_admin['id'];?>">
        <button class="btn update-btn">Update</button></a>
        <a href="loginMenu.php">
        <button class="btn logout-btn">Logout</button></a>
        <a href="deleteProfile.php?id=<?php echo $user_data_admin['id'];?>">
        <button class="btn delete-btn">Delete</button></a></div>
    </div>
</body>
</html>
