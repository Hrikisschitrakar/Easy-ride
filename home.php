<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>EZfare Bus and Ticket Booking</title>
  <link rel="stylesheet" href="nav.css">
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" type="text/css" href="cssfile>/videoedit.css">
  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  
</head>
<body>

  <div id="container">
    <!-- Navigation -->
    <nav>
      <ul>
        <li class="logo"><h4>EasyRide</h4></li>
        <li class="btn"><span class="fas fa-bars"></span></li>
        <div class="items">
          <li><a href="home.php">Home</a></li>
          <li><a href="loginMenu.php">Login</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
            <li><a href="contact_us.php">Contact Us</a></li>
            <li><a href="slide.php">Services</a></li>
         
        </div>
      </ul>
    </nav>

    <h1 class="home_details">Your Bus Pass.Anytime. <br><font class="font">Anywhere..</font>
      <br>
      <a href="Dashboard/signUp.php"><button class="btnHome">SIGN UP NOW</button></a>
    </h1>
  </div>

  <div class="section">
    <video autoplay loop muted class="section">
      <source src="video/video.mp4" type="video/mp4">
    </video>
  </div><!-- section -->

  <!-- Footer -->
  <footer>
    <div class="footerInfo">
        <div class="footerContainer">
            <div class="footerItem">
                <div class="socialInfo">
                    <div class="mainTitle">
                        <h4> Connect with Us <span></span></h4>
                    </div>
                    <div class="socialItem">
                        <div class="socialLink facebook">
                            <i class="fab fa-facebook-f"></i>
                        </div>
                        <div class="socialLink instagram">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <div class="socialLink twitter">
                            <i class="fab fa-twitter"></i>
                        </div>
                    </div>
                </div>
                <div class="socialInfo">
                    <div class="mainTitle">
                        <h4> Our Services <span></span></h4>
                    </div>
                    <div class="socialItem">
                        <a href="#"> Online Booking </a>
                        <a href="#"> Seat Reservation</a>
                        <a href="#"> Ticket Cancellation </a>
                        <a href="#"> Customer Support </a>
                    </div>
                </div>
                <div class="socialInfo">
                    <div class="mainTitle">
                        <h4> Explore Destinations <span></span></h4>
                    </div>
                    <div class="socialItem">
                        <a href="#"> View Bus Routes </a>
                        <a href="#"> Popular Destinations</a>
                        <a href="#"> Travel Tips </a>
                    </div>
                </div>
                <div class="socialInfo">
                    <div class="mainTitle">
                        <h4> Contact Information <span></span></h4>
                    </div>
                    <h5 class="addressTitle">Bus Ticket System Headquarters</h5>
                    <div class="callInfo">
                        <h6>Call</h6> <i class="fas fa-arrow-right"></i>
                        <span>+021585358</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    $(document).ready(function() {
        $('nav ul li.btn span').click(function(){
            $('nav ul div.items').toggleClass("show");
            $('nav ul li.btn span').toggleClass("show");
        });
    });
</script>

</body>
</html>
