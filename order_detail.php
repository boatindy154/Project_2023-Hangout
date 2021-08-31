<?php include('partials-front/menu.php'); 
session_start();
include 'config/constantss.php';

$o_id = $_GET['o_id'];

$querycartdetail = "SELECT d.*, p.image_name, p.title, p.price, h.*
FROM order_detail as d 
INNER JOIN order_head as h ON d.o_id = h.o_id
INNER JOIN tbl_food as p ON d.p_id = p.p_id
WHERE d.o_id=$o_id
AND h.m_id=$m_id";
$result = mysqli_query($conn, $querycartdetail);
$rowdetail = mysqli_fetch_array($result);
// echo '<pre>';
//     print_r($rowdetail);
// echo '</pre>';
?>
  <!-- Link our CSS file -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" href="css/style.css">
  <!-- *********************************************************** -->
<div class="container ">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <h3>Order</h3>
            <h4>
                OrderID : <?php echo $rowdetail['o_id']; ?><br>
                วัน/เวลา : <?php echo $rowdetail['dttm']; ?><br>
            </h4>
            <table class="table table-bordered table-hover table-striped">
                <tr>
                    <th width="5%" bgcolor="#EAEAEA">#</td>
                    <th width="10%" bgcolor="#EAEAEA">img</td>
                    <th width="55%" bgcolor="#EAEAEA">สินค้า</td>
                    <th width="10%" align="center" bgcolor="#EAEAEA">ราคา</td>
                    <th width="10%" align="center" bgcolor="#EAEAEA">จำนวน</td>
                    <th width="5%" align="center" bgcolor="#EAEAEA">รวม</td>
                </tr>


                <?php
                       

                $total = 0;
                    foreach($result as $row){
                        $total += $row["d_subtotal"]; //ราคารวมทั้งออเดอร์
                        echo "<tr>";
                        echo "<td >" . @$i += 1 . "</td>";
                        echo "<td>" . "<img src='images/food/" . $row['image_name'] . "' width='100px'>" . "</td>";
                        echo "<td >" . $row["title"] . "</td>";
                        echo "<td align='right' >" . number_format($row["price"], 2) . "</td>";
                        echo "<td align='right' >" . number_format($row["d_qty"], 2) . "</td>";
                        echo "<td align='right' >" . number_format($row["d_subtotal"], 2) . "</td>";
                        echo "</tr>";
                    }//closeforeach

                    echo "<tr>";
                    echo "<td colspan='4' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
                    echo "<td align='right' bgcolor='#CEE7FF'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
                    echo "<td align='left' bgcolor='#CEE7FF'></td>";
                    echo "</tr>";
                
                ?>
            </table>
        </div>
    </div>
</div>