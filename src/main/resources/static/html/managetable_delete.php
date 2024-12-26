<?php
$con = mysqli_connect('localhost', 'root', '', 'gogocafe');

if (mysqli_connect_errno()) {
    echo "Database connection error!";
    exit;
}

$id = $_POST['id'];

// Delete from the ordermenu table
$ordermenu_sql = "DELETE FROM ordermenu WHERE order_number IN (SELECT order_number FROM bookinfo WHERE id = '$id')";
$ordermenu_query = mysqli_query($con, $ordermenu_sql);

// Then delete from the bookinfo table
$bookinfo_sql = "DELETE FROM bookinfo WHERE id = '$id'";
$bookinfo_query = mysqli_query($con, $bookinfo_sql);


if ($ordermenu_query && $bookinfo_query) {
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