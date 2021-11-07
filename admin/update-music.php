<?php include('partials/menu.php'); ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<section class="bg food-search">
<div class="main-content">
    <div class="wrapper">
        <h1>Update Music</h1>
        <br><br>


        <?php 
        
            //CHeck whether id is set or not
            if(isset($_GET['id']))
            {
                //GEt the Order Details
                $id=$_GET['id'];

                //Get all other details based on this id
                //SQL Query to get the order details
                $sql = "SELECT * FROM tbl_music WHERE id=$id";
                //Execute Query
                $res = mysqli_query($conn, $sql);
                //Count Rows
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //Detail Availble
                    $row=mysqli_fetch_assoc($res);

                    $song = $row['song'];
                    $type = $row['type'];
                    $qty = $row['qty'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                }
                else
                {
                    //DEtail not Available/
                    //Redirect to Manage Order
                    header('location:'.SITEURL.'admin/manage-music.php');
                }
            }
            else
            {
                //REdirect to Manage ORder PAge
                header('location:'.SITEURL.'admin/manage-music.php');
            }
        
        ?>

        <form action="" method="POST" style="display: table; background-color: lavenderblush; padding: 2%">
        
            <table class="tbl-30">
                <tr>
                    <td>Song Name</td>
                    <td><b> <?php echo $song; ?> </b></td>
                </tr>

                <tr>
                    <td>Type</td>
                    <td>
                        <b><?php echo $type; ?></b>
                    </td>
                </tr>

                <tr>
                    <td>Qty</td>
                    <td>
                        <input type="number" name="qty" value="<?php echo $qty; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="finish"){echo "selected";} ?> value="finish">finish</option>
                            <option <?php if($status=="playing"){echo "selected";} ?> value="playing">playing</option>
                            <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>

                <!-- <tr>
                    <td>Customer Name: </td>
                    <td>
                        <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                    </td>
                </tr> -->

                <tr>
                    <td clospan="3">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="type" value="<?php echo $type; ?>">
                        <input type="hidden" name="status" value="<?php echo $status; ?>">
                        <input type="submit" name="submit" value="Update Music" class="btn-secondary">
                    </td>
                </tr>
            </table>
        
        </form>


        <?php 
            //CHeck whether Update Button is Clicked or Not
            if(isset($_POST['submit']))
            {
                //echo "Clicked";
                //Get All the Values from Form
                $id = $_POST['id'];
                $price = $_POST['type'];
                $qty = $_POST['qty'];


                $status = $_POST['status'];

                $customer_name = $_POST['customer_name'];

                //Update the Values
                $sql2 = "UPDATE tbl_order SET 
                    qty = $qty,
                    status = '$status',
                    customer_name = '$customer_name'
                    WHERE id=$id
                ";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //CHeck whether update or not
                //And REdirect to Manage Order with Message
                if($res2==true)
                {
                    //Updated
                    $_SESSION['update'] = "<div class='success'>Music Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-music.php');
                }
                else
                {
                    //Failed to Update
                    $_SESSION['update'] = "<div class='error'>Failed to Update Music.</div>";
                    header('location:'.SITEURL.'admin/manage-music.php');
                }
            }
        ?>


    </div>
</div>
<br><br><br><br><br><br><br>
</section>
<?php include('partials/footer.php'); ?>
