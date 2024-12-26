<?php
session_start();
$conn = new mysqli("localhost", "root", "", "gogocafe");

if($conn->error){
    header("Location: home.php");
    exit;
}else{
    $_SESSION['time'] = $_POST['bookingtime']; 
        header("Location: book3.php");
        exit;
    }
?>