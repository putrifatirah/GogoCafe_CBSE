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
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="swiper-bundle.min.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="styles/home.css" />
    <link rel="stylesheet" href="styles/topnavigation.css" />
    <?php if(isset($_GET['action'])){
  echo "<style>.modal{display: block}</style>";
}?>
    
    <!-- lottie file animations -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

  </head>

  <body>
    
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
                    <a href="home.php" class="nav__link active">HOME</a>
                    <a href="menu.php" class="nav__link">MENU</a>
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
    <section class="home-intro">
      <!--image slider start-->
      <div class="slider">
        
        <div class="slides">
            <!--radio button start-->
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <input type="radio" name="radio-btn" id="radio4">
            <!--radio button end-->
            <!--slide image start-->
            <div class="slide first">
                <img src="./images/banner1.png" alt="">
            </div>
            <div class="slide">
                <img src="./images/banner2.png" alt="">
            </div>
            <div class="slide">
                <img src="./images/banner3.png" alt="">
            </div>
            <div class="slide">
                <img src="./images/banner4.png" alt="">
            </div>
            <!--slide imgaes end-->
        </div>
        <!--manual navigation start-->
        <div class="navigation-manual">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>
        </div>
        <!--manual navigation end-->
        <!--automatic navigation start-->
        <div class="navigation-auto">
          <div class="auto-btn1"></div>
          <div class="auto-btn2"></div>
          <div class="auto-btn3"></div>
          <div class="auto-btn4"></div>
      </div>
      <!--automatic navigation end-->
      </div>
      <!--image slider end-->

      <script type="text/javascript">
        var counter = 1;
        setInterval(function(){
            document.getElementById('radio'+counter).checked = true;
            counter++;
            if(counter>4){
                counter =1;
            }
        },5000);
      </script>
    </section>
  
  <!--Promotion section NEW-->
  <section id="blog">
    <!--heading-->
    <div class="blog-heading">
        <span>Our promotion</span>
        <h3>Recent promotion</h3>
    </div>

    <!--blog container-->
    <div class="blog-container">
        
        <!--box 1-->
        <div class="blog-box">
            
            <!--img-->
            <div class="blog-img"> 
                <img src="images/promo1.png" alt="promotion 1">
            </div>

            <!--text-->
            <div class="blog-text">
                <span>18 Mei 2023 / Buy 1 Free 1</span>
                <a href="promopostpage1.html" class="blog-title">Buy 1 Free 1</a>
                <p>Experience double the flavor and double the delight with our Buy 1, Get 1 Free promotion at Gogo Cafe! Indulge in your favorite dishes and get another one absolutely free. Limited time offer, so don't miss out on this irresistible deal!</p>
                <a href="promopostpage1.html">Read more</a>
            </div>
        </div>

        <!--box 2-->
        <div class="blog-box">
            
            <!--img-->
            <div class="blog-img"> 
                <img src="images/promo2.png" alt="promotion 2">
            </div>

            <!--text-->
            <div class="blog-text">
                <span>25 Mei 2023 / 10% off</span>
                <a href="promopostpage2.html" class="blog-title">10% off min spend RM50</a>
                <p>Great news! At Gogo Cafe, we're offering a fantastic promotion: Get 10% off your total bill with a minimum spend of RM50. Savor our delicious menu items while enjoying a generous discount. Simply use the voucher code "GGJIMAT20" during checkout to avail yourself of this exclusive offer. Hurry in and treat yourself today!</p>
                <a href="promopostpage2.html">Read more</a>
            </div>
        </div>

        <!--box 3-->
        <div class="blog-box">
            
            <!--img-->
            <div class="blog-img"> 
                <img src="images/promo3.png" alt="promotion 3">
            </div>

            <!--text-->
            <div class="blog-text">
                <span>21 April 2023 / Combo A</span>
                <a href="promopostpage3.html" class="blog-title">CRAZY DEALS Combo A</a>
                <p>Exciting news! Get ready for our Crazy Deals Combo A at Gogo Cafe! For a limited time, between 10-12pm and 4-6pm, you can enjoy a delightful combo of any pastry and any drink for only RM20. Indulge in your favorite treats and savor the perfect pairing. Don't miss out on this incredible offer—visit us during the specified hours and treat yourself to a delicious combo at an unbeatable price!</p>
                <a href="promopostpage3.html">Read more</a>
            </div>
        </div>

        <!--box 4-->
        <div class="blog-box">
            
          <!--img-->
          <div class="blog-img"> 
              <img src="images/promo4.png" alt="promotion 4">
          </div>

          <!--text-->
          <div class="blog-text">
              <span>21 April 2023 / Combo B</span>
              <a href="promopostpage4.html" class="blog-title">CRAZY DEALS Combo B</a>
              <p>Exciting news continues at Gogo Cafe! Introducing our Crazy Deals Combo B: a tantalizing offer you won't want to miss. For a limited time, between 10-12pm and 4-6pm, you can indulge in a delicious combo of any pasta dish and any drink for just RM25. Treat your taste buds to a satisfying pasta meal paired with your favorite beverage. Don't let this amazing deal pass you by—visit us during the specified hours and savor the Crazy Deals Combo B at an unbeatable price!</p>
              <a href="promopostpage4.html">Read more</a>
          </div>
        </div>

      <!--box 5-->
      <div class="blog-box">
            
        <!--img-->
        <div class="blog-img"> 
            <img src="images/promo5.png" alt="promotion 5">
        </div>

        <!--text-->
        <div class="blog-text">
            <span>21 April 2023 / Combo C</span>
            <a href="promopostpage5.html" class="blog-title">CRAZY DEALS Combo C</a>
            <p>Exciting news continues at Gogo Cafe! Introducing our Crazy Deals Combo C: a delightful offer that will satisfy your cravings. For a limited time, between 10-12pm and 4-6pm, you can enjoy a mouthwatering combo of any pasta dish and any pastry for just RM27. Indulge in the best of both worlds as you savor a delicious pasta and treat yourself to a delectable pastry. Don't miss out on this incredible deal—visit us during the specified hours and experience the Crazy Deals Combo C at an unbeatable price!</p>
            <a href="promopostpage5.html">Read more</a>
        </div>
      </div>

      <!--box 6-->
      <div class="blog-box">
            
        <!--img-->
        <div class="blog-img"> 
            <img src="images/promo6.png" alt="promotion 6">
        </div>

        <!--text-->
        <div class="blog-text">
            <span>22 April 2023 / Hari Raya Promotion</span>
            <a href="promopostpage6.html" class="blog-title">Hari Raya Promotion</a>
            <p>Celebrate Hari Raya in style with our special promotion at Gogo Cafe! Indulge in the mouthwatering Spaghetti Rendang, paired with any pastry of your choice, and enjoy a free drink under RM10. Experience the fusion of flavors as our signature rendang sauce complements the pasta perfectly. It's the ultimate Hari Raya treat! Don't miss out on this festive offer—visit Gogo Cafe today and immerse yourself in the delightful tastes of the season.</p>
            <a href="promopostpage6.html">Read more</a>
        </div>
      </div>
    </div>
  </section>
  
  <!--Product introduction/insight-->
  <section>


  </section>

  <!--About (Team)-->
  <section id="blog">
    <!--heading-->
    <div class="blog-heading">
      <span>Our team</span>
      <h3>Meet our team</h3>
    </div>

    <!--blog container-->
    <div class="blog-container">
        
        <!--box 1-->
        <div class="blog-box">
            
            <!--img-->
            <div class="blog-img"> 
                <img src="images/fatirah.png" alt="barista 3">
            </div>

            <!--text-->
            <div class="blog-text">
              <h1>Fatirah</h1>
              <p>Founder</p>
            </div>
        </div>

        <!--box 2-->
        <div class="blog-box">
            
            <!--img-->
            <div class="blog-img"> 
                <img src="images/syifaa (1).png" alt="barista 2">
            </div>

            <!--text-->
            <div class="blog-text">
                <h1>Syifaa</h1>
                <p>Manager</p>
            </div>
        </div>

        <!--box 3-->
        <div class="blog-box">
            
            <!--img-->
            <div class="blog-img"> 
                <img src="images/aina.png" alt="barista 1">
            </div>

            <!--text-->
            <div class="blog-text">
                <h1>Aina</h1>
                <p>Barista</p>
            </div>
        </div>

        <!--box 4-->
        <div class="blog-box">
            
          <!--img-->
          <div class="blog-img"> 
              <img src="images/mipah.png" alt="barista 4">
          </div>

          <!--text-->
          <div class="blog-text">
            <h1>Umi Arifah</h1>
            <p>Manager</p>
          </div>
        </div>

      <!--box 5-->
      <div class="blog-box">
            
        <!--img-->
        <div class="blog-img"> 
            <img src="images/rafiy.png" alt="barista 5">
        </div>

        <!--text-->
        <div class="blog-text">
          <h1>Rafiuddin</h1>
          <p>Barista</p>
        </div>
      </div>

      <!--box 6-->
      <div class="blog-box">
            
        <!--img-->
        <div class="blog-img"> 
            <img src="images/visa.png" alt="barista 6">
        </div>

        <!--text-->
        <div class="blog-text">
          <h1>Visa</h1>
          <p>Barista</p>
        </div>
      </div>
    </div>
  </section>

  <!--About (Location)-->
  <section id="blog">
    <!--
      <div class="home-about">
        <h2>About us</h2>
        <p>GOGO Cafe is a unique and vibrant establishment that goes beyond being just a regular coffee shop. It's a place where people can gather, connect, and make a positive impact on their community.</p>
        <br>
        <p>GOGO Cafe serves as a hub for community engagement and social awareness. It hosts events, workshops, and fundraisers that promote education, sustainability, and other important causes. By bringing people together, GOGO Cafe fosters a sense of belonging and inspires individuals to make a positive difference in their own lives and the lives of others.</p>
        <br>
        <p>In summary, GOGO Cafe is not just your average coffee shop. It's a place where customers can enjoy great food and beverages while actively contributing to making a positive impact in their community. It's a space that promotes generosity, compassion, and social responsibility, creating a ripple effect of change that reaches far beyond its walls.</p>
        
      </div>-->
    
      <!--heading-->
    <div class="blog-heading">
      <span>Location</span>
      <h3>Find nearest store</h3>
    </div>

    <div class="home-more-stuff">

      <div class="more-stuff-grid">
        <div class="slide-in from-left">
          <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_lgpzpyna.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
          <h1>GOGO Cafe – Pavilion KL</h1>
          <p>Lot No. OS301 , Level 3, Jln Bukit Bintang, Bukit Bintang, 55100 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</p>
        </div>
      </div>

      <div class="more-stuff-grid">
        <div class="slide-in from-right">
          <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_lgpzpyna.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
          <h1>GOGO Cafe – Midvalley Megamall</h1>
          <p>Lot G.15 & G.16. Lingkaran Syed Putra, Mid Valley City, 59200 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur.</p>
        </div>
      </div>
    </div>
  </section>
  
      
    </main>
    <script src="observer.js"></script>
    <!--Swiper js-->
    <script src="swiper-bundle.min.js"></script>
    <script src="swiper.js"></script>

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