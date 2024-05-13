<?php
session_start();

include ("connection.php");
include ("function.php");

$user_data = check_login($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Bus Ticket System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="profile.css">
</head>

<body>
    <div class="container">
        <div class="user-greeting"><b>Hello,
                <?php echo $user_data['First_Name']; ?>
            </b></div>
        <div class="content-wrapper">
            <div class="left">
                <img src="avatar.png" alt="User" width="100" class="avatar">

                <a href="viewbus.php" class="btn home-btn">Home</a>
            </div>
            <div class="right">
                <h2>Account Information</h2>
                <hr>
                <div class="info">
                    <p>User name:-
                        <?php echo $user_data['username']; ?>
                    </p><br>
                    <p>Email:-
                        <?php echo $user_data['email']; ?>
                    </p>
                    <br>
                    <p>First name:-
                        <?php echo $user_data['First_Name']; ?>
                    </p><br>
                    <p>Last name:-
                        <?php echo $user_data['Last_Name']; ?>
                    </p><br>
                </div>
                <h2>Logout & Security</h2>
                <hr>
                <div class="actions">
                    <br><a href="updateProfile.php?id=<?php echo $user_data['id']; ?>">
                        <button class="btn3">Update</button></a>
                    <a href="logout.php">
                        <button class="btn3">Logout</button></a>
                    <a href="deleteProfile.php?id=<?php echo $user_data['id']; ?>">
                        <button class="btn3">Delete</button></a>
                </div>
            </div>
        </div>

    </div>
    </div>
</body>

</html>