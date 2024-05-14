<?php 
  session_start();  
  include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Station Manage Panel of Bus</title>
  <!--cdn icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="sidebar.css">
  <link rel="stylesheet" href="managebuses.css">
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
    <li><a href="StationBusdriverprofile.php">Manage Bus Driver</a></li>
      <li><a href="StationBookingManage.php">Booking People</a></li>
      <li><a href="StationPaymentManage.php">Transaction</a></li>
      <li><a href="loginMenu.php">logout</a></li>
    </ul>
  </div>

  <div class="sidebar2">
    <h1 class="adminTopic">Manage Buses</h1>

    <?php
      $sqlget = "SELECT * FROM bus_driver";
      $sqldata = mysqli_query($conn, $sqlget) or die('error getting');
    ?>

    <table>
      <tr>
        <th>Bus Name</th>
        <th>Driver Name</th>
        <th>Bus Id</th>
        <th>Telephone no</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>

      <?php while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)): ?>
        <tr>
          <td><?php echo $row['Bus_Name']; ?></td>
          <td><?php echo $row['Driver_Name']; ?></td>
          <td><?php echo $row['user_id']; ?></td>
          <td><?php echo $row['Telephone_no']; ?></td>
          <td>
            <button><a href="StationUpdateBus.php?id=<?php echo $row['id']; ?>">Update</a></button>
          </td>
          <td>
            <button><a href="DeleteStationManageBuses.php?id=<?php echo $row['id']; ?>">Delete</a></button>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>
    <br>
    <a href="StationAddBus.php"><button class="btnPolicy">Add Bus</button></a>
  </div>
</body>
</html>
