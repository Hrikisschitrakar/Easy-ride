<?php
include "connection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Password</title>
    <link rel="stylesheet" href="reset_password.css" />
</head>

<body>
    <div class="container">
        <?php


        // Check if user session or token is present for validation (implement security measures)
        // ... (This section is not implemented in this example for brevity)
        
        // Get username and email from potential session/token variables (replace with actual source)
        $username = $_SESSION["username"]; // Example using session variable
        $email = $_SESSION["email"];     // Example using session variable
        print_r($_SESSION);
        // $username = "";  // Placeholder until validated (replace with actual retrieval logic)
        // $email = "";     // Placeholder until validated (replace with actual retrieval logic)
        
        // Error message variable
        $errorMessage = "";

        // Process form submission if method is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newPassword = $_POST["new_password"];
            $confirmPassword = $_POST["confirm_password"];

            // Validate password length and match
            if (strlen($newPassword) < 8 || $newPassword !== $confirmPassword) {
                $errorMessage = "Password must be at least 8 characters long and match the confirm password.";
            } else {
                // Assuming username and email are retrieved from session/token (replace with actual logic)
                // Hash the new password
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                // Update password in database (using prepared statement)
                try {
                    echo $email;
                    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $sql = "UPDATE users SET password = :hashedPassword WHERE username = :username AND email = :email";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(":hashedPassword", $newPassword);
                    $stmt->bindParam(":username", $username);  // Replace with actual username retrieval
                    $stmt->bindParam(":email", $email);        // Replace with actual email retrieval
                    $stmt->execute();

                    // Password updated successfully, redirect to login page (or display success message)
                    header("Location: viewbus.php");  // Consider success message instead of direct redirect
                    exit();
                } catch (PDOException $e) {
                    $errorMessage = "Error updating password: " . $e->getMessage();
                } finally {
                    $conn = null;  // Close connection (optional, handled by PDO destructor in most cases)
                }
            }
        }
        ?>

        <?php if (!empty($errorMessage)): ?>
            <p class="error">
                <?php echo $errorMessage; ?>
            </p>
        <?php endif; ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>Reset Password</h2>
            <label for="new_password">Enter your new password:</label>
            <input type="password" id="new_password" name="new_password" required minlength="8">
            <label for="confirm_password">Confirm your new password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required minlength="8">
            <button type="submit">Reset Password</button>
        </form>
    </div>
</body>

</html>