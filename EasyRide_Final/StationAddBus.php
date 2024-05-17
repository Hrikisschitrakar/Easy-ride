<?php 
session_start();
?>
<?php include("connection.php")?>
<!DOCTYPE html>
<html>
<head>
  <title>Bus adding</title>
  <!--cdn icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="sidebar.css">
<link rel="stylesheet" href="signUp.css">
<link rel="stylesheet" href="AddBus.css">
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
    <?php 
    if(isset($_POST['AddBus'])){
      $id=$_POST['id'];      
      $Bus_Name=$_POST['Bus_Name'];
      $Tel=$_POST['Tel'];
      
      
      // Check if ID already exists
      $check_query = "SELECT id FROM bus WHERE id = ?";
      $stmt = $conn->prepare($check_query);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($result->num_rows > 0) {
        echo ("<script LANGUAGE='JavaScript'>
          window.alert('ID is already present. Please put another ID.');
          window.location.href='StationAddBus.php';
          </script>");
        exit(); // Stop further execution if ID already exists
      }
      
      // Insert new record
      $stmt = $conn->prepare("INSERT INTO bus(id, Bus_Name, Tel) VALUES(?, ?, ?)");
      $stmt->bind_param("iss", $id, $Bus_Name, $Tel);
      $stmt->execute();
      $stmt->close();
      
      echo ("<script LANGUAGE='JavaScript'>
        window.alert('Succesfully Bus Added!!!');
        window.location.href='StationManageBuses.php';
        </script>");
      $conn->close();
    }
    ?>
    <div class="wrapper">
      <div class="registration_form">
        <div class="title">
          Bus adding
        </div>
        <form action="#" method="POST">
          <div class="form_wrap">
            <div class="input_wrap">
              <label for="title">Id</label>
              <input type="number" id="title" name="id" placeholder="id" class="idclass" required>
            </div>
            <div class="input_wrap">
              <label for="title">Bus Name</label>
              <input type="text" id="title" name="Bus_Name" placeholder="Bus Name" required>
            </div>
                        
            <div class="input_wrap">
              <label for="title">Telephone no</label>
              <input type="number" id="title" name="Tel" placeholder="Telephone no" class="idclass" required>
            </div>
            
            <div class="input_wrap">
              <input type="submit" value="Add Bus Now" class="submit_btn" name="AddBus">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
