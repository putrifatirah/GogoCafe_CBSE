<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>GOGO CAFE</title>
    <link rel="icon" type="image/png" href="images/icon.png"/>
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles/signup.css" />
    
  </head>

  <body>
    <header>
      <a>
          <img src="images/logo.png" class="logo">
          <ul class="nav">
              <div class="nav__list">
                  <a href="home.php" class="nav__link">HOME</a>
                  <a href="menu.php" class="nav__link ">MENU</a>
                  <a href="book.php" class="nav__link">BOOK NOW</a>
              </div>
          </ul>
      </a>
  </header>
    <main>
      <div class="row">
        <!--<div class="col-directory">
          <li>
            <h4>mama</h4>
          </li>
        </div>-->
        
        <div class="col-menu">
          <br>
          <!--coffee drink-->
          <div id="register_customer_panel" class="customer_panel">
            <div id="register_customer_panel" class="customer_panel">
            <form name="create_account" action="signingup.php" method="post" onsubmit="return check_form(create_account);"><input type="hidden" name="action" value="process"> <table border="0" width="100%" cellspacing="0" cellpadding="0">
            <tbody><tr><td class="login_heading special_font" align="center" style="padding-top:0px;">New Customer</td></tr>
            <tr><td align="center" style="padding-left: 50px; padding-right: 50px; padding-top: 10px; padding-bottom: 20px;">By creating an account with our store, you will be able to move <br>through the checkout process faster, store multiple shipping addresses, <br>view and track your orders in your account and more.</td></tr>
            <tr><td align="center" class="fieldcontent_large">
            <table border="0" cellspacing="0" cellpadding="0">
            <tbody><tr><td valign="top" class="main2" style="padding-top:0px;"><div class="input_title">First Name:</div><div class="input_requirement_box"><span class="inputRequirement">*</span></div></td></tr>
            <tr><td class=""><input type="text" name="firstname" class="loginField_box" required></td>
            </tr>
            <tr><td valign="top" class="main2" style="padding-top:20px;"><div class="input_title">Last Name:</div><div class="input_requirement_box"><span class="inputRequirement">*</span></div></td></tr>
            <tr><td class=""><input type="text" name="lastname" class="loginField_box" required></td>
              <?php
              if(isset($_GET['action']) && (($_GET['action'] == 'email_error') ||($_GET['action'] == 'mailpass_error')))
              echo '<p class="error">Email field is empty</p>  ';
            ?>
          </tr>
            <tr><td class="main2" valign="top" style="padding-top:20px;"><div class="input_title">E-Mail Address:</div><div class="input_requirement_box"><span class="inputRequirement">*</span></div></td></tr>
            <tr><td colspan="2"><input type="text" name="email" class="loginField_box" pattern=".*@.*\.com" title="Please enter a valid email address" required></td></tr>
            <tr><td valign="top" class="main2" style="padding-top:20px;"><div class="input_title">Password:</div><div class="input_requirement_box"><span class="inputRequirement">*</span></div></td></tr>
            <tr><td colspan="2"><input type="password" name="password" id="password01" class="passwordField_box" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></td></tr>
            <tr style="padding-top: 5px;"><td  ><input type="checkbox" onclick="myFunction()" > Show Password</td></tr>
            <tr><td style="padding-top:10px;padding-right:10px;font-size:8pt;" align="right" class="inputRequirement">* Required information</td></tr>
            <tr><td align="left" style="padding-top:10px;"><input type="submit" name="submit_register" value="Create Account" class="full_button"></td></tr>
            <tr><td>
            <div class="customer_login_go" align="center" style="">
            <a class="css_btn_full2" href="loginpage.php">Sign In</a> </div>
            </td></tr>
            <tr><td class="fieldcontent" align="center" style="padding-top:20px;"><img src="images/icon.png" style="height: 25px;width: 20px;"> GoGo Cafe is secure and your personal details are protected. </td></tr></tbody></table>
            
            </td></tr>
            </tbody></table>
            </form></div>
            </div>
        </div>
      </div>

    <footer>
    </footer>
    <script src="observer.js"></script>
  </main>
  
  </body>
   
</html>
<script>
  // Get the modal
  var modal = document.getElementById('id01');
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

  function myFunction() {
  var x = document.getElementById("password01");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }

}

  </script>
