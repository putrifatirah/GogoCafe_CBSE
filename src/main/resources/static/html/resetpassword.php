<!DOCTYPE html>
<?php
session_start();
  if(isset($_GET['email']))
    $_SESSION['email'] = $_GET['email'];
?>
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
    <link rel="stylesheet" href="styles/signup.css">
  </head>

  <body>

    <header>
      <a>
          <img src="images/logo.png" class="logo">
          <ul class="nav">
              <div class="nav__list">
                  <a href="#" class="nav__link">HOME</a>
                  <a href="#" class="nav__link ">MENU</a>
                  <a href="#" class="nav__link">BOOK NOW</a>
              </div>
          </ul>
      </a>
  </header>
  <main>
    <div class="row">
        <div class="col-menu">
            <br><br>
            <div align="center" class="page_content_panel" style="padding-bottom:0px;padding-top:0px;border-top:0px #efefef solid;margin-top:0px;">
                <div class="content_panel_special" style="display:inline-block;">
                <div class="login_full_panel" align="center">
                <div class="login_panel">
                <form name="login" action="reseting.php" method="post"> <input type="hidden" name="pid"> <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tbody><tr>
                <td class="login_heading special_font" align="center">Reset your password</td>
                </tr>
                <tr>
                <td class="fieldcontent_large" align="left">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tbody><tr>
                <td valign="top" class="main2" style="padding-top:0px;">
                <div class="input_title">E-Mail Address:</div>
                </td>
                </tr>
                <tr>
                <td align="left" style="padding:5px 0px 10px 0px;">
                <input type="text" name="email" class="loginField_box" required>
                </td>
                </tr>
                <tr>
                <td valign="top" class="main2" style="padding-top:0px;">
                <div class="input_title">Enter A New Password:</div>
                </td>
                </tr>
                <tr>
                <td align="left" style="padding-bottom:10px;">
                <input id="password01" type="password" name="password" class="passwordField_box" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                <tr class="showPass" style="padding-top: 5px;"><td  ><input type="checkbox" onclick="myFunction()" > Show Password</td></tr>
                </p>
                </td>
                </tr> 
                <tr>
                <td valign="top" class="main2" style="padding-top:0px;">
                <div class="input_title">Please Confirm Your Password:</div>
                </td>
                </tr>
                <tr>
                <td align="left" style="padding-bottom:10px;">
                <input id="password02" type="password" name="password2" class="passwordField_box" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                <tr class="showPass" style="padding-top: 5px;"><td  ><input type="checkbox" onclick="myFunction2()" > Show Password</td></tr>
                </p>
                </td>
                </tr>                      
                </tr>
                <tr>
                <td class="css_btnStyle" align="left">
                  <input type="submit" name="" class="full_button" value="Reset Password">
    
                </td>
                </tr>
                </tbody></table>
                </td>
                </tr>
                </tbody></table>
                </form>
                </div>
                <div class="break_space">&nbsp;</div>
                <div class="break_space">&nbsp;</div>
                <div class="break_space">&nbsp;</div>
                </div>
                </div>
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
  function myFunction() {
  var x = document.getElementById("password01");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function myFunction2() {
  var x = document.getElementById("password02");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
  </script>
