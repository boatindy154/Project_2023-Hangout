<?php
session_start();
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

$m_id = $_SESSION['id'];
// echo $m_id;

include 'config/constantss.php';

$qmember = "SELECT full_name, email, phone FROM tbl_admin WHERE id = $m_id";
$rsmember = mysqli_query($conn , $qmember) or die ("Error in query $qmember" );
$rowmember = mysqli_fetch_array($rsmember);

// echo '<pre>';
// print_r($rowmember);
// echo '</pre>';

?>
<?php include('partials-front/menu.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Link our CSS file -->
  <link rel="stylesheet" href="css/style.css">
  <title>Shopping Cart</title>
</head>

<body>
  <div class="container ">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12">
        <h3>ยืนยันการสั่งซื้อ</h3>
        <form id="frmcart" name="frmcart" method="post" action="saveorder.php">
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
            if (!empty($_SESSION['cart'])) {
              foreach ($_SESSION['cart'] as $id => $qty) {
                $sql = "SELECT * FROM tbl_food WHERE id=$id";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($query);
                $sum = $row['price'] * $qty;
                $total += $sum;
                echo "<tr>";
                echo "<td >" . @$i += 1 . "</td>";
                echo "<td>" . "<img src='images/food/" . $row['image_name'] . "' width='100px'>" . "</td>";
                echo "<td >" . $row["title"] . "</td>";
                echo "<td align='right' >" . number_format($row["price"], 2) . "</td>";
                echo "<td  align='right'>";
                echo "<input type='number' name='amount[$id]' value='$qty' class='form-control' readonly  size='2'/></td>";
                echo "<td  align='right'>" . number_format($sum, 2) . "</td>";
                echo "</tr>";
              } //closeforeach

              echo "<tr>";
              echo "<td colspan='4' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
              echo "<td align='right' bgcolor='#CEE7FF'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
              echo "<td align='left' bgcolor='#CEE7FF'></td>";
              echo "</tr>";
            }
            ?>
            <tr>

              <td colspan="6" align="right">
                <input type="hidden" name="m_id" value="<?php echo $m_id; ?>">
                <input type="hidden" name="total" value="<?php echo $total; ?>">
                <input type="submit" class="btn btn-primary" value="ยืนยันการสั่ง">
              </td>
            </tr>
          </table>
          <h3>รายละเอียด</h3>
          
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">ชื่อ - นามสกุล</label>
                <input type="email" class="form-control" id="inputEmail4"
                 name="full_name" value="<?php echo $rowmember['full_name'];?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" name="email"
                name="full_name" value="<?php echo $rowmember['email'];?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">เบอร์โทร</label>
                <input type="email" class="form-control" id="inputEmail4" name="phone"
                name="full_name" value="<?php echo $rowmember['phone'];?>">
              </div>
            </div>
            <input type="hidden" name="m_id" value="<?php echo $m_id; ?>">
            <input type="hidden" name="total" value="<?php echo $total; ?>">
            <button type="submit" class="btn btn-primary">ยืนยันการสั่ง</button>
          
        </form>
      </div>
    </div>
  </div>
</body>

</html>