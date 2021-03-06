    
    <?php
    session_start();
     include('partials-front/menu.php');
     $m_id = $_SESSION['id'];
     $full_name = $_SESSION['full_name'];
     $userlevel = $_SESSION['userlevel']; ?>

    <?php 
        //CHeck whether id is passed or not
        if(isset($_GET['category_id']))
        {
            //Category id is set and get the id
            $category_id = $_GET['category_id'];
            // Get the CAtegory Title Based on Category ID
            $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Get the value from Database
            $row = mysqli_fetch_assoc($res);
            //Get the TItle
            $category_title = $row['title'];
        }
        else
        {
            //CAtegory not passed
            //Redirect to Home page
            header('location:'.SITEURL);
        }
    ?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center " style="background-image: url(images/111.png); background-attachment: fixed;">
    <div class="overlay"></div>
        <div class="container" style="padding: 6% 0; position: relative;">
            
            <h2 style="color: gray;">Foods on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
        <div class="container food-menu " style="position: relative; width:79%">
            <h2 class="text-center" style="color: white;">Food Menu</h2>

            <?php 
            
                //Create SQL Query to Get foods based on Selected CAtegory
                $sql2 = "SELECT * FROM tbl_food WHERE category_id=$category_id";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //Count the Rows
                $count2 = mysqli_num_rows($res2);

                //CHeck whether food is available or not
                if($count2>0)
                {
                    //Food is Available
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        // $p_id = $row2['p_id'];
                        // $title = $row2['title'];
                        // $price = $row2['price'];
                        // $description = $row2['description'];
                        // $image_name = $row2['image_name'];
                        ?>
                        
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php 
                                    if($row2['image_name']=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="images/food/<?php echo $row2['image_name']; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $row2['title']; ?></h4>
                                <p class="food-price">$<?php echo $row2['price']; ?></p>
                                <p class="food-detail">
                                    <?php echo $row2['description']; ?>
                                </p>
                                <br>

                                <a href="cart.php?id=<?php echo $row2['p_id']; ?>&act=add" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //Food not available
                    echo "<div class='error'>Food not Available.</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>