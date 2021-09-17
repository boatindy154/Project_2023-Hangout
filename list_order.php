<?php include('partials-front/menu.php');
session_start();
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
$m_id = $_SESSION['id'];
$queryorder = "SELECT * FROM order_head WHERE m_id=$m_id";
$rsorder = mysqli_query($conn, $queryorder);
echo $queryorder;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<section class="food-search">
    <div class="container " style="padding: 6% 0;">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <h2>Cart</h3>
                    <form id="frmcart" name="frmcart" method="post" action="?act=update">
                        <table class="table table-bordered table-hover table-striped" style="background-color: lavenderblush;">
                            <thead>
                                <tr>
                                    <th width="5%" bgcolor="">#</td>
                                    <th width="10%" bgcolor="">status</td>
                                    <th width="10%" bgcolor="">date</td>
                                    <th width="10%" align="center" bgcolor=""><center>total</center></td>
                                    <th width="10%" align="center" bgcolor="">view</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($rsorder as $row){ ?>
                                <tr>
                                    <td><?php echo $row['o_id'];?></td>
                                    <td><?php echo $row['status'];?></td>
                                    <td><?php echo $row['dttm'];?></td>
                                    <td align="right"><?php echo number_format($row['total'],2);?></td>
                                    <td>view</td>
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