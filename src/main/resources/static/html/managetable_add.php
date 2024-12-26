<?php
$con = mysqli_connect('localhost', 'root', '', 'gogocafe');

if(mysqli_connect_errno()){
    echo "Database connection error!";
    exit;
}

$venue = $_POST['venue'];
$date = $_POST['date'];
$book_time = $_POST['book_time'];
$table_no = $_POST['table_no'];
$total_amount = $_POST['total_amount'];
$menu_name = $_POST['menu_name'];
$quantity = $_POST['quantity'];

//add to the bookinfo table
$sql = "INSERT INTO `bookinfo` (`venue`, `date`, `book_time`, `table_no`, `total_amount`) VALUES ('$venue', '$date', '$book_time', '$table_no', '$total_amount')";
$query = mysqli_query($con, $sql);

//add to the ordermenu table
$sql_ordermenu = "INSERT INTO `ordermenu` (`menu_name`, `quantity`) VALUES ('$menu_name', '$quantity')";
$query_ordermenu = mysqli_query($con, $sql_ordermenu);

if ($query === true && $query_ordermenu === true) {
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