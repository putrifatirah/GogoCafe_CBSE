<?php 
session_start();
$conn = new mysqli("localhost", "root", "", "gogocafe");

if ($conn->connect_error) {
    header("Location: home.php");
    exit;
} else {
    $table = $_POST['bookingtable'];
    $time = $_SESSION['time'];
    $venue = $_SESSION['venue'];
    $date = $_SESSION['bookingDate'];

    // Get the user id
    $stmt = $conn->prepare("SELECT * FROM member where email = ?");
    $stmt->bind_param("s", $_SESSION['email']);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    
    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        $user = $data['id'];

        // Prepare the insert statement
        $query = "INSERT INTO bookinfo (id) VALUES (?)";
        $stmnt = $conn->prepare($query);
        $stmnt->bind_param("s", $user);
        
        if ($stmnt->execute()) {
            $newId = $stmnt->insert_id;
            $_SESSION['orderid'] = $newId;

            // Prepare the update statement
            $updateQuery = "UPDATE bookinfo SET venue = '$venue', date ='$date', book_time = '$time', table_no = '$table' WHERE order_number = '$newId'";
            $updateStmt = $conn->prepare($updateQuery);
            
            if ($updateStmt->execute()) {
                header("Location: book4.php");
                exit;
            } else {
                echo "Error updating bookinfo: " . $updateStmt->error;
            }
        } else {
            echo "Error executing insert query: " . $stmnt->error;
        }
    } else {
        echo "No user found with the given email.";
    }
}

$conn->close();
?>