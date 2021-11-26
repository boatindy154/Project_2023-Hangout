<?php include('partials/menu.php'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    a{
        color: white;
        
    }
    a:hover {
    color: #ff7b00;
    text-decoration: none;
}
</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<section class="bg food-search" style="background-image: url(../images/111.png); background-attachment: fixed;">
<div class="overlay" style="padding-bottom: 50%;"></div>
    <div class="main-content1" style="position: relative;">
        <div class="wrapper">
            <h1 class="text-white">Manage Music</h1>

            <br /><br /><br />

            <?php
            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            ?>
            <br><br>

            <table class="table table-bordered table-hover table-striped" style="background-color: lavenderblush;">
                <tr>
                    <th>S.N.</th>
                    <th>Song</th>
                    <!-- <th>Type</th> -->
                    <!-- <th>Qty.</th> -->
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Customer Name</th>
                    <th>Update</th>
                    <!-- <th>Actions</th> -->
                </tr>

                <?php
                //Get all the orders from database
                $sql = "SELECT * FROM tbl_music ORDER BY id DESC"; // DIsplay the Latest Order at First
                //Execute Query
                $res = mysqli_query($conn, $sql);
                //Count the Rows
                $count = mysqli_num_rows($res);

                $sn = 1; //Create a Serial Number and set its initail value as 1

                if ($count > 0) {
                    //Order Available
                    while ($row = mysqli_fetch_assoc($res)) {
                        //Get all the order details
                        $id = $row['id'];
                        $song = $row['song'];
                        $type = $row['type'];
                        $qty = $row['qty'];
                        $music_date = $row['music_date'];
                        $status = $row['status'];
                        $customer_name = $row['customer_name'];

                ?>

                        <tr>
                            <td><?php echo $sn++; ?>. </td>
                            <td><?php echo $song; ?></td>
 
                            <td><?php echo $music_date; ?></td>
                            <!-- <td><?php echo $status; ?></td> -->

                            <td>
                                <?php
                                // Ordered, On Delivery, Delivered, Cancelled
                             
                                if ($status == "1") {
                                    echo "<font color = 'blue'>";
                                    echo 'Playing';
                                } elseif ($status == "2") {
                                    echo "<font color = '#3cb329'>";
                                    echo 'Played';
                                } elseif ($status == "3") {
                                    echo "<font color = 'red'>";
                                    echo 'ยกเลิก';
                                }
                                
                            echo '</td>';

                            echo '<td>'; 
                            echo $customer_name; 
                            echo '</td>';
                            if($status ==2){
                                
                            }else{
                                echo "<td colspan=6 align='center'>";
                            echo "<a href='?action=update&id=$id 'class='btn btn-info'>Update</a>";
                        
                            }
                            echo '</tr>';
                                ?>
                        <?php if(isset($_GET['action']) && $_GET['action'] == 'update'){
                        $id = $_GET['id'];
                $sql1 = "SELECT * FROM tbl_music
                        WHERE  id = $id "; 
                $res3 = mysqli_query($conn, $sql1);
                $sql2 = "UPDATE tbl_music SET 
                        status = 2
                        WHERE id = $id";
                $res1 = mysqli_query($conn, $sql2);
                if($res1){
                    echo "<script>";
                    echo "Swal.fire({
                        icon: 'success',
                        title: 'Update Music',
                        text: 'ลูกค้าชำระเงินเสร็จสิ้น',
                        showConfirmButton: false,
                        timer: 3000
                      }).then((result) => {
                        if (result.isDismissed) {
                            window.location.href = 'manage-music.php';
                        }
                      });";

                    echo "</script>";
                }
            } ?>
                <?php

                    }
                } else {
                    //Order not Available
                    echo "<tr><td colspan='12' class='error'>Music not Available</td></tr>";
                }
                ?>


            </table>
        </div>

    </div>
</section>
<?php include('partials/footer.php'); ?>