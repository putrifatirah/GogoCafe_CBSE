<?php
    session_start();

    $current =  base64_encode($_POST['password_current']);
    $newpass = base64_encode($_POST['password_new']);
    $confirm =  base64_encode($_POST['password_confirmation']);
    $email = $_SESSION['email'];

    $con = new mysqli("localhost","root","","gogocafe");
    if($con->connect_error){
        die("Failed to connect : " .$con->connect_error);
    }else{
        $stmt = $con->prepare("SELECT * FROM member where email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === ($current)){
                if($newpass === $confirm)                
                    $stmt = $con->prepare("UPDATE member SET password = '$newpass' WHERE email ='$email'");
                    $stmt->execute();
                    header("Location: profile.php?action=update_password");
            }
        
    }
    }

?>