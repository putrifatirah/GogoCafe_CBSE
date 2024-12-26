<?php
$con = mysqli_connect('localhost', 'root', '', 'gogocafe');

if(mysqli_connect_errno()){
    echo "Database connection error!";
    exit;
}

$menu_type = $_POST['menu_type'];
$id = $_POST['id'];
$menu_name = $_POST['menu_name'];
$menu_image = $_POST['menu_image'];
$menu_ing = $_POST['menu_ing'];
$price = $_POST['price'];
$availability = $_POST['availability'];

$sql = "UPDATE `menu` SET `menu_type`='$menu_type', `menu_name`='$menu_name',`menu_image`='$menu_image',`menu_ing`='$menu_ing', `price`='$price', `availability`='$availability' WHERE id='$id'";
$query = mysqli_query($con, $sql);
if($query==true)
{
    $data = array(
        'status' => 'success', 
    );
    echo json_encode($data);
}
else
{
    $data = array(
        'status' => 'failed',
    );
    echo json_encode($data);
}
?>