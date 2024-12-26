<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
</head>
<body>
  <div id="loginSection">
    <h1>Login</h1>
    <form id="loginForm" action="login.php" method="post">
      <input type="text" name="email" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Log In</button>
    </form>
  </div>
  <div id="loggedInSection" style="display: none;">
    <h1>Welcome, <span id="email"></span>!</h1>
    <button id="logoutButton">Log Out</button>
  </div>
  <script src="script.js"></script>
</body>
</html>
