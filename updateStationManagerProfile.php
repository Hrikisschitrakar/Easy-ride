<?php 

	session_start();

?>
<?php include("connection.php")?>
<!--
<!DOCTYPE html>
<html>
<head>
	<title>admin Panel Easyride</title>
</head>
<body>

   <?php// echo "welcome:".  $_SESSION['id']; ?>
   <a href="loginMenu.php"><button class="btnHome">logout</button></a>

</body>
</html>

-->


<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel Easy ride</title>
  <!--cdn icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="sidebar.css">
<link rel="stylesheet" href="signUp.css">
<link rel="stylesheet" href="updateRoute.css">
	<style type="text/css">
    </style>
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
    <li><a href="manageprofiles.php">Manages Profiles</a></li>
    <li><a href="ManagesBuses.php">Manage Buses</a></li>
    <li><a href="BookingManage.php">Booking People</a></li>
    <li><a href="PaymentManage.php">Transaction</a></li>
    <li><a href="loginMenu.php">logout</a></li>
    
  <!--  <li><a href="#">Event</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Service</a></li>
    <li><a href="#">Contact</a></li>-->
    </ul>
 <!--  <li>
      <div class="social-links">
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        <a href="#" class="google-plus"><i class="fa fa-youtube"></i></a>
        
      </div>
    </li>-->
   

</div>

   

   <?php 


      

       if(isset($_POST['StationManagerUpdate'])){

       $id=$_POST['id'];
       $user_id=$_POST['user_id'];
       $First_Name=$_POST['First_Name'];
       $Last_Name=$_POST['Last_Name'];
       $username=$_POST['username'];
       $email=$_POST['email'];
        $password=$_POST['password'];

        $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{4,}$/";
        if (!preg_match($pattern, $password)) {
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Password must be at least 4 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.');
                window.location.href='updateStationManagerProfile.php';
                </script>");
            exit();
        }

        $query = "UPDATE `station_manager` SET user_id=?, First_Name=?, Last_Name=?, username=?, email=?, password=? WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssssi", $user_id, $First_Name, $Last_Name, $username, $email, $password, $id);
        $query_run = $stmt->execute();
        

      
  

         if($query_run){

            /*
      
                    //redirect to your profile page//

                    header("Location: Stationmanagerprofile.php");
       
                    die;

                 
*/
echo ("<script LANGUAGE='JavaScript'>
window.alert('Succesfully Updated Statation Manager!!!');
window.location.href='Stationmanagerprofile.php';
</script>");


          }

          else{

               echo '<script type="text/javascript">alert("Route not updated!!!")</script>';
           }

           

     }

?>



<div class="sidebar2">



          <div class="wrapper">
  <div class="registration_form">
    <div class="title">
      Station Manger Profile update
    </div>

    <form action="#" method="POST">
      <div class="form_wrap">
      <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
        
        
        <div class="input_wrap">
          <label for="title">user_id</label>
          <input type="number" id="title" name="user_id" class="idclass"placeholder="user_id" required>
        </div>


        <div class="input_wrap">
          <label for="title">First Name</label>
          <input type="text" id="title" name="First_Name" placeholder="First Name" required>
        </div>

         <div class="input_wrap">
          <label for="title">Last Name</label>
          <input type="text" id="title" name="Last_Name" placeholder="Last Name" required>
        </div>


         <div class="input_wrap">
          <label for="title">Username</label>
          <input type="text" id="title" name="username" placeholder="Username" class="idclass">
        </div>


         <div class="input_wrap">
          <label for="title">Email</label>
          <input type="email" id="title" name="email" placeholder="Email" class="idclass">
        </div>


          <div class="input_wrap">
          <label for="title">password</label>
          <input type="password" id="title" name="password" placeholder="password" class="idclass">
        </div>


        
        <div class="input_wrap">

          <input type="submit" value="Update Station manager Now" class="submit_btn" name="StationManagerUpdate">

        </div>



      </div>
    </form>
  </div>
</div>




</div>

</body>
</html>