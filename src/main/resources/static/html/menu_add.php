<?php
$con = mysqli_connect('localhost', 'root', '', 'gogocafe');

if(mysqli_connect_errno()){
    echo "Database connection error!";
    exit;
}

$menu_type = $_POST['menu_type'];
$menu_name = $_POST['menu_name'];
$menu_image = $_POST['menu_image'];
$menu_ing = $_POST['menu_ing'];
$price = $_POST['price'];
$availability = $_POST['availability'];

$sql = "INSERT INTO `menu` (`menu_type`, `menu_name`, `menu_image`, `menu_ing`, `price`, `availability`) VALUES ('$menu_type', '$menu_name', '$menu_image', '$menu_ing', '$price', '$availability')";
$query = mysqli_query($con, $sql);

if ($query == true) {
    $data = array(
        'status' => 'success',
    );
    echo json_encode($data);
} else {
    $data = array(
        'status' => 'failed',
    );
    echo json_encode($data);
}
?>
