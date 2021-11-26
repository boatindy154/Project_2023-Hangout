<?php include('partials-front/menu.php');
session_start();

$userlevel = $_SESSION['userlevel'];

if ($userlevel != 'M') {
    Header("Location: form_login.php");
} ?>

<style>
        a:hover {
      color: #ff7b00;
      text-decoration: none;
    }
    .food-menu-boxx {
    width: 48%;
    margin: 1%;
    padding: 2%;
    float: left;
    background-color: white;
    border-radius: 15px;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center " style="background-image: url(images/111.png); background-attachment: fixed;">
    <div class="overlay"></div>
    <div class="container">
        <?php

        //Get the Search Keyword
        // $search = $_POST['search'];
        $search = mysqli_real_escape_string($conn, $_POST['search']);

        ?>


        <h2 style="padding-top: 7%;">Foods on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

    </div>

    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu" style="position: relative;">
        <div class="container" style="padding: 6% 0;">
            <h2 class="text-center">Food Menu</h2>

            <?php

            //SQL Query to Get foods based on search keyword
            //$search = burger '; DROP database name;
            // "SELECT * FROM tbl_food WHERE title LIKE '%burger'%' OR description LIKE '%burger%'";
            $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Count Rows
            $count = mysqli_num_rows($res);

            //Check whether food available of not
            if ($count > 0) {
                //Food Available
                while ($row = mysqli_fetch_assoc($res)) {
                    //Get the details
                    $id = $row['p_id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
            ?>

                    <div class="food-menu-boxx">
                        <div class="food-menu-img">
                            <?php
                            // Check whether image name is available or not
                            if ($image_name == "") {
                                //Image not Available
                                echo "<div class='error'>Image not Available.</div>";
                            } else {
                                //Image Available
                            ?>
                                <img src="images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            <?php

                            }
                            ?>

                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">$<?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>

                            <a href="#" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>

            <?php
                }
            } else {
                //Food Not Available
                echo "<div class='error'>Food not found.</div>";
            }

            ?>



            <div class="clearfix"></div>



        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>