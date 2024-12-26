<?php 
session_start();
$conn = new mysqli("localhost", "root", "", "gogocafe");

if ($conn->connect_error) {
    header("Location: home.php");
    exit;
} else {    
            $Id = $_SESSION['orderid'];

            // Prepare the update statement
            $updateQuery = "DELETE FROM bookinfo  WHERE order_number = '$Id'";
            $updateStmt = $conn->prepare($updateQuery);

            $updateQuery2 = "DELETE FROM ordermenu1  WHERE order_number1 = '$Id'";
            $updateStmt2 = $conn->prepare($updateQuery2);
            
            if ($updateStmt->execute() && $updateStmt2->execute()) {
                header("Location: book.php");
                exit;
            } else {
                echo "Error updating bookinfo: " . $updateStmt->error;
            }
        }

$conn->close();
?>