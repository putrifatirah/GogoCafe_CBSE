<?php

    session_start();
    $email = $_SESSION['email'];

    $con = new mysqli("localhost","root","","gogocafe");
    if($con->connect_error){
        die("Failed to connect : " .$con->connect_error);
    }else{
        $stmt = $con->prepare("UPDATE member SET firstN = ?, lastN = ?, phone_no = ? WHERE email = '$email'");
        $stmt->bind_param("sss", $first, $last, $phone);
        $first = $_POST['firstname'];
        $last = $_POST['lastname'];
        $phone = $_POST['telephone'];
        $stmt->execute();

        header("Location: profile.php?action=update_success");
        
    }

?>