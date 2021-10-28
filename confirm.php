<?php
session_start();
    //check login
    if($_SESSION['full_name'] == '')
    {
        header("Location: login.php");
    }
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

<section class="food-search" style="background-image: url(images/111.png); background-attachment: fixed; ">
<div class="overlay" ></div>
  <div class="container " style="padding: 6% 0; position: relative;">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12">
        <h3 class="text-white">ยืนยันการสั่งซื้อ</h3>
        <form id="frmcart" name="frmcart" method="post" action="saveorder.php">
          <table class="table table-bordered table-hover table-striped" style="background-color: lavenderblush;">
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
            if (!empty($_SESSION['cart'])) {
              foreach ($_SESSION['cart'] as $id => $qty) {
                $sql = "SELECT * FROM tbl_food WHERE p_id=$id";
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
              echo "<td colspan='4' bgcolor='' align='center'><b>ราคารวม</b></td>";
              echo "<td align='right' bgcolor=''>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
              echo "<td align='left' bgcolor=''></td>";
              echo "</tr>";
            }
            ?>
          </table>
          <h3 class="text-white">รายละเอียด</h3>
          
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4" class="text-white">ชื่อ - นามสกุล</label>
                <input type="text" class="form-control" 
                 name="full_name" value="<?php echo $rowmember['full_name'];?>">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4" class="text-white">เบอร์โทร</label>
                <input type="text" class="form-control" id="inputEmail4" name="phone"
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
  </section>

</html>
<?php include('partials-front/footer.php'); ?>