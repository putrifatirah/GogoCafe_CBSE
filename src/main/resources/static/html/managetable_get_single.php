<?php
$con = mysqli_connect('localhost', 'root', '', 'gogocafe');

if(mysqli_connect_errno()){
    echo "Database connection error!";
    exit;
}

$id = $_POST['id'];

$sql = "SELECT b.*, o.menu_name, o.quantity FROM bookinfo b 
        JOIN ordermenu o ON b.order_number = o.order_number
        WHERE b.id='$id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>