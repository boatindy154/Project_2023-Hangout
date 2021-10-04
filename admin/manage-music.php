<?php include('partials/menu.php'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


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
                    <th>Type</th>
                    <th>Qty.</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Customer Name</th>
                    <th>Actions</th>
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
                            <td><?php echo $type; ?></td>
                            <td><?php echo $qty; ?></td>
                            <td><?php echo $music_date; ?></td>
                            <!-- <td><?php echo $status; ?></td> -->

                            <td>
                                <?php
                                // Ordered, On Delivery, Delivered, Cancelled

                                if ($status == "finish") {
                                    echo "<label>$status</label>";
                                } elseif ($status == "playing") {
                                    echo "<label style='color: orange;'>$status</label>";
                                } elseif ($status == "Cancelled") {
                                    echo "<label style='color: red;'>$status</label>";
                                }
                                ?>
                            </td>

                            <td><?php echo $customer_name; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-music.php?id=<?php echo $id; ?>" class="btn-secondary">Update Music</a>
                            </td>
                        </tr>

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