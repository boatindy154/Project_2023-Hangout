<?php include('partials-front/menu.php'); 
session_start();
// echo '<pre>' ;
// print_r($_SESSION);
// echo '</pre>';
$userlevel = $_SESSION['userlevel'];
$id = $_SESSION['id'];
if($userlevel!='M'){
    Header("Location: form_login.php");
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <script src="jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<style>
    a{
        color: white;
        
    }
    a:hover {
    color: #ff7b00;
    text-decoration: none;
    }
    .container{
        width: 80%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }
        
</style>
<body>
    <!-- CAtegories Section Starts Here -->
    <section class="categories food-search bg"  style="background-image: url(images/111.png); background-attachment: fixed;">
    <div class="overlay"></div>
        <div class="container" style="padding: 6% 0; position: relative;">
            <h2 class="text-center text-white">Payment</h2>
            <?php if(isset($_GET['action']) && $_GET['action'] == 'payment'){
                $sql = "SELECT * FROM order_head
                        WHERE  m_id = $id "; 
                $res = mysqli_query($conn, $sql);
                $sql1 = "UPDATE order_head SET 
                        status = 2
                        WHERE status = 1";
                $res1 = mysqli_query($conn, $sql1);
                if($res1){
                    echo "<script>";
                    echo "Swal.fire({
                        icon: 'success',
                        title: 'ชำระเงิน',
                        text: 'รอสักครู่พนักงานจะไปชำระเงินที่โต๊ะของท่าน',
                        showConfirmButton: false,
                        timer: 5000
                      }).then((result) => {
                        if (result.isDismissed) {
                            window.location.href = 'index.php';
                        }
                      });";

                    echo "</script>";
                }
            } ?>
            <a href="?action=payment" >
                <div class="box-3 float-container ml20 text-center">
                    <img src="images/cash.png" alt="Pizza" class="img-responsive img-curve">
                </div>
            </a>
            <?php 

                
            
            
            ?>
            <a href="?action=payment">
                <div class="box-3 float-container text-center" >
                    <img src="images/qrcode.jfif" alt="Burger" class="img-responsive img-curve">

                    <!-- <h3 class="float-text text-white">พร้อมเพย์</h3> -->
                </div>
            </a>

            <!-- <a href="#">
                <div class="box-3 float-container">
                    <img src="images/credit card.png" alt="Burger" class="img-responsive img-curve" style="
    background-color: antiquewhite;">
                    <h3 class="float-text text-white">พร้อมเพย์</h3>
                </div>
            </a> -->




            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->




</body>
    <?php include('partials-front/footer.php'); ?>
    <!-- <script>
  
  swal({
  title: "กรุณารอสักครู่",
  text: "พนักงานกำลังเดินไปที่โต๊ะของท่าน",
  icon: "success",
  timer: 3000
});
</script> -->