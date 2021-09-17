<?php 
include ('config/constants.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="backgroundcolor navv" >
        <div class="container">
            <div class="logo">
                <a href="index.php" title="Logo">
                    <img src="images/logo_transparent.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="music.php">Music</a>
                    </li>
                    <li>
                        <a href="categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="list_order.php">Order</a>
                    </li>
                    <li>
                        <a href="paymenttest.php">Payment</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>