<?php
session_start();

// Check if session variable 'email' is set
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $con = new mysqli("localhost", "root", "", "gogocafe");
    if ($con->connect_error) {
        die("Failed to connect: " . $con->connect_error);
    } else {
        $stmt = $con->prepare("SELECT * FROM member WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            $_SESSION['firstN'] = $data['firstN'];
            $_SESSION['lastN'] = $data['lastN'];
            $_SESSION['phone'] = $data['phone_no'];
        }
    }
} else {
    // Session not active, handle the case here
    // For example, redirect to the login page
    session_destroy();
    header("Location: home.php");
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
    <link rel="stylesheet" href="styles/updateprofile.css">
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
                <a href="profile.php">
                    <img src="images/user.svg" style="width:29px;;max-width:29px;">
                </a>
          </nav>
      </a>
  </header>
  <main>
    <div class="row">
        <div class="col-menu">
            <div align="center" class="page_content_panel" style="padding-bottom:0px;padding-top:0px;border-top:0px #efefef solid;margin-top:0px;">
                <div class="content_panel_special" style="display:inline-block;"><div class="sub_page_content_panel">
                <table border="0" cellspacing="0" cellpadding="0">
                <tbody><tr><td><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="20"></td></tr>
                <tr><td class="pageHeading" align="center">Update My Account</td></tr>
                <tr><td class="heading_description" align="center">You can now update your account details below.</td></tr>
                <tr><td><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="10"></td></tr>
                <tr>
                
                <td valign="top" align="center" class="main_content"><form name="account_edit" action="updatingprofile.php" method="post" onsubmit="return check_form(account_edit);"><input type="hidden" name="action" value="process"><input type="hidden" name="goto"><table border="0" width="80%" cellspacing="0" cellpadding="0">
                <tbody><tr><td class="maincontentbox">
                <table border="0" width="100%" cellspacing="0" cellpadding="0">
                <tbody><tr><td class="contentBox_heading_bg">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tbody><tr><td class="contentBox_heading">My Account Details</td>
                <td class="inputRequirement" align="right" width="130" style="border-bottom:0px #dedede solid">* Required information</td>
                </tr>
                </tbody></table>
                </td></tr>
                <tr><td class="fieldcontent" colspan="2">
                <table border="0" width="100%" cellspacing="0" cellpadding="0">
                <tbody><tr><td colspan="2">
                <table border="0" width="100%" cellspacing="0" cellpadding="0">
                <tbody><tr><td width="200" class="main2"><span class="inputRequirement">*</span>&nbsp;First Name:</td>
                </tr>
                <tr>
                <td class="Inner_fieldContent"><input type="text" name="firstname" value="<?php echo $_SESSION['firstN']; ?>"></td></tr>
                <tr><td class="main2"><span class="inputRequirement">*</span>&nbsp;Last Name:</td></tr>
                <tr>
                <td class="Inner_fieldContent"><input type="text" name="lastname" value="<?php echo $_SESSION['lastN']; ?>"></td></tr>
                <tr><td class="main2">E-Mail Address:</td>
                </tr>
                <tr>
                <td class="Inner_fieldContent"><?php echo $_SESSION['email']; ?></td></tr>
                <tr><td class="main2"><span class="inputRequirement">*</span>&nbsp;Contact Number:</td>
                </tr>
                <tr>
                <td class="Inner_fieldContent"><input type="text" name="telephone" value="<?php echo $_SESSION['phone']; ?>"></td></tr>
               
                <br><br>
                <td class="css_btnStyle"><a class="css_btn" href="profile.php">Back</a>&nbsp;<input type="submit" name="" class="shortbtn" value="Save Account"></td></tr>
                </tbody></table>
                </td></tr>
                </tbody></table>
                </td></tr>
                <tr><td colspan="2"><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="5"></td></tr>
                </tbody></table>
                </td></tr>
                <tr>
                <td class="defaultHeight"><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="10"></td>
                </tr>
                </tbody></table></form></td>
                
                </tr>
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
<script>
  // Get the modal
  var modal = document.getElementById('id01');
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  </script>
