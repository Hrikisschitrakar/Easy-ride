<?php 
session_start();
include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel of Bus Services</title>
  <!-- Link to external CSS files -->
  <link rel="stylesheet" href="sidebar.css">
  <link rel="stylesheet" href="Admin_dashboard.css">
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
      <li><a href="manageprofiles.php">Manage Profiles</a></li>
      <li><a href="ManagesBuses.php">Manage Buses</a></li>
      <li><a href="BookingManage.php">Booking People</a></li>
      <li><a href="PaymentManage.php">Transaction</a></li>
      <li><a href="loginMenu.php">logout</a></li>
    </ul>
  </div>
  <div class="sidebar2">
    <h1 class="adminTopic">Manage Route of Buses</h1>
    <?php
      $sqlget="SELECT * FROM route";
      $sqldata=mysqli_query($conn,$sqlget) or die('error getting');
      echo "<table>";
      echo "<tr>
              <th>ID</th>
              <th>Via City</th>
              <th>Destination</th>
              <th>Bus Name</th>
              <th>Departure Date</th>
              <th>Departure Time</th>
              <th>Cost</th>
              <th>Update</th>
              <th>Delete</th>
            </tr>";
      while ($row=mysqli_fetch_array($sqldata,MYSQLI_ASSOC)) {
        echo "<tr><td>";
        echo $row['id'];
        echo "</td><td>";
        echo $row['via_city'];
        echo "</td><td>";
        echo $row['destination'];
        echo "</td><td>";
        echo $row['bus_name'];
        echo "</td><td>";
        echo $row['departure_date'];
        echo "</td><td>";
        echo $row['departure_time'];
        echo "</td><td>";
        echo $row['cost'];
        echo "</td>";
        ?>
        <td>
          <button>
            <a href="updateRoute.php?id=<?php echo $row['id'];?>">
              Update
            </a>
          </button>
        </td>
        <td>
          <button>
            <a href="deleteRoute.php?id=<?php echo $row['id'];?>">
              Delete
            </a>
          </button>
        </td>
        <?php
      }
      echo "</table>";
    ?>
    <br>
    <a href="Addroute.php"><button class="btnPolicy">Add Route</button></a>
  </div>
</body>
</html>
