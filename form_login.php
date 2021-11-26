<?php session_start();?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Yinka Enoch Adedokun">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" href="css/login.css">
	<title>Login Page</title>
</head>
<body class="bglogin" >
	<!-- Main Content -->
	
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1 class="awesome">2023 Hangout</h1>
        </div>
        <form name="frmlogin"  method="post" action="checklogin.php">
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Log in to your account</span>
              <form id="stripe-login">
                <div class="field padding-bottom--24">
                  <label for="username" style="color: white;">Username</label>
                  <input type="username" name="username" placeholder="Username">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="password" style="color: white;">Password</label>
                    <div class="reset-pass">
                      <a href="forgotpass.php">Forgot your password?</a>
                    </div>
                  </div>
                  <input type="password" name="password" placeholder="Password">
                </div>
                <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
                </div>
                <div class="field padding-bottom--24">
                  <input type="submit" name="submit" value="Login">
                </div>
                <!-- <div class="field">
                  <a class="ssolink" href="#">Register</a>
                </div> -->
              </form>
            </div>
          </div>
          <div class="footer-link ">
            <span>Don't have an account? <a href="register.php">Sign up</a></span>
            <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
              <!-- <span><a href="#">© Stackfindover</a></span>
              <span><a href="#">Contact</a></span>
              <span><a href="#">Privacy & terms</a></span> -->
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  
</body>