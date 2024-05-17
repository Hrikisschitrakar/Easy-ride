<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include ("connection.php"); ?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot Password</title>
    <link rel="stylesheet" href="forgot_password.css" />
</head>



<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file


    // Get user input
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND email = ?");
    $stmt->bind_param("ss", $username, $email);

    // Execute the statement
    $stmt->execute();

    // Store result
    $stmt->store_result();

    // Check if a matching user is found
    if ($stmt->num_rows > 0) {
        // Redirect to reset-password.php

        $_SESSION["email"] = $email;
        $_SESSION["username"] = $username;
        header("Location: reset-password.php");
        echo "................";
        exit();
    } else {
        echo "No user found with the provided username and email.";
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>

<body>
    <div class="container">
        <form action="forgot-password.php" method="post">
            <h2>Forgot Password</h2>
            <label for="username">Enter your username:</label>
            <input type="text" id="username" name="username" required />
            <label for="email">Enter your email:</label>
            <input type="email" id="email" name="email" required />
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>