<?php
//connect database
$condb= mysqli_connect("localhost","root","","food-order") or die("Error: " . mysqli_error($condb));
mysqli_query($condb, "SET NAMES 'utf8' ");
//query
$query = "SELECT * FROM tbl_table ORDER BY id ASC";
$result = mysqli_query($condb, $query);
?>
<?php include('partials-front/menu.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>รายชื่อโต๊ะจากฐานข้อมูล </title>
    <style type="text/css">
    .bg{
    background-color: #ffffff;
    }
    </style>
  </head>
    <section class="food-search">
    <div class="container " style="padding: 6% 0;">
      <div class="row">
        <div class="col-sm-2 col-md-2" style="padding-left: 20%;"></div>
        <div class="col-12 col-sm-11 col-md-7 bg" style="margin-top: 50px;">
          <br>
          <h4 align="center" style="color: red;">รายชื่อโต๊ะจากฐานข้อมูล</h4>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <div class="alert alert-warning" role="alert">
                <center>Tables</center>
              </div>
              <hr>
              <div class="row" style="margin-bottom: 20px;">
                <?php foreach ($result as  $row) {
                  if($row['table_status']==1){
                    echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                  echo '<a href="booking.php?id='.$row["id"].'&act=booking"class="btn btn-success" target="_blank">'.$row['table_name'].'</a></div>';
                    }else{
                      echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                    echo '<a href="index.php?id='.$row["id"].'&act=booking-detail" class="btn btn-secondary" target="_blank">'.$row['table_name'].'</a></div>';
                      }
                    } ?>
                  </div>
                  <p>*เขียว = ว่าง, เทา = ไม่ว่าง</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
    </section>
    </html>