<?php
    include('config/constantss.php'); 

    use PHPMailer\PHPMailer\PHPMailer;

    if(isset($_POST['email'])) {
        $email = $_POST['email'];

        // if(isset($_POST['emaill'])) {
        // $check_email = "SELECT * FROM tbl_admin WHERE email='$email'";
        // $run_sql = mysqli_query($conn, $check_email);
        // $insert_code = "UPDATE tbl_admin SET code = $code WHERE email = '$email'";
        // $run_query =  mysqli_query($conn, $insert_code);
        
        // }
        
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        // SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "boatindy157@gmail.com"; // enter your email address
        $mail->Password = "dragonball154"; // enter your password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;    
        $mail->Port = 465;

        //Email Settings
        $code = rand(999999, 111111);
        $mail->isHTML(true);
        $mail->setFrom($email, '2023Hangout');
        $mail->addAddress($email); // Send to mail
        $mail->Subject = "Password Reset Code";
        $mail->Body = "Your password reset code is $code";
                
        if($mail->send()) {
            $status = "success";
            $response = "Email is sent";
            
        } else {
            $status = "failed";
            $response = "Something is wrong" . $mail->ErrorInfo;
        }
        // header('location: reset-code.php');
        
        exit(json_encode(array("status" => $status, "response" => $response)));

    }

    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM tbl_admin WHERE code = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE tbl_admin SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($conn, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: form_login.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
?>