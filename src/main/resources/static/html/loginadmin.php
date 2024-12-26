<?php
session_start();

    // Store the previous page in a session variable

    $email = $_POST['email_address'];
    $password = $_POST['password'];
    $con = new mysqli("localhost","root","","gogocafe");
    if($con->connect_error){
        die("Failed to connect : " .$con->connect_error);
    }else{
        $stmt = $con->prepare("select * from admin where email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password){
                $_SESSION['email'] =$email;
                header("Location: manageacc.php");
                exit;
            }else {
                header("Location: loginadmin.html?action=login_error" );
                exit;
            }
        }   
    }
?>
