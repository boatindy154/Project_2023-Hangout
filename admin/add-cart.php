<?php
     session_start();
        //check login
        // if($_SESSION['full_name'] == '')

    // echo '<pre>' ;
    // print_r($_SESSION);
    // echo '</pre>';

    include '../config/constantss.php';
    @$id = mysqli_real_escape_string($conn,$_GET['id']);
    $act = mysqli_real_escape_string($conn,$_GET['act']);

    #add to cart
    if($act=='add' && !empty($id))
    {
        if(isset($_SESSION['cart'][$id]))
        {
            $_SESSION['cart'][$id]++;
        }
        else
        {
            $_SESSION['cart'][$id]=1;
        }
    }
    #remove menu
    if($act=='remove' && !empty($id))
    {
        unset($_SESSION['cart'][$id]);
    }

    #update cart
    if($act=='update')
    {
        $amount_array = $_POST['amount'];
        foreach($amount_array as $id=>$amount)
        {
            $_SESSION['cart'][$id]=$amount;
        }
    }

    #cancel cart
    if($act=='cancel')
    {
        unset($_SESSION['cart']);
    }


?>

<?php include('partials/menu.php'); ?>
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
</head><style>
    a{
        color: white;
        
    }
    a:hover {
    color: #ff7b00;
    text-decoration: none;
}
.btn-primary {
    background-color: #ff6b81;
    color: white;
    cursor: pointer;
}
    .btn-primary:hover{
    color: white;
    background-color: #ff4757;

}
.btn-warning{
    background-color: #ff7f50;
    color: white;
    cursor: pointer;
}
.btn-warning:hover{
    color: white;
    background-color: #ff6348;
}
</style>
<section class="food-search" style="background-image: url(../images/111.png); background-attachment: fixed; ">
<div class="overlay" ></div>
    <div class="container " style="padding: 6% 0;">
        <div class="row">
        <h2 style="padding-left: 15px;">Cart</h3>
            <div class="col-12 col-sm-12 col-md-12 table-responsive">
                
                <form id="frmcart" name="frmcart"  method="post" action="?act=update">
                    <table class="table table-bordered table-hover table-striped" style="background-color: lavenderblush;">
                            <tr>
                            <th width="5%" bgcolor="">#</td>
                            <th width="10%" bgcolor="">img</td>
                            <th width="55%" bgcolor="">สินค้า</td>
                            <th width="10%" align="center" bgcolor="">ราคา</td>
                            <th width="10%" align="center" bgcolor="">จำนวน</td>
                            <th width="5%" align="center" bgcolor="">รวม</td>
                            <th width="5%" align="center" bgcolor="">ลบ</td>
                        </tr>

                        
                    <?php
                    $total=0;
                    if(!empty($_SESSION['cart']))
                    {
                        foreach($_SESSION['cart'] as $p_id=>$qty)
                        {
                            $sql = "SELECT * FROM tbl_food WHERE p_id=$p_id";
                            $query = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_array($query);
                            $sum = $row['price'] * $qty;
                            $total += $sum;
                            echo "<tr>";
                            echo "<td >" . @$i +=1 . "</td>";
                            echo "<td>"."<img src='../images/food/".$row['image_name']."' width='100px'>"."</td>";
                            echo "<td >" . $row["title"] . "</td>";
                            echo "<td align='right' >" .number_format($row["price"],2) . "</td>";
                                echo "<td  align='right'>";
                            echo "<input type='number' name='amount[$id]' value='$qty' class='form-control' min='1'  size='2'/></td>";
                                echo "<td  align='right'>" .number_format($sum,2) . "</td>";
                            #remove
                            echo "<td  align='center'><a href='cart.php?id=$id&act=remove' class='btn btn-primary btn-sm'>ลบ</a></td>";
                            echo "</tr>";
                        }
                        
                        echo "<tr>";
                            echo "<td colspan='5' bgcolor='' align='center'><b>ราคารวม</b></td>";
                            echo "<td align='right' bgcolor=''>"."<b>".number_format($total,2)."</b>"."</td>";
                            echo "<td align='left' bgcolor=''></td>";
                        echo "</tr>";
                    }
                    
                    if($total > 0)
                    {
                    ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class=text-center><a href="index.php" style="color: black;">กลับหน้ารายการสินค้า</a></td>
                            <td colspan="6" align="right">
                                <input type="button" class="btn btn-primary" name="btncancel" value="ยกเลิกการสั่ง" onclick="window.
                                    location='cart.php?act=cancel';"/>

                                <input type="submit" class="btn btn-warning" name="button" id="button" value="ปรับปรุง" />
                                <input type="button" class="btn btn-success" name="Submit2" value="สั่ง" onclick="window.
                                location='confirm.php';"/>
                            </td>
                        </tr>
                    <?php }else{
                        echo '<h3 align="center">*******ไม่มีสินค้า*******</h3>';
                    } ?>
                    </table>
                </form>
    </div>
        </div>
            </div>
</section>
</html>
<?php include('partials/footer.php'); ?>
