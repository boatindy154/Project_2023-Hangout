<?php
include ('config/constantss.php');
session_start();
echo '<pre>' ;
print_r($_SESSION);
echo '</pre>';
$id = $_SESSION['id'];
$table_number = $_SESSION['table_number'];
// $query = "SELECT * FROM tbl_admin WHERE $id ";
//                 $result = mysqli_query($conn, $query);

$query1 = "SELECT * FROM tbl_table WHERE $table_number ";
                $result1 = mysqli_query($conn, $query1);

// $sql3 = "UPDATE tbl_admin SET 
// table_number=0
// WHERE table_number ='$table_number'";
// $result3 = mysqli_query($conn, $sql3);

$sql = "UPDATE tbl_table SET 
table_table=4
WHERE table_name ='$table_number'";
$result2 = mysqli_query($conn, $sql);

// $sql1 = "UPDATE tbl_admin SET 
// table_number=0
//  WHERE id='$id'";
// $result2 = mysqli_query($conn, $sql1);
// echo '<pre>';
// print_r($sql);
// echo '<pre>';

header("Location: index.php ");	
?>