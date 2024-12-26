<?php 

    require_once('connection.php');
    session_start();

    $email = $_POST['email'];
    $password = base64_encode($_POST['password']);
    $confirm = base64_encode($_POST['password2']);

    if($password === $confirm){
        if($email == $_SESSION['email']){
            $stmt = $con->prepare("UPDATE member SET password = '$password' WHERE email = '$email'");
            $stmt->execute();
            header("Location: loginpage.php");

        }else{
            header("Location: resetpassword.php?wrongemail='We can't find a user with that e-mail address.'");
        }

    }else{
        header("Location: resetpassword.php?passmatch='The password does not match.'");
    }

?>