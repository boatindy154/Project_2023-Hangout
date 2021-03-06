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
<section class="bg food-search" style="background-image: url(../images/111.png); background-attachment: fixed;">
<div class="overlay" ></div>
    <div class="main-content1" style="position: relative;">
        <div class="wrapper">
            <h1 class="text-white">Manage Order</h1>

            <br /><br /><br />

            <?php
            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);

            if (isset($_SESSION['delete'])) {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
            }
            ?>
            <br><br>
            <form action="?act=update" method="post" >
            <table class="table table-bordered table-hover table-striped" style="background-color: lavenderblush;">
                <tr>
                    <th>S.N.</th>
                    <th>M_ID</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Customer Name</th>
                    <th>Phone</th>
                    <!-- <th>Email</th> -->
                    <th>Actions</th>
                </tr>

                <?php
                //Get all the orders from database
                $sql = "SELECT * FROM order_head ORDER BY dttm ASC"; // DIsplay the Latest Order at First
                //Execute Query
                $res = mysqli_query($conn, $sql);
                //Count the Rows
                $count = mysqli_num_rows($res);

                $sn = 1; //Create a Serial Number and set its initail value as 1

                if ($count > 0) {
                    //Order Available
                    while ($row = mysqli_fetch_assoc($res)) {
                        //Get all the order details
                        $o_id = $row['o_id'];
                        $m_id = $row['m_id'];
                        $total = $row['total'];
                        $dttm = $row['dttm'];
                        $status = $row['status'];
                        $full_name = $row['full_name'];
                        $phone = $row['phone'];
                        $email = $row['email'];


                ?>

                        <tr>
                            <td><?php echo $sn++; ?>. </td>
                            <td><?php echo $m_id; ?></td>
                            <td><?php echo number_format($row['total'], 2) ?></td>
                            <td><?php echo $dttm; ?></td>

                            <td>
                                <?php
                                // Ordered, On Delivery, Delivered, Cancelled

                                if ($status == "1") {
                                    echo "<font color = 'blue'>";
                                    echo '??????????????????????????????';
                                } elseif ($status == "2") {
                                    echo "<font color = '#3cb329'>";
                                    echo '????????????????????????????????????';
                                } elseif ($status == "3") {
                                    echo "<font color = 'red'>";
                                    echo '??????????????????';
                                }
                                ?>
                            </td>

                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $phone; ?></td>
                            
                            <td>
                                <a href="update-ordertest.php?o_id=<?php echo $o_id; ?>&do=watch" class="btn-secondary">Update Order</a>
                            </td>
                        </tr>

                <?php

                    }
                } else {
                    //Order not Available
                    echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                }
                ?>


            </table>
            </form>
        </div>

    </div>
    <br><br><br><br><br>
</section>

<?php include('partials/footer.php'); ?>