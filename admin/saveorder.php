<?php
    session_start();
    //check login
    // if($_SESSION['full_name'] == '')
    // {
    //     header("Location: login.php");
    // }
    include('../config/constantss.php'); 
    
    // echo '<pre>';
    // print_r($_SESSION);
    // echo '</pre>';
    // echo '<hr>';
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    
    // exit;



    $name = mysqli_real_escape_string($conn,$_POST["full_name"]);
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $phone = mysqli_real_escape_string($conn,$_POST["phone"]);
    $m_id = mysqli_real_escape_string($conn,$_POST["m_id"]);
    $total = mysqli_real_escape_string($conn,$_POST["total"]);
    $dttm = date("Y-m-d H:i:s");
    

    mysqli_query($conn, "BEGIN");
    $sql1="INSERT INTO order_head 
    VALUES 
    (
    null,
    $m_id,
    '$dttm',
    '$name',
    '$email',
    '$phone',
    '$total',
    1
    )";
    $query1 = mysqli_query($conn, $sql1) or die ("Error in query $sql1" . mysqli_error($conn));
    echo $sql1;

    $sql2 = "SELECT MAX(o_id) as o_id
    FROM order_head
    WHERE m_id = $m_id
    AND dttm = '$dttm'
    ";
    $query2 = mysqli_query($conn, $sql2) or die ("Error in query $sql2" . mysqli_error($conn));
    $row = mysqli_fetch_array($query2);
    $o_id = $row["o_id"];

    // echo '<br>';   
    // echo $sql2;
    // echo '<br>';
    // echo $o_id;
    // echo '<br>';

        foreach($_SESSION['cart'] as $p_id=>$qty)
        {
            $sql3 = "SELECT * FROM tbl_food WHERE p_id = $p_id";
            $query3 = mysqli_query($conn , $sql3) or die ("Error in query $sql3" . mysqli_error($conn));
            $row3 = mysqli_fetch_array($query3);
            $d_subtotal = $row3['price']*$qty;

            $sql4 = "INSERT INTO order_detail
            VALUES
            (
            null,
            $o_id,
            $p_id,
            $qty,
            $d_subtotal
            )";
            $query4 = mysqli_query($conn, $sql4) or die ("Error in query $sql4" . mysqli_error($conn));

            echo '<pre>';
            echo $sql4;
            echo '</pre>';
        }
// exit;

    if($query1 && $query4){
        mysqli_query($conn,"COMMIT");
        $msg = "???????????????????????????????????????????????????????????????????????????";
        foreach($_SESSION['cart'] as $p_id)
        {
            unset($_SESSION['cart']);
        }
    }
    else{
        mysqli_query($conn, "ROLLBACK");
        $msg = "???????????????????????????????????????????????????????????????";
    }
?>
<script type="text/javascript">
    alert("<?php echo $msg;?>");
    window.location = 'manage-ordertest.php';
</script>
