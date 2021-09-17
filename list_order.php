<?php include('partials-front/menu.php');
session_start();
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
$m_id = $_SESSION['id'];
$queryorder = "SELECT * FROM order_head WHERE m_id=$m_id";
$rsorder = mysqli_query($conn, $queryorder);
// echo $queryorder;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<section class="food-search">
    <div class="container " style="padding: 6% 0;">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <h2>Order List</h3>
                    <form id="frmcart" name="frmcart" method="post" action="?act=update">
                        <table class="table table-bordered table-hover table-striped" style="background-color: lavenderblush;">
                            <thead>
                                <tr>
                                    <th width="5%" bgcolor="">#</td>
                                    <th width="10%" bgcolor="">status</td>
                                    <th width="10%" bgcolor="">date</td>
                                    <th width="10%" align="center" bgcolor="">
                                        <center>total</center>
                                        </td>
                                    <th width="10%" align="center" bgcolor="">view</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rsorder as $row) { ?>
                                    <tr>
                                        <td><?php echo $row['o_id']; ?></td>
                                        <td>
                                            <?php
                                            $st = $row['status'];
                                            if ($st == 1) {
                                                echo "<font color = 'blue'>";
                                                echo 'รอชำระเงิน';
                                            } elseif ($st == 2) {
                                                echo "<font color = '#3cb329'>";
                                                echo 'ชำระเงินแล้ว';
                                            } elseif ($st == 3) {
                                                echo "<font color = 'red'>";
                                                echo 'ยกเลิก';
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $row['dttm']; ?></td>
                                        <td align="right"><?php echo number_format($row['total'], 2); ?></td>
                                        <td>
                                        <?php
                                            $o_id = $row['o_id']; // order id
                                            if ($st == 1) {
                                                echo "<a href='order_detail.php?o_id=$o_id&do=payment' class='btn btn-primary btn-xs'>
                                                View </a>";
                                            } elseif ($st == 2) {
                                                echo "<a href='#' class='btn btn-success btn-xs'>
                                                ชำระเงินแล้ว </a>";
                                            } elseif ($st == 3) {
                                                echo "<a href='#' class='btn btn-danger btn-xs'>
                                                ยกเลิก </a>";
                                            }
                                            ?>




                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </form>
            </div>
        </div>
    </div>
</section>

</html>







<?php include('partials-front/footer.php'); ?>