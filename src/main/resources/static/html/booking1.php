<?php
session_start();
$conn = new mysqli("localhost", "root", "", "gogocafe");

if($conn->error){
    header("Location: home.php");
    exit;
}else{
    $_SESSION['venue'] = $_POST['venued'];    
    $_SESSION['bookingDate'] = $_POST['bookdate'];
    $email = $_SESSION['email'];
    header("Location: book2.php");
    }
?>