
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
button[type="button"] {
      background-color: #fff;
      box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                  rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                  rgba(0, 0, 0, 0.12) 0px 1px 1px 0px, 
                  rgb(84, 105, 212) 0px 0px 0px 1px, 
                  rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                  rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                  rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;
      color: rgb(84, 105, 212);
      font-weight: 600;
      cursor: pointer;
  }
.field button {
      font-size: 16px;
      line-height: 28px;
      padding: 8px 16px;
      width: 100%;
      min-height: 44px;
      border: unset;
      border-radius: 4px;
      outline-color: rgb(84 105 212 / 0.5);
      background-color: rgb(255, 255, 255);
      box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                  rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                  rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                  rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, 
                  rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                  rgba(0, 0, 0, 0) 0px 0px 0px 0px, 
                  rgba(0, 0, 0, 0) 0px 0px 0px 0px;
  }
    
</style>
<body class="bglogin" style="background-attachment: fixed;">
<div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
    <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
        <!-- <h1 class="awesome">Forgot Password</h1> -->
    </div>



    <form action="forgotpass.php" method="POST" autocomplete="off" style="padding-right: 10%;">
        <div class="formbg-outer"><br><br><br>
            <div class="formbg" style="float: right;">
                <div class="formbg-inner padding-horizontal--48 bg">
                <div class="msg"></div>
                    <h1 class="awesome">Forgot Password</h1>

                    <span style="color: black;" class="padding-bottom--15">Enter your email address</span>
                        <div class="field padding-bottom--24">
                        <!-- <label for="username" style="color: white;">Code</label> -->

                            <input type="email" name="email"  placeholder=" Enter email address" require>
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
                            <!-- <input type="submit" name="forgot_password" value="Check"> -->
                            <button type="submit" name="forgot_password" value="Send an email" >Send</button>
                            <!-- <input onclick="sendEmail()" type="submit" value="Send" > -->
                        </div>
                        <!-- <div class="field">
                  <a class="ssolink" href="#">Register</a>
                </div> -->
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
<!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function sendEmail() {
            var email = $("#email");

            if(isNotEmpty(email)) {
                $.ajax({
                    url: 'sendEmail.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        email: email.val()

                    }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.msg').text("Message send successfully");
                        // window.location.href = "reset-code.html";
                    }
                });
            }
        }

        function isNotEmpty(caller) {
            if(caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            }
            else caller.css('border', '');

            return true;
        }



    </script> -->
</body>
</html>



