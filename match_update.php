<?php
session_start();
//check login
//   echo '<pre>';
//   print_r($_SESSION['table_number']);
//   echo '</pre>';
$table_number = $_SESSION['table_number'];
if ($_SESSION['full_name'] == '') {
    header("Location: login.php");
}
include('config/constantss.php');


$id = $_GET['id'];
//query
$query = "SELECT tbl_table.*, tbl_admin.*
FROM tbl_table
INNER JOIN tbl_admin
WHERE tbl_table.id=$id
AND tbl_admin.table_number = tbl_table.table_number";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
// echo '<pre>';
// print_r($row);
// echo '<pre>';


?>
<?php include('partials-front/menu.php'); ?>

<!doctype html>
<html lang="en">


<!-- Required meta tags -->
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<style type="text/css">
    a {
        color: white;

    }

    a:hover {
        color: #ff7b00;
        text-decoration: none;
    }
</style>

<section class="food-search" style="background-image: url(images/111.png); background-attachment: fixed;">
    <div class="overlay"></div>
    <div class="container" style="padding: 5%;">
        <div class="row" style="justify-content: center;">
            <div class="col-12 col-sm-11 col-md-7 " style="background-color: white;">
                <br>
                <h4 align="center" style="color: red;">รายละเอียด</h4>
                <br>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="alert alert-warning" role="alert">
                            <center>
                                <font color="red"> <b> ขอชนแก้วโต๊ะ <?php echo $row['table_name']; ?> </b></font>
                            </center>
                        </div>
                        <hr>
                        <div style="margin-left: 20px;">
                            <form action="" method="POST">
                                <div class="form-group row">
                                    <label class="col-sm-2 ">เลขโต๊ะ</label>
                                    <div class="col-sm-2">
                                        <input type="text" name="table_name" class="form-control" readonly value="<?php echo $row['table_name']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 ">ชื่อผู้ใช้</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="full_name" class="form-control" readonly value="<?php echo $row['full_name']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 ">Message</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="Message" class="form-control" maxlength="10" placeholder="อยากรู้จักครับ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 "></label>
                                    <div class="col-sm-10">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <input type="submit" name="submit" value="Submit" class="btn btn-success">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
<?php
if (isset($_POST['submit'])) {
    // Button Clicked
    //echo "Button Clicked";

    //1. Get the Data from form
    $id = $_POST['id'];

    //2. SQL Query to Save the data into database
    $sql2 = "UPDATE tbl_table SET 
            table_match=1,
            table_nummatch = '$table_number'
            WHERE id='$id'";


    //3. Executing Query and Saving Data into Datbase
    $res = mysqli_query($conn, $sql2);
    //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
    if ($res == TRUE) {
        //Data Inserted
        //echo "Data Inserted";
        //Create a Session Variable to Display Message
        // $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
        //Redirect Page to Manage Admin
        // header("location:index.php");
        $_SESSION['add'] = "<div class='success'>Food Added Successfully.</div>";?>
        <script type="text/javascript">
        window.location="index.php";
        </script>
   <?php } else {
        //FAiled to Insert DAta
        //echo "Faile to Insert Data";
        //Create a Session Variable to Display Message
        $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
        //Redirect Page to Add Admin
        header("location:admin/add-admin.php");
    }
}

?>