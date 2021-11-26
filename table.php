<?php include ('config/constantss.php');
session_start();
// echo '<pre>' ;
// print_r($_SESSION);
// echo '</pre>';

//     echo '<pre>';
// print_r($sql4);
// echo '<pre>';
$userlevel = $_SESSION['userlevel'];
$id = $_SESSION['id'];
$table_number1 = $_SESSION['table_number'];
if ($userlevel != 'M') {
    Header("Location: form_login.php");
}
if ($table_number1 > 00 and $table_number1 < 21) {
    Header("Location: index.php");
}
?>
<?php 


            if(isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
            {
                echo $_SESSION['add']; //Display the SEssion Message if SEt
                unset($_SESSION['add']); //Remove Session Message
            }
        ?>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" >
<style>
    *{
        -webkit-box-sizing:border-box;
    -moz-box-sizing:border-box;
    box-sizing:border-box;
    }
</style>
    <section class="food-search text-center " style="background-image: url(images/111.png); background-attachment: fixed; ">
    <div class="overlay" ></div>
    <div class="container" style="padding: 9% 0; position: relative; ">
        <h2 class="text-center" style="color: white; margin-bottom: 5%;">Table NO.</h2>
        <form action="" method="POST">
            <input type="search" name="table_number" placeholder="Number Table 01-20"  required>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
    <br><br><br><br><br><br>
    <div class="clearfix"></div>

</section>
<?php include('partials-front/footer.php'); ?>

<?php

if (isset($_POST['submit'])) {
    
    // Button Clicked
    //echo "Button Clicked";
    $id = $_POST['id'];
    $table_number = $_POST['table_number'];
    $sql4 = "SELECT * FROM tbl_admin 
    WHERE table_number = $table_number ";
    $res4 = mysqli_query($conn, $sql4);
    $row1 = mysqli_fetch_assoc($res4);
    if ($row1['table_number'] === $table_number) {
        echo "<script>";
        echo "alert('Table numbers already exists');";
        echo "window.history.back()";
        echo "</script>";
    }else{
        if($_POST['table_number'] > 00 and $_POST['table_number'] < 21 ){
            //2. SQL Query to Save the data into database
            $sql = "UPDATE tbl_admin SET 
                    table_number='$table_number' WHERE id='$id'";
            $sql1 = "UPDATE tbl_table SET 
            table_number='$table_number',
            table_status=1
             WHERE table_name='$table_number'";
            //3. Executing Query and Saving Data into Datbase
            $res = mysqli_query($conn, $sql);
            $res1 = mysqli_query($conn, $sql1);
            $_SESSION['table_number'] = $table_number;
                header("location:index.php");
                
            }else{
                echo "<script>";
                echo "alert('Enter Table numbers 1 - 20');";
                echo "window.history.back()";
                echo "</script>";
            }
    }
    
    //1. Get the Data from form
    
    //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
    // if ($res == TRUE) {
    //     // $sql5="SELECT * FROM tbl_admin WHERE id=$id";
    //     // $res5=mysqli_query($conn, $sql5);

    //     //     //Check whether the query is executed or not
    //     //     if($res5==true)
    //     //     {
    //     //         // Check whether the data is available or not
    //     //         $count = mysqli_num_rows($res5);
    //     //         //Check whether we have admin data or not
    //     //         if($count==1)
    //     //         {
    //     //             // Get the Details
    //     //             //echo "Admin Available";
    //     //             $row=mysqli_fetch_assoc($res5);

    //     //             $_SESSION['table_number'] = $row['table_number'];
    //     //             // $username = $row['username'];
    //     //         }
    //     //         else
    //     //         {
    //     //             //Redirect to Manage Admin PAge
    //     //             header('location:form_login.php');
    //     //         }
    //     //     }
    //     //Data Inserted
    //     //echo "Data Inserted";
    //     //Create a Session Variable to Display Message
    //     // $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
    //     //Redirect Page to Manage Admin
       
    // } else {
    //     //FAiled to Insert DAta
    //     //echo "Faile to Insert Data";
    //     //Create a Session Variable to Display Message
    //     $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
    //     //Redirect Page to Add Admin
    //     header("location:admin/add-admin.php");
    // }
}

?>

