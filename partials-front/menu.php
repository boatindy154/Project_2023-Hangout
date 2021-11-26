<?php 
include ('config/constantss.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" >
    
</head>
<style>
    .menu .icon {
  display: none;
}
@media screen and (max-width: 768px) {
  .menu a:not(:first-child) {display: none;}
  .menu a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 768px) {
  .menu.responsive {position: relative;
  background: #000000 !important;
    position: relative;
    top: 0;
    /* padding: 10px 10px; */
    margin-top: 3%;
    display: block;
  }
  .menu.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .menu.responsive a {
    float: none;
    display: block;
    text-align: left;
    
    
  }
}

</style>
<body>
    <!-- Navbar Section Starts Here -->
    <section class=" navv ftco-navbar-light" >
        <div class="container">
            <!-- <div class="logo">
                <a href="index.php" title="Logo">
                    <img src="images/logo_transparent1.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div> -->

            <div class="menu" id="myTopnav" style="overflow: hidden;  ">
            
                <a class="" href="index.php" title="Logo">
                    <img src="images/logo_transparent11.jpg" alt="Restaurant Logo" class="logo ">
                </a>
              
                    
                        <a href="index.php">Home</a>

                        <a href="music.php">Music</a>
                    
                    
                        <a href="categories.php">Categories</a>
                    
                        <a href="foods.php">Foods</a>
                    
                        <a href="match.php">Table</a>
                    
                        <a href="list_order.php">Order</a>
                   
                        <a href="paymenttest.php">Payment</a>
                  
                        <a href="logout.php">Logout</a>
                    
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                    </a>
                
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "menu") {
    x.className += " responsive";
  } else {
    x.className = "menu";
  }
}
</script>