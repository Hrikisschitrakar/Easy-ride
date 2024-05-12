<?php
// Database connection
session_start();
include("connection.php");

// Check if form is submitted
if(isset($_POST['Add_Contact']))  {
        // Retrieve form data
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $message = isset($_POST['message']) ? $_POST['message'] : '';
    
        // Insert data into notifications table
        $sql = "INSERT INTO notification (Name, Email, Phone, Message) VALUES ('$name', '$email', '$phone', '$message')";
    
        if (mysqli_query($conn, $sql)) {
            echo "<script>
                    alert('Contact Info added successfully!');
                    window.location.href = 'contact_us.php';
                  </script>";
            exit; // Stop further execution
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    
    // Close connection
    mysqli_close($conn);
    ?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Easy Ride </title>
        <link rel="stylesheet" href="nav.css">
        <link rel="stylesheet" href="footer_l.css">
        <link rel="stylesheet" href="sidebar.css">
        <link rel="stylesheet" href="contact_us.css">
        <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <style type="text/css">
            body {
                padding: 0;
                margin: 0;
                line-height: 1.5;
                box-sizing: border-box;
                color:rgba(248, 248, 248, 0.938);
                background-image: url(1.jpg);
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
        </style>
    </head>
    <body>
    <nav>
        <ul>
            <li class="logo">
                <h4>EasyRide</h4>
            </li>
            <li class="btn"><span class="fas fa-bars"></span></li>
            <div class="items">
                <li><a href="home.php">Home</a></li>
                <li><a href="loginMenu.php">Login</a></li>
                <li><a href="AboutUs.html">About Us</a></li>
                <li><a href="contact_us.html">Contact Us</a></li>
                <li><a href="slide.html">Services</a></li>
            </div>
        </ul>
    </nav>
    
    <section id="fancy-form">
        <div class="container">
            <div class="form-sections">
                <!-- Form left -->
                <div class="Form-left">
                    <h1>Get In Touch</h1>
                    <div class="line"></div> <!--border-bottom line-->
                    <p>Contact us for latest news and updates. subscribe our news letter :)</p><br>
    
                    <!--first Heading -->
                    <h4>ADDRESS</h4>
                    <span>Naxal, Bagwati Mandir, Herald College Kathmandu</span>
                    <hr><br><br>
    
                    <!--second Heading -->
                    <h4>PHONE</h4>
                    <span>(+997) 9817050844 </span>
                    <hr><br><br>
    
                    <!--third Heading -->
                    <h4>EMAIL</h4>
                    <span>Easyride@gmail.com</span>
                    <hr> <br>
                </div>
    
                <!-- form right -->
                <div class="Form-right">
                    <h1>Contact Us</h1>
                    <div class="line"></div>
                    <!-- form -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <h5>NAME</h5>
                        <input type="text" name="name"><br><br>
                        <h5>EMAIL</h5>
                        <input type="email" name="email"><br><br>
                        <h5>PHONE</h5>
                        <input type="number" name="phone"><br><br>
                        <h5>YOUR MESSAGE</h5>
                        <textarea name="message" cols="50" rows="7"></textarea><br>
                        <button type="submit" name="Add_Contact">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    </body>
    </html>