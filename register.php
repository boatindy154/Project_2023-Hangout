<?php 

    session_start();

    require_once "connection.php";

    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];

        $user_check = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);

        if ($user['username'] === $username) {
            echo "<script>alert('Username already exists');</script>";
        } else {
            $passwordenc = md5($password);

            $query = "INSERT INTO user (username, password, firstname, lastname, phone ,userlevel)
                        VALUE ('$username', '$passwordenc', '$firstname', '$lastname', '$phone', 'm')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $_SESSION['success'] = "Insert user successfully";
                header("Location: login.php");
            } else {
                $_SESSION['error'] = "Something went wrong";
                header("Location: register.php");
            }
        }

    }


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>2023 HANGOUT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/regis.css">
  </head>
  <body>


    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">2023 <span>HANGOUT</span></a>
	      <div class="order-lg-last btn-group">
          <a href="#" class="btn-cart dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          	<span class="flaticon-shopping-bag"></span>
          	<div class="d-flex justify-content-center align-items-center"><small>3</small></div>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
				    <div class="dropdown-item d-flex align-items-start" href="#">
				    	<div class="img" style="background-image: url(images/prod-1.jpg);"></div>
				    	<div class="text pl-3">
				    		<h4>Bacardi 151</h4>
				    		<p class="mb-0"><a href="#" class="price">$25.99</a><span class="quantity ml-3">Quantity: 01</span></p>
				    	</div>
				    </div>
				    <div class="dropdown-item d-flex align-items-start" href="#">
				    	<div class="img" style="background-image: url(images/prod-2.jpg);"></div>
				    	<div class="text pl-3">
				    		<h4>Jim Beam Kentucky Straight</h4>
				    		<p class="mb-0"><a href="#" class="price">$30.89</a><span class="quantity ml-3">Quantity: 02</span></p>
				    	</div>
				    </div>
				    <div class="dropdown-item d-flex align-items-start" href="#">
				    	<div class="img" style="background-image: url(images/prod-3.jpg);"></div>
				    	<div class="text pl-3">
				    		<h4>Citadelle</h4>
				    		<p class="mb-0"><a href="#" class="price">$22.50</a><span class="quantity ml-3">Quantity: 01</span></p>
				    	</div>
				    </div>
				    <a class="dropdown-item text-center btn-link d-block w-100" href="cart.html">
				    	View All
				    	<span class="ion-ios-arrow-round-forward"></span>
				    </a>
				  </div>
        </div>

	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">Music</a></li>
            <li class="nav-item"><a href="menu1.html" class="nav-link">Menu</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Table</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Payment</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    

  
    <section class="ftco-section testimony-section img" style="background-image: url(images/bg_4.jpg);" >
    	<div class="overlay"></div>
      <div class="container" style="padding-top: 6%;">
        <div class="title">Registration</div>
        <div class="content" style="position: sticky;">
          <form action="#">
            <div class="user-details">
              <div class="input-box">
                <span class="details">Firstname</span>
                <input type="text" name="firstname" placeholder="Enter your name" required>
              </div>
              <div class="input-box">
                <span class="details">Lastname</span>
                <input type="text" name="lastname" placeholder="Enter your username" required>
              </div>
              <div class="input-box">
                <span class="details">Username</span>
                <input type="text" name="username" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <span class="details">Email</span>
                <input type="text" name="email" placeholder="Enter your number" required>
              </div>
              <div class="input-box">
                <span class="details">Phone Number</span>
                <input type="text" name="phone" placeholder="Enter your password" required>
              </div>
              <div class="input-box">
                <span class="details">Password</span>
                <input type="text" name="password" placeholder="Confirm your password" required>
              </div>
            </div>
            <!-- <div class="gender-details">
              <input type="radio" name="gender" id="dot-1">
              <input type="radio" name="gender" id="dot-2">
              <input type="radio" name="gender" id="dot-3">
              <span class="gender-title">Gender</span>
              <div class="category">
                <label for="dot-1">
                <span class="dot one"></span>
                <span class="gender">Male</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="gender">Female</span>
              </label>
              </div>
            </div> -->
            <div class="button">
              <input type="submit" name="submit" value="Submit">
            </div>
          </form>
        </div>
      </div>
    </section>


		<!-- <section class="ftco-counter ftco-section ftco-no-pt ftco-no-pb img bg-light" id="section-counter">
    	<div class="container">
    		<div class="row">
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18 py-4 mb-4">
              <div class="text align-items-center">
                <strong class="number" data-number="3000">0</strong>
                <span>Our Satisfied Customers</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18 py-4 mb-4">
              <div class="text align-items-center">
                <strong class="number" data-number="115">0</strong>
                <span>Years of Experience</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18 py-4 mb-4">
              <div class="text align-items-center">
                <strong class="number" data-number="100">0</strong>
                <span>Kinds of Liquor</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18 py-4 mb-4">
              <div class="text align-items-center">
                <strong class="number" data-number="40">0</strong>
                <span>Our Branches</span>
              </div>
            </div>
          </div>
        </div>
    	</div>
    </section> -->

    <footer class="ftco-footer">
		<div class="container">
		  <div class="row ">
			<div class="col-sm-12 col-md">
			  <div class="ftco-footer-widget mb-4">
				<h2 class="ftco-heading-2 logo"><a href="#">2023 <span>HANGOUT</span></a></h2>
				<p>Far far away, behind the word mountains, far from the countries.</p>
				<ul class="ftco-footer-social list-unstyled mt-2">
				  <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
				  <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
				  <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
				</ul>
			  </div>
			</div>                       
			<div class="col-sm-12 col-md">
			  <div class="ftco-footer-widget mb-4">
				  <h2 class="ftco-heading-2">Contact info</h2>
				  <div class="block-23 mb-3">
					<ul>
					  <li><span class="icon fa fa-map marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
					  <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929 210</span></a></li>
					  <li><a href="#"><span class="icon fa fa-paper-plane pr-4"></span><span class="text">info@yourdomain.com</span></a></li>
					</ul>
				  </div>
			  </div>
			</div>
		  </div>
		</div>
		
	  </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>