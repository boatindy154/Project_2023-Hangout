<?php include('partials-front/menu.php'); 


$music = "SELECT * FROM tbl_music ";
$rsmusic = mysqli_query($conn, $music);


?>

<!-- music sEARCH Section Starts Here -->
<section class=" food-search text-center">
        <div class="container " style="padding: 6% 0;">
            
            <form action="" method="POST">
                <input type="search" name="search" placeholder="Request for Music.." required>
                <input type="submit" name="submit" value="Request" class="btn btn-primary">
            </form>
            </div>
             <!-- music sEARCH Section Ends Here -->
        <div class="container food-menu">
            <h2 class="text-center">Music</h2>
            <?php foreach ($rsmusic as $row) { ?>
                <div class="food-menu-box ">
            <div class="food-menu-desc" style="margin-left: 14%;">
                            <h4><?php echo $row['music_date']; ?></h4>
                            <p class="food-price"><?php echo $row['song']; ?></p>
                            <p class="food-detail">
                                <?php echo $row['customer_name']; ?>
                            </p>
                            <br>
                        </div>
                    </div>
                    <?php } ?>
            </div>

        </div>
        <div class="clearfix"></div>
</section>




































<?php include('partials-front/footer.php'); ?>