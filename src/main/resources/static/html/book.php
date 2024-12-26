<?php
session_start();
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
    
    <link rel="stylesheet" href="styles/topnavigation.css" />
    <link rel="stylesheet" href="book.css" />
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <!-- alertmessage  -->
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <style>
      .row {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(-1 * var(--bs-gutter-y));
    margin-right: calc(-.5 * var(--bs-gutter-x));
    margin-left: calc(-.5 * var(--bs-gutter-x));
}

.container, .container-md, .container-sm {
    max-width: 720px;
}

.col {
    flex: 1 0 0%;
}

.container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
    width: 100%;
    padding-right: var(--bs-gutter-x,.75rem);
    padding-left: var(--bs-gutter-x,.75rem);
    margin-right: auto;
    margin-left: auto;
}

.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    margin-top: 0;
    margin-bottom: 0.5rem;
    font-weight: 500;
    line-height: 1.2;
}

.h1, h1 {
    font-size: calc(1.375rem + 1.5vw);
}

.row>* {
    flex-shrink: 0;
    width: 100%;
    max-width: 100%;
    padding-right: calc(var(--bs-gutter-x) * .5);
    padding-left: calc(var(--bs-gutter-x) * .5);
    margin-top: var(--bs-gutter-y);
}
    </style>
    <?php if(isset($_GET['action'])){
  echo "<style>.modal{display: block}</style>";
}?>
  </head>


  <body style="font-family: Poppins, sans-serif;">
   
    <!-- The Modal -->
    <div id="id01" class="modal">
      <span style="width: 20px; z-index: 10002;" onclick="document.getElementById('id01').style.display='none'"
      class="close" title="Close">&times;</span>

      <!-- Modal Content -->
      <div class="sub-page-content">
        <div class="header_login_panel">
          <form name="login" action="login.php" method="post" id="login_form"> 
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
              <tbody>
                <tr>
                  <td class="login_heading" align="center">Member Login</td>
                </tr>
                <tr>
                  <td style="padding-top:10px;font-weight:500;" align="center">If you have an account with us, please log in.</td>
                </tr>
                <tr>
                  <td><img src="simages/pixel_trans.gif" border="0" alt="" width="100%" height="10"></td>
                </tr>
                <tr>
                  <td align="center" style="padding-top:5px;">
                  <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tbody>
                      <tr>
                        <td class="main2">Email Address:</td>
                      </tr>
                      <tr>
                        <td align="center" style="padding:5px 0px 10px 0px;">
                        <input type="text" name="email" class="loginField_box" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}?>">
                        <?php
                        if(isset($_GET['action']) && (($_GET['action'] == 'email_error') ||($_GET['action'] == 'mailpass_error')))
                        echo '<p class="error">Email field is empty</p>  ';
                        ?>
                        </td>
                      </tr>
                      <tr>
                        <td class="main2">Password:</td>
                      </tr>          
                      <tr>
                        <td align="center" style="padding-bottom:5px;">
                        <input type="password" name="password" id="password01" class="passwordField_box">
                        <tr style="padding-top: 5px;"><td  ><input type="checkbox" onclick="myFunction()" > Show Password</td></tr>
                        <?php
                        if(isset($_GET['action']) && (($_GET['action'] == 'password_error')||($_GET['action'] == 'mailpass_error')))
                        echo '<p class="error">Password field is empty</p>  ';
                        ?>
                        </td>
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
                            </tbody>
                          </table>          
                        </td>          
                      </tr>          
                      <tr>
                        <td class="css_btnStyle" align="center" style="padding-top: 5px;">
                        <input type="submit" id="login_submit" name="submit" class="full_button" value="Login">
                        <p class="success"></p>
                        </td>
                      </tr>          
                      <tr>
                        <td colspan="2"><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="1"></td>
                      </tr>          
                      <tr>

                      
                        <td style="padding:5px 0px 10px 0px;" align="center"><a class="smalltext_link" href="forgotpass.php">Forgot Your Password?</a></td>
                      </tr>          
                    </tbody>
                  </table></td>
                </tr>          
              </tbody>
            </table>
            </form>
      </div>
      <div class="header_new_customer_panel">
            <table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tbody>
                <tr><td class="login_heading" align="center" style="padding-top:40px;">New Customer</td></tr>            
                <tr><td class="" align="center" style="padding-top:10px;font-weight:500;">By creating an account with us, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</td></tr>
                <tr><td><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="10"></td></tr>
                <tr><td class="css_btnStyle" align="center"><a href="signup.php" class="css_btn_full">Sign Up</a></td></tr>
              </tbody>
            </table>            
          </div>
        </div>
    </div>
    <header>
      <a>
        <img src="images/logo2.png" class="logo">
        <ul class="nav">
            <div class="nav__list">
                <a href="home.php" class="nav__link">HOME</a>
                <a href="menu.php" class="nav__link">MENU</a>
                <a href="book.php" class="nav__link active">BOOK NOW</a>
            </div>
        </ul>
        <nav role='navigation' style="padding-right: 2em;">
        <?php
                      if(!isset($_SESSION['email'])){
                        $javascript = "document.getElementById('id01').style.display='block'";
                        echo '<a onclick="'.$javascript.'" href="#"><img src="images/user.svg" style="width:29px;max-width:29px;"></a>';
                        }
                      else{
                        $profileurl = 'profile.php';
                        $imgurl = 'images/user.svg';
                        echo '<a href="'.$profileurl.'"><img src="'.$imgurl.'" style="width:29px;max-width:29px;"></a>';                       
                      }
                    ?>
                    </nav>
    </header>

    <main>
      <div class="container" style="background-color: #ffffffa1;">
        <br>
        <div class="row align-items-center">
          <div class="col">
            <h1 >MAKE</h1>
            <h1 >YOUR</h1>
            <h1 >RESERVATION</h1>
            <h1 >NOW</h1>
          </div>
          <div class="col">
            <!-- <a href="book1.html">
                <img src="./images/next.png" style="height: 70px; width: 70px;">
            </a> -->
          
            <?php 
            if(!isset($_SESSION['email'])){
              $javascript = "document.getElementById('id01').style.display='block'";
              echo ' <input type="checkbox" id="check">
              <label for="check"><img src="./images/next.png" style="height: 70px; width: 70px; cursor: pointer;"></label><div class="alert_box">
              <p>To make a reservation, you need to be logged in first.</p>
              <div class="btns">
                <label for="check">Cancel</label> 
                <a onclick="'.$javascript.'" href="#" id="profile_link" class="headerlink_img header_profile_link">
                  <label for="check">Login</label>
                </a>
              </div>
            </div>';
              }
            else{
              $imgurl = 'images/user.svg';
              echo '<a href="book1.php"><img src="./images/next.png" style="height: 70px; width: 70px;">';                       
            }         
            ?>     
            
        </div>
        <br>
      </div>

      <!-- <div class="v-card theme--light black">
        <div class="layout align-center">
          <div class="left">
            <img src="" alt="gogo">
          </div>
          <div class="center pt-3 pb-3">
            <h1 class="white--text" style="text-align: left;">seoul garden</h1>
            <h3 class="white--text" style="text-align: left;">chilling, Better with Family and Friends</h3>
          </div>
          </div>
          <div class="spacer"></div>
          <div class="pr-4 right pl-2">
            <a href="book1.html" class="v-btn v-btn--floating theme--light white">
              <div class="vbtn__content">
                <i aria-hidden="true" class="v-icon material-icons theme--light">Continue</i>
              </div>
            </a>
          </div>
        </div>
      </div> -->
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