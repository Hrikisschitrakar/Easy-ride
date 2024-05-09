<?php 
session_start();

    include("connection.php");
    include("function.php");

    $user_data_station = check_login_station($conn);

?>

<!DOCTYPE html>

<html>
<head>
<title>Online Bus Ticket System</title>
<!--<link rel="stylesheet" href="css/profile.css"/>-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <style type="text/css">
    </style>
<link rel="stylesheet" href="sidebar.css">
<link rel="stylesheet" href="admin_profiles.css">
</head>
<body > 


  
       
  
          <!-- body part my account code -->
          
          <div class="usern"><b><font color="#fff"> Hello !!! <?php echo $user_data_station['username'];?></font></b></div>
            <div class="wrapper">
              <div class="left">
                  <img src="iconpic.jpg"alt="user" width="200">
                  <button class="btn4">Upload image </button><br>
                  <br>
                  <a href="StationManager_dashboard.php"><button class="btn4">Home </button></a>
              </div>
              </div>



<!--information-->
        <div class="right">

                  
           <h3>Account Information</h3><hr/><br/>  
                <p>User name:- <?php echo $user_data_station['username']; ?>   </p>
                <p>Email:- <?php echo $user_data_station['email'];?> </p>
                <br>
                <br>
                <p>First name:-<?php echo $user_data_station['First_Name'];?></p><br>
                <p>Last name:-<?php echo $user_data_station['Last_Name'];?></p><br>
                
                
         </div>
          <!--
         <div class="nxdiv">
           <h3>Security offtion</h3>
           <p>password:- <input type="password"></p>
                

         </div>-->
                  
                 
             
             
            
</body>
</html>
