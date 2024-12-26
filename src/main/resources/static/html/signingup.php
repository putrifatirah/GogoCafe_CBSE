<?php

    $encryptedData = $_POST['encrypted'];

    $con = new mysqli("localhost","root","","gogocafe");
    if($con->connect_error){
        die("Failed to connect : " .$con->connect_error);
    }else{
        if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['[password]']))
        $stmt = $con->prepare("INSERT INTO member (firstN, lastN, email, password) VALUES(?, ?, ?, ?)");
        $stmt->bind_param("ssss", $first, $last, $email, $password);
        $first = $_POST['firstname'];
        $last = $_POST['lastname'];
        $email = $_POST['email'];
        $password = base64_encode($_POST['password']);
        $stmt->execute();

        header("Location: home.php?signup=success");
        
    }

?>