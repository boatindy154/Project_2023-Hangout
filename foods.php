    <?php
    session_start();
    include('partials-front/menu.php'); 
    $userlevel = $_SESSION['userlevel'];
     
     if($userlevel!='M'){
         Header("Location: form_login.php");
     }?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

<style>
    a {
      color: white;

    }
        a:hover {
      color: #ff7b00;
      text-decoration: none;
    }
    .food-menu-box {
    width: 48%;
    margin: 1%;
    padding: 2%;
    float: left;
    background-color: white;
    border-radius: 15px;
}
    .food-menu-desc {
    width: 70%;
    float: left;
    margin-left: 8%;
}
.btn {
    padding: 1%;
    border: none;
    font-size: 1rem;
    border-radius: 5px;
}
        .btn-primary {
    background-color: #ff6b81;
    color: white;
    cursor: pointer;
    vertical-align: top;
}
.btn-primary:hover{
    color: white;
    background-color: #ff4757;

}
.img-responsivee {
        width: 100%;
    }
@media only screen and (max-width:576px){
    .img-responsivee {
        width: 167%;
    }
}
</style>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center bg" style="background-image: url(images/111.png); background-attachment: fixed;">
    <div class="overlay" ></div>
        <div class="container" style="padding: 6% 0; position: relative; ">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
 
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
        <div class="container food-menu" style="position: relative; width:79%">
            <h2 class="text-center" style="color: white;">Food Menu</h2>

            <?php 
                //Display Foods that are Active
                $sql = "SELECT * FROM tbl_food WHERE active='Yes'";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the foods are availalable or not
                if($count>0)
                {
                    //Foods Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $p_id = $row['p_id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php 
                                    //CHeck whether image available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsivee img-curve">
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

                                <a href="cart.php?id=<?php echo $row['p_id']; ?>&act=add" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //Food not Available
                    echo "<div class='error'>Food not found.</div>";
                }
            ?>

            

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>