<?php 
session_start();
include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Booking Manage</title>
  <link rel="stylesheet" href="sidebar.css">
  <link rel="stylesheet" href="BookingManage.css">
  <!--cdn icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    </ul>
  </div>
  <div class="sidebar2">
    <h1 class="adminTopic">Booking Peoples...</h1>
    <?php
      $sqlget="SELECT * FROM booking";
      $sqldata=mysqli_query($conn,$sqlget) or die('error getting');
      echo "<table>";
      echo "<tr>
              
              <th>Passenger Name</th>
              <th>Tel</th>
              <th>E-mail</th>
              <th>Boarding Place</th>
              <th>His/Her Destination</th>
              <th>Update</th>
              <th>Delete</th>
            </tr>";
      while ($row=mysqli_fetch_array($sqldata,MYSQLI_ASSOC)) {
        
        echo "</td><td>";
        echo $row['passenger_name'];
        echo "</td><td>";
        echo $row['telephone'];
        echo "</td><td>";
        echo $row['email'];
        echo "</td><td>";
        echo $row['boarding_place'];
        echo "</td><td>";
        echo $row['Your_destination'];
        echo "</td>";
        ?>
        <td>
          <button>
            <a href="updateBooking.php?id=<?php echo $row['id'];?>">
              Update
            </a>
          </button>
        </td>
        <td>
          <button>
            <a href="deleteBooking.php?id=<?php echo $row['id'];?>">
              Delete
            </a>
          </button>
        </td>
        <?php
      }
      echo "</table>";
    ?>
  </div>
</body>
</html>
