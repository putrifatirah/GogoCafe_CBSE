<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Logged In</title>
</head>
<body>
  <h1>Welcome, <?php echo $_SESSION['email']; ?>!</h1>
  <a href="logout.php">Log Out</a>
</body>
</html>
