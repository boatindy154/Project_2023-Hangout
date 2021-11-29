<?php include('partials-front/menu.php');
session_start();
$m_id = $_SESSION['id'];
$full_name = $_SESSION['full_name'];
$userlevel = $_SESSION['userlevel'];
include 'config/constantss.php';

$o_id = $_GET['o_id'];

$querycartdetail = "SELECT d.*, p.image_name, p.title, p.price, h.*
FROM order_detail as d 
INNER JOIN order_head as h ON d.o_id = h.o_id
INNER JOIN tbl_food as p ON d.p_id = p.p_id
WHERE d.o_id=$o_id
AND h.m_id=$m_id";
$rscartdetail = mysqli_query($conn, $querycartdetail);
$rowdetail = mysqli_fetch_array($rscartdetail);
// echo '<pre>';
//     print_r($rowdetail);
// echo '</pre>';
?>
<!-- Link our CSS file -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel="stylesheet" href="css/style.css">
<style>
    a{
        color: white;
        
    }
    a:hover {
    color: #ff7b00;
    text-decoration: none;
}
</style>
<!-- *********************************************************** -->
<body >
    <section class="food-search" style="background-image: url(images/111.png); background-attachment: fixed; ">
    <div class="overlay" ></div>
<div class="container" style="padding: 6% 0;">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 ">
            <h2 class="text-white">Order</h2>
            <h4 class="text-white">
                OrderID : <?php echo $rowdetail['o_id']; ?><br>
                วัน/เวลา : <?php echo $rowdetail['dttm']; ?><br>
                Status : <?php if ($rowdetail['status'] == "1") {
                                    echo "<font color = 'blue'>";
                                    echo 'กำลังทำอาหาร';
                                } elseif ($rowdetail['status'] == "2") {
                                    echo "<font color = '#3cb329'>";
                                    echo 'เรียกชำระเงิน';
                                } elseif ($rowdetail['status'] == "3") {
                                    echo "<font color = 'red'>";
                                    echo 'ชำระเงินแล้ว';
                                }
                                ?> 
            </h4>
            <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="background-color: lavenderblush; color:black">
                <tr>
                    <th width="5%" bgcolor="">#</td>
                    <th width="10%" bgcolor="">img</td>
                    <th width="55%" bgcolor="">สินค้า</td>
                    <th width="10%" align="center" bgcolor="">ราคา</td>
                    <th width="10%" align="center" bgcolor="">จำนวน</td>
                    <th width="5%" align="center" bgcolor="">รวม</td>
                </tr>


                <?php


                $total = 0;
                foreach ($rscartdetail as $row) {
                    $total += $row["d_subtotal"]; //ราคารวมทั้งออเดอร์
                    echo "<tr>";
                    echo "<td >" . @$i += 1 . "</td>";
                    echo "<td>" . "<img src='images/food/" . $row['image_name'] . "' width='100px'>" . "</td>";
                    echo "<td >" . $row["title"] . "</td>";
                    echo "<td align='right' >" . number_format($row["price"], 2) . "</td>";
                    echo "<td align='right' >" . number_format($row["d_qty"], ) . "</td>";
                    echo "<td align='right' >" . number_format($row["d_subtotal"], 2) . "</td>";
                    echo "</tr>";
                } //closeforeach

                echo "<tr>";
                echo "<td colspan='4' bgcolor='' align='center'><b>ราคารวม</b></td>";
                echo "<td align='right' bgcolor=''>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
                echo "<td align='left' bgcolor=''></td>";
                echo "</tr>";

                ?>
            </table>
            </div>
        </div>
    </div>
</div>
</section>
</body>

<?php include('partials-front/footer.php'); ?>