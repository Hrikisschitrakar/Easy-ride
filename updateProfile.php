<?php


session_start()


    ?>
<?php

include ("connection.php");

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Update Profile</title>
    <link rel="stylesheet" href="sidebar.css">
    <!--  <link rel="stylesheet" href="cssfile/footer_l.css">-->
    <link rel="stylesheet" href="signUp.css">
        <!--  <link rel="stylesheet" type="text/css" href="cssfile/container.css">-->

    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <style type="text/css">
        body {

            background-image: url(2.jpg);
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;

        }

        .confirm {

            background-color: black;
            margin-top: 5px;


        }

        .form_wrap .input_grp input[type="number"] {
            width: 165px;
        }

        .form_wrap input[type="number"] {
            width: 100%;
            border-radius: 3px;
            border: 1px solid #9597a6;
            padding: 10px;
            outline: none;
            color: black;
        }
    </style>

</head>

<body>

    <?php
    if (isset($_POST['updateProfile'])) {

        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        

        $query = "UPDATE `admin` SET username='$username',password='$password' where id=$id";


        $query_run = mysqli_query($conn, $query);




        if ($query_run) {

            /*
      
                    //redirect to your profile page//

                    header("Location: adminDash.php");
       
                    die;

             
                 
    */
            //echo '<script type="text/javascript">alert("profile udated sucessfully!!!")</script>';
    
            echo ("<script LANGUAGE='JavaScript'>
window.alert('Succesfully your profile updated!!!');
window.location.href='admin_login.php';
</script>");


        } else {

            echo '<script type="text/javascript">alert("profile not updated!!!")</script>';
        }



    }

    ?>




    <div class="wrapper">
        <div class="registration_form">
            <div class="title">
                Update Your EasyRide Profile
            </div>

            <form action="#" method="POST">
                <div class="form_wrap">
                    <div class="input_grp">
                        <div class="input_wrap">
                            <label for="fname">Username</label>
                            <input type="text" id="username" name="username" placeholder="Username" required>
                        </div>

                        <div class="input_wrap">
                            <label for="lname">Password</label>
                            <input type="password" id="password" name="password" placeholder="Password">

                        </div>
                        <div class="input_wrap">
                            <label for="title">Id</label>
                            <input type="number" id="title" name="id" class="idclass" value="<?php echo $_GET['id'];?>">
                        </div>
                        
                    </div>

                    


                    <div class="input_wrap">
                        <input type="submit" value="Update Now" class="submit_btn" name="updateProfile">
                    </div>

                </div>
            </form>
        </div>
    </div>

</body>

</html>