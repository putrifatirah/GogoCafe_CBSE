<?php

$conn = new mysqli("localhost", "root", "", "gogocafenew");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Check if the form has been submitted
if (isset($_POST['off_button'])) {
  // Get the selected table number
  $tableNo = $_POST['table_no'];

  // Retrieve the other necessary data from the query parameters
$venue = isset($_POST['venue']) ? $_POST['venue'] : '';
$date = isset($_POST['date']) ? $_POST['date'] : '';
$time = isset($_POST['time']) ? $_POST['time'] : '';

  // Insert the new row into the 'bookinfo' table
  if ($conn) {
    $insertQuery = "INSERT INTO bookinfo (id, order_number, venue, date, book_time, table_no, total_amount) VALUES (0, NULL, '$venue', '$date', '$time', '$tableNo', NULL)";
    
    if ($conn->query($insertQuery) === TRUE) {
      // Row inserted successfully, you can redirect or display a success message here
    } else {
      // Error occurred while inserting the row, handle it accordingly
    }
  } else {
    // Error occurred while connecting to the database, handle it accordingly
  }
}
?>
