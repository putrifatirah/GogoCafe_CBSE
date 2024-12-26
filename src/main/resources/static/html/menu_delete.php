<?php 
$con = mysqli_connect('localhost', 'root', '', 'gogocafe');

if(mysqli_connect_errno()){
    echo "Database connection error!";
    exit;
}


$id= $_POST['id'];
$sql = "DELETE FROM menu WHERE id='$id'";
$query = mysqli_query($con,$sql);
if($query==true)
{
    $data = array(
        'status' => 'success',
    );
    echo json_encode($data);
}
else{
    $data = array(
        'status' => 'failed',
    );
    echo json_encode($data);
}