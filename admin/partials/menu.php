<?php 

    include('../config/constants.php'); 
    // include('login-check.php');

?>



    <head>
        <title>Food Order Website - Home Page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/style.css" type="text/css">
        <link rel="stylesheet" href="../css/admin.css">
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
        <!-- Menu Section Starts -->
        <section class=" navv ftco-navbar-light">
            <div class=" menu" id="myTopnav" style="overflow: hidden; place-content:center;">
                
                    <a href="index.php">Home</a>
                    <a href="manage-music.php">Music</a>
                    <!-- <li><a href="manage-admin.php">Admin</a></li> -->
                    <a href="manage-category.php">Category</a>
                    <a href="manage-food.php">Food</a></li>
                    <a href="manage-ordertest.php">Order</a>
                    <a href="logout.php">Logout</a>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                    </a>
            </div>
            <div class="clearfix"></div>
        </section>
        <!-- Menu Section Ends -->
        <script>
function myFunction() {
  var y = document.getElementById("myTopnav");
  if (y.className === "menu") {
    y.className += " responsive";
  } else {
    y.className = "menu";
  }
}
</script>