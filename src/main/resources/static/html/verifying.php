<?php
    $con = new mysqli("localhost","root","","gogocafe");
    if($con->connect_error){
        die("Failed to connect : " .$con->connect_error);
    }else{
        $stmt = $con->prepare("UPDATE member (verification) VALUES(?)");
        $stmt->bind_param("d", '1');
        $stmt->execute();

        header("Location: home.php?signup=success");
        
    }

?>