<?php
session_start();
$conn = new mysqli("localhost", "root", "", "gogocafe");

if($conn->error){
    header("Location: home.php");
    exit;
}else{
    // Retrieve the data sent from JavaScript
    // $totalAmount = $_SESSION['total']; // Assuming the data is sent via POST method
    $ordernumber = $_SESSION['orderid'];

// Retrieve the JSON data from the AJAX request
$data = json_decode(file_get_contents("php://input"), true);

// Assuming you have a database connection established
// Insert the data into the database using a loop
foreach ($data as $item) {
  $title = $item['title'];
  $price = $item['price'];
  $qty = $item['quantity'];
  $subtotal = $price*$qty;

  $insertquery = "INSERT INTO ordermenu (order_number, menu_name, price, quantity, total_price) VALUES (?,?,?,?,?) ";
  $insert = $conn->prepare($insertquery);
  $insert->bind_param("ssddd", $ordernumber, $title, $price, $qty, $subtotal);
  $insert->execute();

  $_SESSION['totalAmount'] += $subtotal;
}

// Return a response indicating success or failure

    
    $total = $_SESSION['totalAmount'];

    // Perform the update operation
    $updateQuery = "UPDATE bookinfo SET total_amount = '$total' WHERE order_number = '$ordernumber'";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->execute();
    if($selectedTable!==""){
        // Redirect to the other PHP file
        $_SESSION['totalamt'] = $totalAmount;
        header("Location: book5.php");
        exit;
    }

}
?>