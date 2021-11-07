<?php 
$m_id = $_SESSION['id'];
    //Include constants.php file here
    include('../config/constantss.php');

    // 1. get the ID of Admin to be deleted
    $o_id = $_GET['o_id'];

    //2. Create SQL Query to Delete Admin
    $sql1 = "DELETE order_detail , order_head  FROM order_detail INNER JOIN order_head 
    WHERE order_head.o_id= order_detail.o_id and order_head.o_id = $o_id";

    //Execute the Query
    $res = mysqli_query($conn, $sql1);

    // Check whether the query executed successfully or not
    if($res==true)
    {
        //Query Executed Successully and Admin Deleted
        //echo "Admin Deleted";
        //Create SEssion Variable to Display Message
        $_SESSION['delete'] = "<div class='success'>Deleted Order Successfully.</div>";
        //Redirect to Manage Admin Page
        Header("Location: manage-ordertest.php");
        // header('location:'.SITEURL.'admin/manage-ordertest.php');
    }
    else
    {
        //Failed to Delete Admin
        //echo "Failed to Delete Admin";

        $_SESSION['delete'] = "<div class='error'>Failed to Delete Order. Try Again Later.</div>";
        Header("Location: manage-ordertest.php");
    }

    //3. Redirect to Manage Admin page with message (success/error)

?>