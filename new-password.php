<?php include_once ("controller.php"); ?>

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
<style>
    .bg{
        background: #fff;
    padding: 30px 35px;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
}
    
</style>
<body class="bglogin" style="background-attachment: fixed;">
<div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
    <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
        <!-- <h1 class="awesome">Forgot Password</h1> -->
    </div>



    <form action="new-password.php" method="POST" autocomplete="off" style="padding-right: 10%;">
        <div class="formbg-outer"><br><br><br>
            <div class="formbg" style="float: right;">
                <div class="formbg-inner padding-horizontal--48 bg">
                    <h1 class="awesome">Forgot Password</h1>

                    <span style="color: black;" class="padding-bottom--15">New Password</span>
                    <form id="stripe-login">
                        <div class="field padding-bottom--24">
                        <!-- <label for="username" style="color: white;">Code</label> -->

                        <input type="password" name="password" placeholder="Password" required><br>
                        </div>
                        <div class="field padding-bottom--24">
                        <!-- <label for="username" style="color: white;">Code</label> -->

                        <input type="password" name="confirmPassword" placeholder="Confirm Password" required><br>
                        </div>
                        <!-- <div class="field padding-bottom--24">
                            <div class="grid--50-50">
                            </div>
                            <label for="username" style="color: white;">New - Password</label>

                            <input type="password" name="password" placeholder=" Password">
                        </div>
                        <div class="field padding-bottom--24">
                        <label for="username" style="color: white;">Re - Password</label>

                            <input type="text" name="full_name" placeholder=" Full name">
                        </div> -->
                        <div class="field padding-bottom--24">
                            <input type="submit" name="changePassword" value="Change" >
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



