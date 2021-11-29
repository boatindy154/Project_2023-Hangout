
<?php include('partials/menu.php'); 
session_start();
// $userlevel = $_SESSION['userlevel'];
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
    a {
      color: white;

    }
a:hover {
      color: #ff7b00;
      text-decoration: none;
    }
    .main-content1 {
    padding: 6% 0;
}
@media screen and (max-width: 768px) {
.col-4 {
    width: 44%;
    background-color: white;
    margin: 1%;
    padding: 2%;
    float: left;
}
}
</style>
        <!-- Main Content Section Starts -->
        <section class=" food-search " style="background-image: url(../images/111.png); background-attachment: fixed; ">
        <div class="overlay "></div>
        <div class="main-content1 container " style="position: relative;">
        <h1 class="text-white">Dashboard</h1>

            <div class="">
                <br><br>
                <?php 
                
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br><br>

                <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql = "SELECT * FROM tbl_category";
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count Rows
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Categories
                </div>

                <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql2 = "SELECT * FROM tbl_food";
                        //Execute Query
                        $res2 = mysqli_query($conn, $sql2);
                        //Count Rows
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Foods
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        //Sql Query 
                        $sql3 = "SELECT * FROM order_head";
                        //Execute Query
                        $res3 = mysqli_query($conn, $sql3);
                        //Count Rows
                        $count3 = mysqli_num_rows($res3);
                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br />
                    Total Orders
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        //Creat SQL Query to Get Total Revenue Generated
                        //Aggregate Function in SQL
                        $sql4 = "SELECT SUM(total) AS Total FROM order_head";

                        //Execute the Query
                        $res4 = mysqli_query($conn, $sql4);

                        //Get the VAlue
                        $row4 = mysqli_fetch_assoc($res4);
                        
                        //GEt the Total REvenue
                        $total_revenue = $row4['Total'];

                    ?>

                    <h1>$<?php echo $total_revenue; ?></h1>
                    <br />
                    Revenue Generated
                </div>

                <div class="clearfix"></div>
<br><br><br><br><br><br><br><br><br><br>
            </div>
        </div>
        <!-- Main Content Setion Ends -->
        </section>

<?php include('partials/footer.php') ?>