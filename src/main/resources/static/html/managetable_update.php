<?php
$con = mysqli_connect('localhost', 'root', '', 'gogocafe');

if(mysqli_connect_errno()){
    echo "Database connection error!";
    exit;
}

$id = $_POST['id'];
$order_number = $_POST['order_number']; // Add this line
$venue = $_POST['venue'];
$date = $_POST['date'];
$book_time = $_POST['book_time'];
$table_no = $_POST['table_no'];
$total_amount = $_POST['total_amount'];
$menu_name = $_POST['menu_name'];
$quantity = $_POST['quantity'];

// Update the 'bookinfo' table
$sql = "UPDATE `bookinfo` AS b
JOIN `ordermenu` AS om ON b.order_number = om.order_number
SET b.venue = '$venue',
    b.date = '$date',
    b.book_time = '$book_time',
    b.table_no = '$table_no',
    b.total_amount = '$total_amount',
    om.menu_name = '$menu_name',
    om.quantity = '$quantity'
WHERE b.id = '$id'";

$query = mysqli_query($con, $sql);

if ($query) {
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