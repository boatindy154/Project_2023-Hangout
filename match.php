<?php
session_start();
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
  $url = "https://";
} else {
  $url = "http://";
  $url .= $_SERVER['HTTP_HOST'];
  $url .= $_SERVER['REQUEST_URI'];
  $url;
}
$page = $url;
$sec = "10";


$userlevel = $_SESSION['userlevel'];

if ($userlevel != 'M') {
  Header("Location: form_login.php");
}

//connect database
$condb = mysqli_connect("localhost", "root", "", "food-order") or die("Error: " . mysqli_error($condb));
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
  <meta http-equiv="refresh" content="<?php echo $sec; ?>" URL="
      <?php echo $page; ?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/picnic">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>รายชื่อโต๊ะจากฐานข้อมูล </title>
  <style type="text/css">
    a {
      color: white;

    }

    a:hover {
      color: #ff7b00;
      text-decoration: none;
    }

    .bg {
      background-color: #ffffff;
    }

    .btn-success {
      color: #fff;
      background-color: #28a745;
      border-color: #28a745;
    }

    .btn {
      display: inline-block;
      font-weight: 400;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      border: 1px solid transparent;
      padding: .375rem .75rem;
      font-size: 1rem;
      line-height: 1.5;
      border-radius: .25rem;
      transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    .modal {
      position: fixed;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      z-index: 1050;
      display: flex;
      overflow: hidden;
      outline: 0;
    }

    @media (min-width: 1200px) {
      .container {
        max-width: 1140px;
      }
    }
  </style>
</head>
<section class="food-search" style="background-image: url(images/111.png); background-attachment: fixed;">
  <div class="overlay"></div>
  <div class="container " style="padding: 6% 0;">
    <div class="row">
      <div class="col-sm-2 col-md-2" style="padding-left: 20%;"></div>
      <div class="col-12 col-sm-11 col-md-7 bg" style="margin-top: 50px;">
        <br>
        <h4 align="center" style="color: red;">รายชื่อโต๊ะ</h4>
        <br>
        <div class="row">
          <div class="col-sm-12 col-md-12">
            <div class="alert alert-warning" role="alert">
              <center>Tables</center>
            </div>
            <hr>
            <div class="row" style="margin-bottom: 20px; padding-left:10%; margin-right: -15px;
    margin-left: -15px;">
              <?php foreach ($result as  $row) { 
                if($row['table_match'] == 1){

                echo ' <label for="modal_1" class="button">Show modal</label>
                <div class="modal" style="position: relative;">
                  <input id="modal_1" type="checkbox" />
                  <label for="modal_1" class="overlay"></label>
                  <article>
                    <header>
                      <h3>ชนแก้ว !!</h3>
                      <label for="modal_1" class="close">&times;</label>
                    </header>
                    <section class="content">
                      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; คุณต้องการชนแก้วกับโต๊ะ '.$row["table_nummatch"].' หรือไม่ ? &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    </section>
                    <footer>
                      <input type="hidden" name="id" value="<?php echo $table_number; ?>">
                      <input type="submit" name="submit" value="Yes">
                      <label for="modal_1" class="button dangerous">
                        Cancel
                      </label>
                    </footer>
                  </article>
                </div>';
                }else{
                  
                }
                ?>
              <?php if ($row['table_status'] == 1) {

                  echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                  echo '<a  href="match_update.php?id=' . $row["id"] . '&table=' . $row["table_number"] . '"class="btn btn-success" ">' . $row['table_name'] . '</a></div>';
                } else if ($row['table_status'] == 0) {
                  echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                  echo '<a href="index.php?id=' . $row["id"] . '&act=booking-detail" class="btn btn-secondary" target="_blank">' . $row['table_name'] . '</a></div>';
                }
              } ?>
            </div>
            <p>*เขียว = ว่าง, เทา = ไม่ว่าง</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</html>
<?php include('partials-front/footer.php'); ?>
<script>
  function myFunction() {
    var r = confirm("ยืนยันการสั่ง");
    if (r == true) {
      window.location = 'match_update.php';
    } else {
      window.location = 'match.php';
    }
  }
</script>