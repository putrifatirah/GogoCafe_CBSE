<?php
session_start();
//echo $_SESSION['venue'];
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
    <?php if(isset($_GET['action'])){
    echo "<style>.modal{display: block}</style>";
    }?>
  </head>

  <body style="font-family: Poppins, sans-serif;">
    
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
    </a>
    </header>
    <main>
      <div class="box">
        <div class="vstepper theme--light">
        <div class="stepper-header">
            <div class="vstepperstep vstepperstep--inactive">
                <span class="vstepperstepstep">1</span>
                <div class="vstepper-label">Date & Venue</div>
            </div>
            <div class="vstepperstep vstepperstep--active">
                <span class="vstepperstepstep primary">2</span>
                <div class="vstepper-label">Select Time</div>
            </div>
            <div class="vstepperstep vstepperstep--inactive">
                <span class="vstepperstepstep">3</span>
                <div class="vstepper-label">Select Table</div>
            </div>
            <div class="vstepperstep vstepperstep--inactive">
                <span class="vstepperstepstep">4</span>
                <div class="vstepper-label">Confirmation</div>
            </div>
        </div>
        <div class="vstepperitems">
            <div class="vsteppercontent">
                <div class="vstepperwrapper">
                    <main>
                        <div class="vcontentwrap">
                          <br>
                          <div class="layout row wrap align-center justify-center">
                                <div class="flex text-xs-center pa-2 xs12 sm10 md7 lg4">
                                    <medium>GOGO Cafe</medium>
                                    <!-- akan display which venue collect data from php/database -->
                                    <!-- <form method="POST" action="book1.php"> -->
                                    <h1><?php
                                    // $selectedOption=$POST['venued'];
                                    // echo $selectedOption; ?></h1>
                                    <!-- </form> -->
                                </div>
                            </div>
                            <form method="POST" action="booking2.php">
                              <div class=" center layout row wrap align-center justify-center">
                                <div class="center flex pa-2 xs12 sm10 md7 lg5 ">
                                  <select class="arrow form-select form-select-lg" aria-label=".form-select-lg example" name="bookingtime">
                                    <option selected>Select Booking Time</option>
                                    <?php
                                      // Array of venues
                                      $booktimes = array(
                                        "1 p.m." => "1 p.m.",
                                        "3 p.m." => "3 p.m.",
                                      );

                                      // Loop through the venues array to generate the options
                                      foreach ($booktimes as $value => $booktime) {
                                        echo "<option value=\"$value\">$booktime</option>";
                                      }
                                    ?>
                                  </select>
                                </div>
                              </div>
                              <div class=" center layout row wrap align-center justify-center">
                                <a href="book1.php">
                                  <button type="button" class="v-btn theme--light">
                                    <div class="v-btncontent">Back</div>
                                  </button>
                                </a>
                                <button class="v-btn theme--light primary" >                                     
                                      <input type="submit" name="continue" value="CONTINUE" style="color: #fff;background-color:transparent;border-color:transparent"> 
                                    </button>                           
                              </div>
                          </form>
                    </main>
                </div>
            </div>
        </div>
        </div>

    </div>
    <script src="observer.js"></script>
  </main>
  
  </body>
   
</html>