<?php 
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: loginpage.php");
  exit;
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
    <link rel="stylesheet" href="styles/profile.css">
    <link rel="stylesheet" href="style.css">
  </head>

  <body>    
    <!-- the sure delete or not -->
    <div id="id02" class="del" style="display: none;">
    <span style="width: 20px; z-index: 10002;" onclick="document.getElementById('id02').style.display='none'" class="close" title="Close">×</span>
      <div class="sub-page-del"> 
        <img src="images/profile/warning.png" style="width: 40px; height: 40px; align-item: center"><br>
        <div class="login_heading">Are you sure?</div>
         <div class="sub-page-del" style="align-items: center;">
          <p>Are you sure you want to delete your account? If you confirm you will be automatically log out and not able to access your
            account anymore.
          </p>
          <br><a href="delete.php" class="del-button" style="background-color: #f85149;">Yes</a>&nbsp;&nbsp;<a onclick="document.getElementById('id02').style.display='none'" class="del-button">No</a>
        </div> 
      </div> 
    </div>
    
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
            <div align="center" class="page_content_panel" style="padding-bottom:0px;padding-top:0px;border-top:0px #efefef solid;margin-top:0px;">
                <div class="content_panel_special" style="display:inline-block;">
                <div class="sub_page_content_panel2">
                <div class="pageHeading" align="center">My Account</div>
                <div class="heading_description" align="center">You can now view or change your account information here which includes your personal details, your shipping address and <br>newsletter subscription. You may view your order status here too.</div>
                <div class="break_space"></div>
                <div class="error_panel">
                <table border="0" width="100%" cellspacing="0" cellpadding="0">
                <tbody><tr>
                <td align="center"><table border="0" width="100%" cellspacing="0" cellpadding="2">
                <?php
                if(isset($_GET['action'])){
                  if($_GET['action'] == 'update_success'){
                  echo '<tbody><tr class="messageStackSuccess">
                  <td class="Success">Your account has been successfully updated.</td>
                  </tr>
                  </tbody>';}
                  elseif($_GET['action'] == 'update_password'){
                    echo '<tbody><tr class="messageStackSuccess">
                    <td class="Success">Your password has been successfully updated.</td>
                    </tr>
                    </tbody>';
                  }
                }
                ?>
              </table>
                </td>
                </tr>
                <tr>
                <td><img src="site_media/img/pixel_trans.gif" border="0" alt="" width="100%" height="10"></td>
                </tr>
                </tbody></table>
                </div>
                <div class="break_space"></div>
                <div class="account_panel" align="center">
                <div class="account_content_box">
                <img src="images/profile/user.svg" style="width: 40px; height: 40px;"><br>
                <div class="account_content">
                <table cellpadding="0" cellspacing="0" width="100%">
                <tbody><tr><td class="account_contentbox_heading">My Profile</td></tr>
                <tr><td class="account_contentbox_descp">View or change my account information including name, email address and contact number.</td></tr>
                <tr><td style="padding-top:10px;"><a href="updateprofile.php" class="css_wideBtn">Edit Details</a></td></tr>
                </tbody></table>
                </div>
                </div>
                <div class="account_content_box">
                <img src="images/profile/password.svg" style="width: 40px; height: 40px;"><br>
                <div class="account_content">
                <table cellpadding="0" cellspacing="0" width="100%">
                <tbody><tr><td class="account_contentbox_heading">Password Setting</td></tr>
                <tr><td class="account_contentbox_descp">Change your new account password.</td></tr>
                <tr><td style="padding-top:10px;"><a href="updatepass.php" class="css_wideBtn">Change Password</a></td></tr>
                </tbody></table>
                </div>
                </div>
                <div class="account_content_box">
                <img src="images/profile/image.png" style="width: 40px; height: 40px;"><br>
                <div class="account_content">
                <table cellpadding="0" cellspacing="0" width="100%">
                <tbody><tr><td class="account_contentbox_heading">My Account</td></tr>
                <tr><td class="account_contentbox_descp">Log out or delete your account.</td></tr>
                <tr><td style="padding-top:20px;"><a href="logout.php" class="css_wideBtn">Log Out</a></td></tr>
                <tr><td style="padding-top:20px;"><a onclick="document.getElementById('id02').style.display='block'" href="#" class="css_wideBtn">Delete Account</a></td></tr>
                </tbody></table>
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

