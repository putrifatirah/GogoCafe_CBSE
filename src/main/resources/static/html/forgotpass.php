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
    <link rel="stylesheet" href="styles/fp.css">
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
          <!--coffee drink-->
          <div align="center" class="page_content_panel" style="padding-bottom:0px;padding-top:0px;border-top:0px #efefef solid;margin-top:0px;">
            <div class="content_panel_special" style="display:inline-block;">
            <div class="break_space"></div><div class="break_space"></div>
            <div class="break_space"></div>
            <table border="0" width="100%" cellspacing="0" cellpadding="0">
            <tbody><tr>
            <td width="100%" valign="top" align="center" class="main_content"><form name="password_forgotten" action="emailpass.php" method="post"><table border="0" width="80%" cellspacing="0" cellpadding="0">
            <tbody><tr><td align="center">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <tbody><tr><td align="center">
            <table cellspacing="0" cellpadding="0">
            <tbody><tr><td class="panel_box" align="center">
            <table cellspacing="0" cellpadding="0">
            <tbody><tr><td class="pageHeading" colspan="3" align="center" style="padding-top:20px;">Password Forgotten</td></tr>
            <tr><td class="fieldcontent" align="center">If you've forgotten your password, enter your e-mail address <br>below and we'll send you an e-mail message containing your new password.</td></tr>
            <tr><td><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="5"></td></tr>
            <tr><td align="center">
            <table border="0" cellspacing="0" cellpadding="0">
            <tbody><tr><td align="center"><table border="0" width="100%" cellspacing="0" cellpadding="2">
            </table>
            </td></tr>
            <tr><td><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="15"></td></tr>
            <tr><td align="center">
            <table border="0" cellspacing="0" cellpadding="0">
            <tbody><tr><td align="center"><table border="0" width="100%" cellspacing="0" cellpadding="2">
            <tbody><tr class="error">
            <?php
              if(isset($_GET['action']) && $_GET['action'] == 'fail') 
                echo '<td class="error">Error: The E-Mail Address was not found in our records, please try again.</td>';
            ?>
            </tr>
            </tbody></table>
            </td></tr>
            </tbody></table>
            </td></tr>
            </tbody></table>
            </td></tr>
            <tr><td align="center" style="padding-top:10px;">
            <table border="0" cellspacing="0" cellpadding="0" width="50%">
            <tbody><tr>
            <td><input type="text" name="email" value="Enter Email Address" class="newsletter_subscribe" style="border:1px #dedede solid;" onfocus="if(this.value=='Enter Email Address'){this.value='';this.style.color='#6c6c6c';this.style.fontStyle='normal';}" onblur="if(this.value==''){this.value='Enter Email Address';this.style.color='#777';this.style.fontStyle='normal';}"></td></tr>
            <tr><td style="padding-top:10px;"><input type="submit" class="full_button" name="" value="Submit" style="width:100%;"></td>
            </tr>
            </tbody></table>
            </td></tr>
            <tr><td><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="25"></td></tr>
            </tbody></table>
            </td></tr>
            </tbody></table>
            </td></tr>
            </tbody></table>
            </td></tr>
            <tr><td class="defaultHeight"><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="150"></td></tr>
            </tbody></table></form></td>
            </tr>
            </tbody></table>
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
