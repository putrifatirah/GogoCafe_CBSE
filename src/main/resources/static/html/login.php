<?php
session_start();

    // Store the previous page in a session variable
    $_SESSION['previous_page'] = $_SERVER['HTTP_REFERER'];

    $email = $_POST['email'];
    $password = ($_POST['password']);
    $con = new mysqli("localhost","root","","gogocafe");
    if($con->connect_error){
        die("Failed to connect : " .$con->connect_error);
    }else{
        if(empty(trim($email))){
            if(empty(trim($password))){
                header("Location: " .$_SESSION['previous_page']. "?action=mailpass_error" );
                unset($_SESSION['previous_page']);
                exit;}
            else{
                header("Location: " .$_SESSION['previous_page']. "?action=email_error" );
                unset($_SESSION['previous_page']);
                exit;
            }
        }else{
            if(empty(trim($password))){
                header("Location: " .$_SESSION['previous_page']. "?action=password_error" );
                unset($_SESSION['previous_page']);
                exit;
            }elseif(empty(trim($email))){
                header("Location: " .$_SESSION['previous_page']. "?action=email_error" );
                unset($_SESSION['previous_page']);
                exit;
            }else{
                $stmt = $con->prepare("select * from member where email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt_result = $stmt->get_result();
                if($stmt_result->num_rows > 0) {
                    $data = $stmt_result->fetch_assoc();
                    if($data['password'] === base64_encode($password)){
                        $_SESSION['email'] =$email;
                        header("Location: " .$_SESSION['previous_page']);
                        exit;
                    }else {
                        header("Location: " .$_SESSION['previous_page']. "?action=login_error" );
                        unset($_SESSION['previous_page']);
                        exit;
                    }
                }else{
                    header("Location: " .$_SESSION['previous_page']. "?action=login_error" );
                        unset($_SESSION['previous_page']);
                        exit;
                }
            }
        }   
    
    }
?>
