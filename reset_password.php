<?php
session_start();
// Assuming your database connection is already established
// Include your database connection file here if needed

if (!isset($_SESSION['email'])) {
    header("Location: forget_password.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION['email'];
    $newPassword = $_POST['new_password'];

    // Update the user's password in the database
    // Replace 'your_table_name' with the actual table name in your database
    $updateSql = "UPDATE your_table_name SET password = '$newPassword' WHERE email = '$email'";
    mysqli_query($conn, $updateSql);

    echo "Password updated successfully.";
    session_unset();
    session_destroy();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="forgot_password.css">
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <h2>Reset Password</h2>
            <label for="new_password">Enter new password:</label>
            <input type="password" id="new_password" name="new_password" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>