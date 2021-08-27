<?php 

    $conn = mysqli_connect("localhost", "root", "", "2023bar");

    if (!$conn) {
        die("Failed to connec to databse " . mysqli_error($conn));
    }

?>