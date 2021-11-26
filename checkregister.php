<?php 

    session_start();

    require_once "config/constantss.php";

    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $user_check = "SELECT * FROM tbl_admin WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);

        if ($user['username'] === $username) {
            echo "<script>";
            echo "alert('Username already exists');";
            echo "window.history.back()";
            echo "</script>";
        } else {
            $passwordenc = md5($password);

            $query7 = "INSERT INTO tbl_admin (full_name, username, password, email, phone , userlevel)
                        VALUE ('$full_name', '$username', '$passwordenc', '$email', $phone, 'M')";
            $result1 = mysqli_query($conn, $query7);

            if ($result1) {
            echo "<script>";
            echo "alert('Username already exists');";
            echo "</script>";
            header('Location: form_login.php');
            } else {
            echo "<script>";
            echo "alert('Something went wrong');";
            echo "window.history.back()";
            echo "</script>";
            }
        }

    }

?>
