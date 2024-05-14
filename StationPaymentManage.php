<?php 
session_start();

 // include("connection.php");
 // include("function.php");

  //$user_data = check_login($conn);

?>

<?php include("connection.php")?>
<!--
<!DOCTYPE html>
<html>
<head>
  <title>Easy Ride</title>
</head>
<body>

   <?php// echo "welcome:".  $_SESSION['id']; ?>
   <a href="adminLogout.php"><button class="btnHome">logout</button></a>

</body>
</html>

-->


<!DOCTYPE html>
<html>
<head>
  <title>payment received!!!</title>
  <!--cdn icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="sidebar.css">
<link rel="stylesheet" href="Transaction.css">
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


    
<li><a href="StationManager_dashboard.php">Manage Routes</a></li>
      <li><a href="StationManageBuses.php">Manage Buses</a></li>
      <li><a href="StationbusDriverprofile.php">Manage Bus Driver</a></li>
      <li><a href="StationBookingManage.php">Booking People</a></li>
      <li><a href="StationPaymentManage.php">Transaction</a></li>
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


    <h1 class="adminTopic">Transaction Received...</h1>



<?php

    
    $sqlget="SELECT * FROM payment";
    $sqldata=mysqli_query($conn,$sqlget) or die('error getting');
    

    echo "<table>";
    echo "<tr>
      <th>ID</th>
    <th>Paid Amount</th>
    <th>Paid Passenger Name</th>
    <th>E-mail</th>
    <th>address</th>
    <th>city</th>
    <th>Update/Edit</th>
    <th>Delete</th>

    
   
       </tr>";

       while ($row=mysqli_fetch_array($sqldata,MYSQLI_ASSOC))
       {
        
        echo "<tr><td>";
        echo $row['id'];
        echo "</td><td>";
        echo $row['amount'];
        echo "</td><td>";
        echo $row['name'];
        echo "</td><td>";
        echo $row['email'];
        echo "</td><td>";
        echo $row['address'];
        echo "</td><td>";
        echo $row['city'];
        echo "</td>";
      
       
          
        ?>

        <td>

        <button>
          <a href="UpdateStationTransactionRecieved.php?id=<?php echo $row['id'];?>">
         
          
          

          Update

          </a>

        </button>

        </td>


        <td>

        <button>
          <a href="DeleteStationPaymentManage.php?id=<?php echo $row['id'];?>">
         
          
          

          Delete

          </a>

        </button>

        </td>





      </tr>

<?php
       }

       echo "</table>";


?>
<?php

   
          
        ?>

        







</div>

</body>
</html>