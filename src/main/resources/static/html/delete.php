<?php
session_start();
$con = new mysqli("localhost","root","","gogocafe");

$stmt = $con->prepare("DELETE FROM member where email = ?");
$stmt->bind_param("s", $_SESSION['email']);
$stmt->execute();

header("Location: logout.php");
exit;
?>