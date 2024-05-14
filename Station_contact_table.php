<?php 
session_start();
include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Contact info Panel of Bus Services</title>
  <!-- Link to external CSS files -->
  <link rel="stylesheet" href="sidebar.css">
  <link rel="stylesheet" href="Admin_dashboard.css">
  <!--cdn icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>
<body>
  <!-- Sidebar -->
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
    </ul>
  </div>

  <!-- Dashboard content -->
  <div class="sidebar2">
    <h1 class="adminTopic">Contact Information</h1>
    <?php
      $sqlget="SELECT * FROM notification";
      $sqldata=mysqli_query($conn,$sqlget) or die('error getting');
      echo "<table>";
      echo "<tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Message</th>
            </tr>";
      while ($row=mysqli_fetch_array($sqldata,MYSQLI_ASSOC)) {
        echo "<tr><td>";
        echo $row['Name'];
        echo "</td><td>";
        echo $row['Email'];
        echo "</td><td>";
        echo $row['Phone'];
        echo "</td><td>";
        echo $row['Message'];
        echo "</td></tr>";
      }
      echo "</table>";
    ?>
  </div>
</body>
</html>
