<?php include('partials/menu.php'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<section class="bg food-search" style="background-image: url(../images/111.png); background-attachment: fixed;">
<div class="overlay" style="padding-bottom: 138%;"></div>
    <div class="main-content1" style="position: relative;">
        <div class="wrapper">
            <h1 class="text-white">Manage Food</h1>

            <br /><br />

            <!-- Button to Add Admin -->
            <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>

            <br /><br /><br />

            <?php
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if (isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if (isset($_SESSION['unauthorize'])) {
                echo $_SESSION['unauthorize'];
                unset($_SESSION['unauthorize']);
            }

            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            ?>

            <table class="table table-bordered table-hover table-striped" style="background-color: lavenderblush;">
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>

                <?php
                //Create a SQL Query to Get all the Food
                $sql = "SELECT * FROM tbl_food";

                //Execute the qUery
                $res = mysqli_query($conn, $sql);

                //Count Rows to check whether we have foods or not
                $count = mysqli_num_rows($res);

                //Create Serial Number VAriable and Set Default VAlue as 1
                $sn = 1;

                if ($count > 0) {
                    //We have food in Database
                    //Get the Foods from Database and Display
                    while ($row = mysqli_fetch_assoc($res)) {
                        //get the values from individual columns
                        $id = $row['p_id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                ?>

                        <tr>
                            <td><?php echo $sn++; ?>. </td>
                            <td><?php echo $title; ?></td>
                            <td>$<?php echo $price; ?></td>
                            <td>
                                <?php
                                //CHeck whether we have image or not
                                if ($image_name == "") {
                                    //WE do not have image, DIslpay Error Message
                                    echo "<div class='error'>Image not Added.</div>";
                                } else {
                                    //WE Have Image, Display Image
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px">
                                <?php
                                }
                                ?>
                            </td>
                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                                <a href="delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Food</a>
                            </td>
                        </tr>

                <?php
                    }
                } else {
                    //Food not Added in Database
                    echo "<tr> <td colspan='7' class='error'> Food not Added Yet. </td> </tr>";
                }

                ?>


            </table>
        </div>

    </div>
</section>
<?php include('partials/footer.php'); ?>