<?php 
	session_start();
?>
<?php include("connection.php")?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel Easyride</title>
  <!--cdn icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="sidebar.css">
  <link rel="stylesheet" href="signUp.css">
  <link rel="stylesheet" href="updateBooking.css">
  <script>
    function validateForm() {
      var boardingPlace = document.getElementById("boarding_place").value;
      var destination = document.getElementById("destination").value;
      if (boardingPlace === destination) {
        alert("Boarding place and destination place cannot be the same.");
        return false;
      }
      return true;
    }
  </script>
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

  <?php 
    if(isset($_POST['updateBooking'])){
      $id=$_POST['id'];    
      $passenger=$_POST['passenger_name'];
      $telephone=$_POST['telephone'];
      $email=$_POST['email'];
      $boarding_place=$_POST['boarding_place'];
      $Your_destination=$_POST['Your_destination'];

      $query="UPDATE `booking` SET passenger_name='$passenger',telephone='$telephone',email='$email',boarding_place='$boarding_place',Your_destination='$Your_destination' where id='$id'";
      $query_run=mysqli_query($conn,$query);

      if($query_run){
        echo ("<script LANGUAGE='JavaScript'>
          window.alert('Successfully Booking Updated!!!');
          window.location.href='BookingManage.php';
        </script>");
      } else {
        echo '<script type="text/javascript">alert("Booking not updated!!!")</script>';
      }
    }
  ?>

  <div class="sidebar2">
    <div class="wrapper">
      <div class="registration_form">
        <div class="title">Update Passenger Booking...</div>
        <form action="#" method="POST" onsubmit="return validateForm()">
          <div class="form_wrap">
            <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
            <div class="input_wrap">
              <label for="passenger_name">Passenger Name</label>
              <input type="text" id="passenger_name" name="passenger_name" placeholder="Passenger Name" required>
            </div>
            <div class="input_wrap">
              <label for="telephone">Telephone</label>
              <input type="text" id="telephone" name="telephone" placeholder="Tel" required>
            </div>
            <div class="input_wrap">
              <label for="email">E-mail</label>
              <input type="email" id="email" name="email" placeholder="E-mail" class="idclass"  required>
            </div>
            <div class="input_wrap">
              <label for="boarding_place">Select Boarding Place</label>
              <select id="boarding_place" name="boarding_place" class="idclass" required>
                <?php 
                  $sql = "SELECT via_city FROM location";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                      echo "<option value='".$row['via_city']."'>".$row['via_city']."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="input_wrap">
              <label for="destination">Select Your Destination</label>
              <select id="destination" name="Your_destination" class="idclass" required>
                <?php 
                  $sql = "SELECT Destination FROM location";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                      echo "<option value='".$row['Destination']."'>".$row['Destination']."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="input_wrap">
              <input type="submit" value="Update Now" class="submit_btn" name="updateBooking">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
