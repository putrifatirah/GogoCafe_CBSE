
<?php
session_start();
$conn = new mysqli("localhost", "root", "", "gogocafe");

if ($conn->error) {
    header("Location: home.php");
    exit;
} else {
    $id = $_POST['id'];
    $order_number = $_POST['order_number'];
    $venue = $_POST['venue'];
    $date = $_POST['date'];
    $book_time = $_POST['book_time'];
    $table_no = $_POST['table_no'];
    $total_amount = $_POST['total_amount'];
    $menu_name = $_POST['menu_name'];
    $quantity = $_POST['quantity'];

    // Perform the update operation for 'bookinfo' table
    $bookinfoQuery = "UPDATE bookinfo SET 'venue' = '$venue', 'date' = '$date', 'book_time' = '$book_time', 'table_no' = '$table_no', 'total_amount' = '$total_amount' WHERE 'id' = '$id'";
    $bookinfoStmt = $conn->prepare($bookinfoQuery);
    $bookinfoStmt->execute();

    // Perform the insert operation for 'ordermenu' table
    $ordermenuQuery = "INSERT INTO ordermenu1 (menu_name1, quantity1) VALUES ('$menu_name1', '$quantity1') ON DUPLICATE KEY UPDATE menu_name1 = '$menu_name1', quantity1 = '$quantity1'";
    $ordermenuStmt = $conn->prepare($ordermenuQuery);
    $ordermenuStmt->execute();

    if ($venue !== "") {
        header("Location: managetable.php");
        exit;
    }
}
?>
