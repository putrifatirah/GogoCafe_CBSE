<?php 
$con = mysqli_connect('localhost', 'root', '', 'gogocafe');

if(mysqli_connect_errno()){
    echo "Database connection error!";
    exit;
}

$id = $_POST['id'];

$sql = "SELECT * FROM menu WHERE id='$id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>