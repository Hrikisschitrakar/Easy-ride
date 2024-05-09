<?php 

	session_start();

?>
<?php include("connection.php");?>
<!--
<!DOCTYPE html>
<html>
<head>
	<title>Easy Ride</title>
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
  <title>Station Manger adding</title>
  <!--cdn icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="sidebar.css">
<link rel="stylesheet" href="signUp.css">
<link rel="stylesheet" href="Addroute.css">

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
 <li><a href="manageprofiles.php">Manage Profiles</a></li>
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



<div class="sidebar2">


        <?php 


  if(isset($_POST['Stationmanager_Add'])){

     $id=$_POST['id'];
     $user_id=$_POST['user_id'];
     $First_Name=$_POST['First_Name'];
     $Last_Name=$_POST['Last_Name'];
     $username=$_POST['username'];
     $email=$_POST['email'];
     $password=$_POST['password'];
    

    


       if($conn->connect_error)
          {
            die('Connection Failed :'.$conn->connect_error);
          }
          else
          {

              //$userPay_id = random_num(20);
              $stmt=$conn->prepare("INSERT INTO station_manager(id,user_id,First_Name,Last_Name,username,email,password) VALUES(?,?,?,?,?,?,?)");
              //table3 is the table name//

              $stmt->bind_param("ssssssi",$id,$user_id,$First_Name,$Last_Name,$username,$email,$password);

              $stmt->execute();
              
               echo '<script type="text/javascript">alert("Station Manager Added Sucessfully add successfully")</script>';
               


              
              $stmt->close();
              $conn->close();
              }
                
          
      }     
  

   ?>




          <div class="wrapper">
  <div class="registration_form">
    <div class="title">
      Station Manager adding
    </div>

    <form action="#" method="POST">
      <div class="form_wrap">
        
        <div class="input_wrap">
          <label for="title">Id</label>
          <input type="number" id="title" name="id" placeholder="Id"  class="idclass" required>
        </div>

        <div class="input_wrap">
          <label for="title">User Id</label>
          <input type="number" id="title" name="user_id" placeholder="User Id"  class="idclass" required>
        </div>

        <div class="input_wrap">
          <label for="title">First Name</label>
          <input type="text" id="title" name="First_Name" placeholder="First_Name" required>
        </div>


        <div class="input_wrap">
          <label for="title">Last_Name</label>
          <input type="text" id="title" name="Last_Name" placeholder="Last_Name"  required>
        </div>

        <div class="input_wrap">
          <label for="title">username</label>
          <input type="text" id="title" name="username" placeholder="Username" class="idclass" required>
        </div>

        <div class="input_wrap">
          <label for="title">email</label>
          <input type="email" id="title" name="email" placeholder="Email" class="idclass" required>
        </div>

        <div class="input_wrap">
          <label for="title">password</label>
          <input type="password" id="title" name="password" placeholder="Password" class="idclass" required>
        </div>
        
        
        <div class="input_wrap">
          <input type="submit" value="Add station maanger" class="submit_btn" name="Stationmanager_Add">

        </div>



      </div>
    </form>
  </div>
</div>




</div>

</body>
</html>