<?php
    session_start();
    $m_id = $_SESSION['m_id'];

    include('config/constantss.php'); 

    $total = $_POST["total"];
    $dttm = date("Y-m-d H:i:s");
    $m_id = $_POST["m_id"];

    mysqli_query($conn, "BEGIN");
    $sql1="INSERT INTO tbl_order 
    values
    (
    null,
    '$dttm',
    '$name',
    '$total'
    )";
    $query1 = mysqli_query($conn, $sql1) or die ("Error in query $sql1" . mysqli_error($sql1));
    echo $sql1;

    $sql2 = "SELECT MAX(o_id) as o_id
    FROM order_head
    WHERE m_id = $m_id
    AND o_dttm = '$dttm'
    ";
    $query2 = mysqli_query($conn, $sql2) or die ("Error in query $sql2" . mysqli_error($sql2));
    $row = mysqli_fetch_array($sql2);
    $o_id = $row["o_id"];

    echo '<br>';
    echo $sql2;
    echo '<br>';
    echo $o_id;
    echo '<br>';

        foreach($_SESSION['cart'] as $id=>$qty)
        {
            $sql3 = "SELECT * FROM tbl_food WHERE id = $id";
            $query3 = mysqli_query($conn , $sql3) or die ("Error in query $sql3" . mysqli_error($sql3));
            $row3 = mysqli_fetch_array($query3);
            $pricetotal = $row3['price']*$qty;

            $sql4 = "INSERT INTO tbl_order 
            VALUES
            (
            null,
            $o_id,
            $id,
            $qty,
            $pricetotal
            )";
            $query4 = mysqli_query($conn, $sql4) or die ("Error in query $sql4" . mysqli_error($sql4));

            echo '<pre>';
            echo $sql4;
            echo '</pre>';
        }










?>