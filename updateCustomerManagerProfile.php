<?php 

	session_start();

?>
<?php include("connection.php")?>
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


      

       if(isset($_POST['CustomerManagerUpdate'])){
       // Check if id is set in $_POST
       if(isset($_POST['id'])) {
          $id=$_POST['id'];
       } else {
          echo '<script type="text/javascript">alert("ID is missing from the form data.")</script>';
          exit(); // Stop further execution if ID is missing
       }
       $user_id=$_POST['user_id'];
       $First_Name=$_POST['First_Name'];
       $Last_Name=$_POST['Last_Name'];
       $username=$_POST['username'];
       $email=$_POST['email'];
       $telephone=$_POST['telephone'];
       $password=$_POST['password'];

       // Password validation
       $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{4,}$/";
       if (!preg_match($passwordPattern, $password)) {
           echo ("<script LANGUAGE='JavaScript'>
           window.alert('Password must be at least 4 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.');
           window.location.href='updateCustomerManagerProfile.php';
           </script>");
           exit(); // Stop further execution if password validation fails
       }

       $query="UPDATE `users` SET user_id='$user_id',First_Name='$First_Name',Last_Name='$Last_Name',username='$username',email='$email',telephone=$telephone ,password='$password' where id=$id";


       $query_run=mysqli_query($conn,$query);

      
  

         if($query_run){

            /*
      
                    //redirect to your profile page//

                    header("Location: Stationmanagerprofile.php");
       
                    die;

                 
*/
echo ("<script LANGUAGE='JavaScript'>
window.alert('Succesfully Bus updated!!!');
window.location.href='Customermanagerprofile.php';
</script>");


          }

          else{

               echo '<script type="text/javascript">alert("Customer profile updated!!!")</script>';
           }

           

     }

?>



<div class="sidebar2">



          <div class="wrapper">
  <div class="registration_form">
    <div class="title">
      Customer Manger Profile update
    </div>

    <form action="#" method="POST">
      <div class="form_wrap">
        <!-- Hidden input field for ID -->
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
          <label for="title">Telephone</label>
          <input type="number" id="title" name="telephone" placeholder="telephone" class="idclass">
        </div>


          <div class="input_wrap">
          <label for="title">password</label>
          <input type="password" id="title" name="password" placeholder="password" class="idclass">
        </div>


        
        <div class="input_wrap">

          <input type="submit" value="Update Customer profile Now" class="submit_btn" name="CustomerManagerUpdate">

        </div>



      </div>
    </form>
  </div>
</div>




</div>

</body>
</html>
