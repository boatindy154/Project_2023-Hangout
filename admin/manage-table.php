<?php
include('partials/menu.php');

session_start();



$table_number1 = $_SESSION['table_number'];
// $table_name = $_GET['$table_name'];
// echo '<pre>';
// print_r($table_name);
// echo '</pre>';
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

$userlevel = $_SESSION['userlevel'];

if ($userlevel != 'A') {
  Header("Location: form_login.php");
}

//connect database

//query
$query = "SELECT * FROM tbl_table ORDER BY id ASC";
$result = mysqli_query($conn, $query);


?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/picnic">
  <script src="jquery-3.3.1.min.js"></script>
  <script src="sweetalert2.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
    .pll-5, .px-5 {
    padding-left: 3rem;
}
    .mll-2, .mx-2 {
    margin-left: 0.5rem;
}
    @media (min-width: 1200px) {
      .container {
        max-width: 1140px;
      }
    }
    @media only screen and (max-width:768px){
    .pll-5{
        padding-left: 0%;
    }
    .mll-2{
        margin-left: 0%;
    }
  }
  </style>
</head>
<?php $sql8 = "SELECT * FROM tbl_table WHERE table_number = $table_number1";
              $result3 = mysqli_query($conn, $sql8);
              
                  while(($row2=mysqli_fetch_assoc($result3))){
                    if($row2['table_table'] == 2 ){ ?>
                      <script language="javascript" type="text/javascript">
                        Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'ชนแก้ว !!!!',
                                showConfirmButton: false,
                                timer: 5000
                              }).then((result) => {
                                if (result.isDismissed) {
                                    window.location.href = 'delete_match.php';
                                }
                              });
                      </script>
                  <?php  }
                    if($row2['table_table'] == 3 ){ ?>
                       <script language="javascript" type="text/javascript">
                        Swal.fire({
                                icon: 'error',
                                title: 'Sorry',
                                text: 'เสียใจด้วยนะ',
                                showConfirmButton: false,
                                timer: 5000
                              }).then((result) => {
                                if (result.isDismissed) {
                                    window.location.href = 'delete_match.php';
                                }
                              });
                      </script>
                   <?php }
                    if(isset($_GET['action']) && $_GET['action'] == 'match'){
                      $sql2 = "UPDATE tbl_table SET 
                      table_table=4
                      WHERE table_number ='$table_number1'";
                      $res = mysqli_query($conn, $sql2);
                      if($row2['table_table'] == 2 ){
                        echo "<script>";
                            echo "Swal.fire({
                                icon: 'success',
                                title: 'Success',
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
                      if($row2['table_table'] == 3 ){
                        echo "<script>";
                            echo "Swal.fire({
                                icon: 'error',
                                title: 'Success',
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
                    }
                    
                  }?>
<section class="food-search" style="background-image: url(../images/111.png); background-attachment: fixed;">
  <div  class="overlay"></div>
  <div class="container " style="padding: 6% 0;">
    <div class="row">
      <div class="col-sm-2 col-md-2" style="padding-left: 20%;"></div>
      <div class="col-12 col-sm-11 col-md-7 bg" >
        <br>
        <h4 align="center" style="color: red;">Status Table</h4>
        <?php 
              $sql3 = "SELECT * FROM tbl_table WHERE table_number = $table_number1";
              $result2 = mysqli_query($conn, $sql3);
              
                  while(($row1=mysqli_fetch_assoc($result2))){
                    // if($row1['table_table'] == 2 ){
                    //   echo "<script>";
                    //       echo "Swal.fire({
                    //           icon: 'success',
                    //           title: 'Success',
                    //           text: 'รอสักครู่พนักงานจะไปชำระเงินที่โต๊ะของท่าน',
                    //           showConfirmButton: false,
                    //           timer: 5000
                    //         }).then((result) => {
                    //           if (result.isDismissed) {
                    //               window.location.href = 'index.php';
                    //           }
                    //         });";
      
                    //       echo "</script>";
                    // }
                    if($row1['table_match']==1){
                    // $Message = $_GET['Message'];

                    //   echo "<script>";
                    // echo "Swal.fire({
                    //     icon: 'warning',
                    //     title: 'Are you sure?',
                    //     text: 'คุณต้องการชนแก้วกับโต๊ะ  หรือไม่ ?',
                    //     showConfirmButton: false,
                    //     confirmButtonColor: '#d33',
                    //     confirmButtonText: 'Yes'
                    //   }).then((result) => {
                    //     if (result.isConfirmed) {
                    //         window.location.href = 'match.php?action=confirm-match';
                    //     }else{
                    //         window.location.href = 'match.php
                    //     }
                    //   });";
                    // echo "</script>";

                      echo ' <label for="modal_1" class="button btn-danger">Matching!!!</label>
                    <div class="modal" style="position: relative;">
                      <input id="modal_1" type="checkbox" />
                      <label for="modal_1" class="overlay"></label>
                      <article>
                        <header>
                          <h3>ชนแก้ว !!</h3>
                          <label for="modal_1" class="close">&times;</label>
                        </header>
                        <section class="content">
                          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; คุณต้องการชนแก้วกับโต๊ะ ' . $row1['table_nummatch'] . ' หรือไม่ ? &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        </section>
                        <footer>
                        <form action="" method="POST">
                          <input type="hidden" name="id" value="<?php echo $table_number; ?>">
                          <input type="submit" name="submit" value="Yes">
                          <input  for="modal_1" type="submit" name="submitt" class="button dangerous" value="Cancel">
                          
                          </form>
                        </footer>
                      </article>
                    </div>';
                    }                  
                  }
                       
              ?>
        <br>
        <div class="row">
          <div class="col-sm-12 col-md-12">
            <div class="alert alert-warning text-center" role="alert">
                <h6 style="color: red;" >Tables</h6>
            </div>
            <hr>
            <div class="row pll-5 mll-2" > 
              
                <?php $query = "SELECT * FROM tbl_table ORDER BY id ASC";
                $result = mysqli_query($conn, $query); ?>
              <?php foreach ($result as  $row) {
                  if ($row['table_status'] == 1) {

                  echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                  echo '<a  href="update-table.php?id=' . $row["id"] . '&table=' . $row["table_number"] . '"class="btn btn-success" ">' . $row['table_name'] . '</a></div>';
                } else if ($row['table_status'] == 0) {
                  echo '<div class="col-2 col-md-2 col-sm-2" style="margin: 5px;">';
                  echo '<a href="#" class="btn btn-secondary disabled">' . $row['table_name'] . '</a></div>';
                }
              } ?>
            </div>
            <p>*เขียว = ไม่ว่าง, เทา = ว่าง</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
if (isset($_POST['submit'])) {
  $sql6 = "SELECT * FROM tbl_table 
  WHERE  table_number =  $table_number ";
  $res3 = mysqli_query($conn, $sql6);
  $sql7 = "UPDATE tbl_table SET 
            table_table=2
            WHERE  table_table = 1";
    $res1 = mysqli_query($conn, $sql7);
    // Button Clicked
    //echo "Button Clicked";
    // $id = $_POST['id'];
    // $table_number = $_POST['table_number'];
    $sql4 = "SELECT * FROM tbl_table 
    WHERE table_number = $table_number1 ";
    $res4 = mysqli_query($conn, $sql4);
    $sql5 = "UPDATE tbl_table SET 
            table_match=0,
            table_nummatch = 0
            WHERE table_number='$table_number1'";
    $ress = mysqli_query($conn, $sql5);
    if($ress == TRUE){?>
      <script type="text/javascript">
      window.location="index.php";
      </script>
    <?php } 
    else{
      header("location:match.php");
    }
  }
  if (isset($_POST['submitt'])) {
    $sql6 = "SELECT * FROM tbl_table 
    WHERE  table_number =  $table_number ";
    $res3 = mysqli_query($conn, $sql6);
    $sql7 = "UPDATE tbl_table SET 
              table_table=3
              WHERE  table_table = 1";
      $res1 = mysqli_query($conn, $sql7);
      // Button Clicked
      //echo "Button Clicked";
      // $id = $_POST['id'];
      // $table_number = $_POST['table_number'];
      $sql4 = "SELECT * FROM tbl_table 
      WHERE table_number = $table_number1 ";
      $res4 = mysqli_query($conn, $sql4);
      $sql5 = "UPDATE tbl_table SET 
              table_match=0,
              table_nummatch = 0
              WHERE table_number='$table_number1'";
      $ress = mysqli_query($conn, $sql5);
      if($ress == TRUE){?>
        <script type="text/javascript">
        window.location="index.php";
        </script>
      <?php } 
      else{
        header("location:match.php");
      }
    }


    // $row1 = mysqli_fetch_assoc($res4);
    // if ($row1['table_number'] === $table_number) {
    //     echo "<script>";
    //     echo "alert('Table numbers already exists');";
    //     echo "window.history.back()";
    //     echo "</script>";
    // }else{
    //     if($_POST['table_number'] > 00 and $_POST['table_number'] < 21 ){
    //         //2. SQL Query to Save the data into database
    //         $sql = "UPDATE tbl_admin SET 
    //                 table_number='$table_number' WHERE id='$id'";
    //         $sql1 = "UPDATE tbl_table SET 
    //         table_number='$table_number',
    //         table_status=1
    //          WHERE table_name='$table_number'";
    //         //3. Executing Query and Saving Data into Datbase
    //         $res = mysqli_query($conn, $sql);
    //         $res1 = mysqli_query($conn, $sql1);
    //             header("location:index.php");
    //         }else{
    //             echo "<script>";
    //             echo "alert('Enter Table numbers 1 - 20');";
    //             echo "window.history.back()";
    //             echo "</script>";
    //         }
    // }

  ?>
</section>

</html>
<?php include('partials/footer.php'); ?>
<!-- <script>
  function myFunction() {
    var r = confirm("ยืนยันการสั่ง");
    if (r == true) {
      window.location = 'match_update.php';
    } else {
      window.location = 'match.php';
    }
  }
</script> -->