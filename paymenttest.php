<?php include('partials-front/menu.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body >
    <!-- CAtegories Section Starts Here -->
    <section class="categories food-search bg">
        <div class="container" style="padding: 6% 0;">
            <h2 class="text-center">Payment</h2>

            <a href="category-foods.html">
                <div class="box-3 float-container">
                    <img src="images/cash.png" alt="Pizza" class="img-responsive img-curve">

                    <!-- <h3 class="float-text text-white">เงินสด</h3> -->
                </div>
            </a>

            <a href="#">
                <div class="box-3 float-container">
                    <img src="images/qrcode.jfif" alt="Burger" class="img-responsive img-curve">

                    <!-- <h3 class="float-text text-white">พร้อมเพย์</h3> -->
                </div>
            </a>

            <a href="#">
                <div class="box-3 float-container">
                    <img src="images/credit card.png" alt="Burger" class="img-responsive img-curve" style="
    background-color: antiquewhite;">
                    <!-- <h3 class="float-text text-white">พร้อมเพย์</h3> -->
                </div>
            </a>




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