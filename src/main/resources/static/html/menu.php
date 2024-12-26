<?php 
session_start();
$conn = new mysqli("localhost", "root", "", "gogocafe");
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GOGO Cafe</title>
        <link rel="icon" type="image/png" href="images/icon.png"/>
        
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap" rel="stylesheet"/>

        <!-- styles -->
        <link rel="stylesheet" href="styles/menu.css">
        <link rel="stylesheet" href="styles/topnavigation.css">
        <link rel="stylesheet" href="style1.css">
        <link rel="stylesheet" href="style.css">

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

        <!-- HEADER -->
        <header>
            <a>
                <img src="images/logo.png" class="logo">
                <ul class="nav">
                    <div class="nav__list">
                        <a href="home.php" class="nav__link">HOME</a>
                        <a href="menu.php" class="nav__link active">MENU</a>
                        <a href="book.php" class="nav__link">BOOK NOW</a>
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
            </a>
        </header>

        <main>    
        <!-- SHOP SECTION -->
        <div class="row">
            <div class="col-menu">
                <br>
                <!--coffee drink-->
                <h2>COFFEE DRINKS</h2><br>
                <div class="container">
                    <?php
                        $query = "SELECT * FROM menu WHERE menu_type = 1";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_array($result)) {?>
                        
                            <!-- BOX 1 -->
                            <div class="card">
                                <form method="post" action="menutry.php">
                                    <div class=imgBx>
                                        <img src="./images/<?= $row['menu_image']?>" alt="" class="product-img">
                                    </div>
                                    <div class="content">
                                        <br>
                                        <h2> Ingredients</h2>
                                        <p class="product-title"><?= $row['menu_ing']?></p>
                                    </div> 
                                </form>         
                            </div>
                    <?php }
                    ?>
                </div>

                <!--REFRESHING drink-->
                <h2>REFRESHING DRINKS</h2><br>
                <div class="container">
                    <?php
                        $query = "SELECT * FROM menu WHERE menu_type = 2";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_array($result)) {?>
                        
                            <!-- BOX 1 -->
                            <div class="card">
                                <form method="post" action="menutry.php">
                                    <div class=imgBx>
                                        <img src="./images/<?= $row['menu_image']?>" alt="" class="product-img">
                                    </div>
                                    <div class="content">
                                        <br>
                                        <h2> Ingredients</h2>
                                        <p class="product-title"><?= $row['menu_ing']?></p>
                                    </div> 
                                </form>         
                            </div>
                    <?php }
                    ?>
                </div>

                <!--CHOCOLATE drink-->
                <h2>CHOCOLATE DRINKS</h2><br>
                <div class="container">
                    <?php
                        $query = "SELECT * FROM menu WHERE menu_type = 3";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_array($result)) {?>
                        
                            <!-- BOX 1 -->
                            <div class="card">
                                <form method="post" action="menutry.php">
                                    <div class=imgBx>
                                        <img src="./images/<?= $row['menu_image']?>" alt="" class="product-img">
                                    </div>
                                    <div class="content">
                                        <br>
                                        <h2> Ingredients</h2>
                                        <p class="product-title"><?= $row['menu_ing']?></p>
                                    </div> 
                                </form>         
                            </div>
                    <?php }
                    ?>
                </div>

                <!--FRAPPE drink-->
                <h2>FRAPPE DRINKS</h2><br>
                <div class="container">
                    <?php
                        $query = "SELECT * FROM menu WHERE menu_type = 4";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_array($result)) {?>
                        
                            <!-- BOX 1 -->
                            <div class="card">
                                <form method="post" action="menutry.php">
                                    <div class=imgBx>
                                        <img src="./images/<?= $row['menu_image']?>" alt="" class="product-img">
                                    </div>
                                    <div class="content">
                                        <br>
                                        <h2> Ingredients</h2>
                                        <p class="product-title"><?= $row['menu_ing']?></p>
                                    </div> 
                                </form>         
                            </div>
                    <?php }
                    ?>
                </div>

                <!--PASTRIES-->
                <h2>PASTRIES</h2><br>
                <div class="container">
                    <?php
                        $query = "SELECT * FROM menu WHERE menu_type = 5";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_array($result)) {?>
                        
                            <!-- BOX 1 -->
                            <div class="card">
                                <form method="post" action="menutry.php">
                                    <div class=imgBx>
                                        <img src="./images/<?= $row['menu_image']?>" alt="" class="product-img">
                                    </div>
                                    <div class="content">
                                        <br>
                                        <h2> Ingredients</h2>
                                        <p class="product-title"><?= $row['menu_ing']?></p>
                                    </div> 
                                </form>         
                            </div>
                    <?php }
                    ?>
                </div>

                <!--PASTA drink-->
                <h2>PASTA DRINKS</h2><br>
                <div class="container">
                    <?php
                        $query = "SELECT * FROM menu WHERE menu_type = 6";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_array($result)) {?>
                        
                            <!-- BOX 1 -->
                            <div class="card">
                                <form method="post" action="menutry.php">
                                    <div class=imgBx>
                                        <img src="./images/<?= $row['menu_image']?>" alt="" class="product-img">
                                    </div>
                                    <div class="content">
                                        <br>
                                        <h2> Ingredients</h2>
                                        <p class="product-title"><?= $row['menu_ing']?></p>
                                    </div> 
                                </form>         
                            </div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
        <!-- link js -->
        <script src="book4.js"></script>
        </main>
    </body>
</html>