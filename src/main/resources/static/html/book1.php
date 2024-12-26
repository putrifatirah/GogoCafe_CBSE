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

    <!-- bootstrap link
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
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
            <div class="vstepperstep vstepperstep--active">
                <span class="vstepperstepstep primary">1</span>
                <div class="vstepper-label">Date & Venue</div>
            </div>
            <div class="vstepperstep vstepperstep--inactive">
                <span class="vstepperstepstep">2</span>
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
                            <div class="layout row wrap align-center justify-center">
                                <div class="flex text-xs-center pa-2 xs12 sm10 md7 lg4">
                                    <h1 class="font-weight-light">Welcome to GOGO Cafe</h1>
                                    <medium>Chilling, Better with Family and Friends</medium>
                                </div>
                            </div>
                            <form method="POST" action="booking1.php">
                              <div class=" center layout row wrap align-center justify-center">
                                <div class="center flex pa-2 xs12 sm10 md7 lg5 " style="margin: auto; width: 50%; padding: 10px;">

                                <select required class="arrow form-select form-select-lg" aria-label=".form-select-lg example" name="venued">
                                  
                                  <option selected >Select Venue</option>
                                    
                                    <?php
                                    // Array of venues
                                    $venues = array(
                                      "Midvalley Mall" => "Midvalley Mall",
                                      "Pavilion KL" => "Pavilion KL"
                                    );

                                    // Loop through the venpngues array to generate the options
                                    foreach ($venues as $value => $venue) {
                                      echo "<option value=\"$value\">$venue</option>";
                                    }
                                    ?>

                                  </select>
                                  </div>
                              </div>
                              <div class=" center layout row wrap align-center justify-center">
                                  <div class="center flex pa-2 xs12 sm10 md7 lg5 ">
                                    <input required type="date" class="form-select form-select-lg" aria-label=".form-select-lg example" name="bookdate">                                    
                                  </div>
                              </div>
                              <div class=" center layout row wrap align-center justify-center">
                                <a href="book.php">
                                  <button type="button" class="v-btn theme--light">
                                    <div class="v-btn__content">Back</div>
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