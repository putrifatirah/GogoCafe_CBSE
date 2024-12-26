<?php
session_start();
if(isset($_SESSION['email'])){
  header("Location: home.php");
}
?>
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
    <link rel="stylesheet" href="styles/signup.css">
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
          <nav role='navigation' style="padding-right: 2em;">
                <a href="#">
                    <img src="images/user.svg" style="width:29px;;max-width:29px;">
                </a>
          </nav>
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
                <form name="login" action="login.php" method="post"> <input type="hidden" name="pid"> <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tbody><tr>
                <td class="login_heading special_font" align="center">Member Login</td>
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
                <input type="text" name="email" class="loginField_box" value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email'];?>">
                <?php
                  if(isset($_GET['action']) && (($_GET['action'] == 'email_error') ||($_GET['action'] == 'mailpass_error')))
                  echo '<p class="error">Email field is empty</p>  ';
                ?>
                </td>
                </tr>
                <tr>
                <td valign="top" class="main2" style="padding-top:0px;">
                <div class="input_title">Password:</div>
                </td>
                </tr>
                <tr>
                <td align="left" style="padding-bottom:10px;">
                <input type="password" name="password" id="password01" class="passwordField_box">
                <tr style="padding-top: 5px;"><td  ><input type="checkbox" onclick="myFunction()" > Show Password</td></tr>
                <?php
                        if(isset($_GET['action']) && (($_GET['action'] == 'password_error')||($_GET['action'] == 'mailpass_error')))
                        echo '<p class="error">Password field is empty</p>  ';
                        ?>
                </p>
                </td>
                </tr>                           
                <td style="padding:5px 0px 10px 0px;" align="left"><a class="smalltext_link" href="forgotpass.php">Forgot Your Password?</a></td>
                </tr>
                <tr>          
                        <td align="right">
                          <table border="0" width="100%" cellspacing="0" cellpadding="2">          
                            <tbody>
                              <tr class="error">                              
                              <?php
                            if(isset($_GET['action']) && $_GET['action'] == 'login_error') 
                            echo '<td class="error">Error: Invalid Email Address and/or Password.</td>';
                              ?> 
                              </tr>   
                              <tr class="Success">
                              <?php
                            if(isset($_GET['action']) && $_GET['action'] == 'successpass') 
                            echo '<td class="Success">A reset password link has been sent to your email.</td>';
                              ?> 
                              </tr>       
                            </tbody>
                          </table>          
                        </td>          
                      </tr>   
                <tr>
                <td class="css_btnStyle" align="left">
                  <input type="submit" name="" class="full_button" value="Login">
    
                </td>
                </tr>
                <tr>
                <td align="center" style="padding-right:2px;"><a href="signup.php" class="css_btn_full2">Create Account</a></td>
                </tr>
                <tr>
                <td class="fieldcontent" align="center" style="padding-top:20px;"><img src="images/profile/password.svg" style="height: 20px; width: 20px; margin-bottom: -5px;"> GoGo Cafe is secure and your personal details are protected.</td>
                </tr>
                </tbody></table>
                </td>
                </tr>
                </tbody></table>
                </form>
                </div>
                <div class="new_customer_panel" style="display:none;">
                <table border="0" width="100%" cellspacing="0" cellpadding="0">
                <tbody><tr>
                <td class="login_heading" align="left">New Customer</td>
                </tr>
                <tr>
                <td class="fieldcontent_small" align="left">By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</td>
                </tr>
                <tr>
                <td class="fieldcontent_large" align="left"><a href="signup.php" class="css_btn">Create Account</a></td>
                </tr>
                <tr>
                <td align="left" class="fieldcontent_small"><img src="images/user.svg" class="create_account_img"></td>
                </tr>
                </tbody></table>
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