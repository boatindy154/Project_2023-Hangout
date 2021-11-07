<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel="stylesheet" href="css/login.css">
</head>
<body class="bglogin">
<div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
    <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
        <h1><a href="" rel="dofollow">Register</a></h1>
    </div>



    <form method="post" action="checkregister.php">
        <div class="formbg-outer">
            <div class="formbg">
                <div class="formbg-inner padding-horizontal--48">
                    <span class="padding-bottom--15">Sign up to your account</span>
                    <form id="stripe-login">
                        <div class="field padding-bottom--24">
                            <input type="text" name="username" placeholder=" Username">
                        </div>
                        <div class="field padding-bottom--24">
                            <div class="grid--50-50">
                            </div>
                            <input type="password" name="password" placeholder=" Password">
                        </div>
                        <div class="field padding-bottom--24">
                            <input type="text" name="full_name" placeholder=" Full name">
                        </div>
                        <div class="field padding-bottom--24">
                            <input type="text" name="email" placeholder=" Email">
                        </div>
                        <div class="field padding-bottom--24">
                            <input type="text" name="phone" placeholder=" Phone">
                        </div>
                        <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
                        </div>
                        <div class="field padding-bottom--24">
                            <input type="submit" name="submit" value="Sign Up" >
                        </div>
                        <!-- <div class="field">
                  <a class="ssolink" href="#">Register</a>
                </div> -->
                    </form>
                </div>
            </div>
            <div class="footer-link padding-top--24">
                <!-- <span>Don't have an account? <a href="register.php">Sign up</a></span> -->
                <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
                    <!-- <span><a href="#">© Stackfindover</a></span>
              <span><a href="#">Contact</a></span>
              <span><a href="#">Privacy & terms</a></span> -->
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>



