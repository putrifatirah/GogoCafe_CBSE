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
    <link rel="stylesheet" href="styles/book5.css" />
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
            <!-- bootstrap link-->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  -->

    </head>
    <body style="font-family: Poppins, sans-serif;">
    
      <!-- The Modal -->
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
            <div class="vstepperstep vstepperstep--inactive">
                <span class="vstepperstepstep">2</span>
                <div class="vstepper-label">Select Time</div>
            </div>
            <div class="vstepperstep vstepperstep--inactive">
                <span class="vstepperstepstep">3</span>
                <div class="vstepper-label">Select Table</div>
            </div>
            <div class="vstepperstep vstepperstep--active">
                <span class="vstepperstepstep primary">4</span>
                <div class="vstepper-label">Confirmation</div>
            </div>
        </div>
        <div class="vstepperitems">
            <div class="vsteppercontent">
                <div class="vstepperwrapper">
                    <main>
                        <!-- content receiptt  -->
                        <div class="container" >
                          <head>
                            <h1 align = "center"> Confirmation</h1>
                          </head>
                                
                                <p>Thank you for your order! Here are the details:</p>
                          <table class=>
                          <?php
                            session_start();
                            $conn = new mysqli("localhost", "root", "", "gogocafe");

                            $orderNumber = $_SESSION['orderid'];                            

                            // Retrieve the row of data where order_number is equal to 1
                            $query = "SELECT * FROM bookinfo WHERE order_number = '$orderNumber'";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                              // Fetch the row of data
                              $row = mysqli_fetch_assoc($result);

                              $id = $row['id'];

                              $query1 = "SELECT * FROM member WHERE id = '$id'";
                              $result1 = mysqli_query($conn, $query1);
                              if (mysqli_num_rows($result1) > 0) {
                                // Fetch the row of data
                                $row1 = mysqli_fetch_assoc($result1);

                                 // Access the values
                              $venue = $row['venue'];
                              $date = $row['date'];
                              $CustName = $row1['firstN'] . " " . $row1['lastN'];
                              $tableno = $row['table_no'];
                              }                             

                              // // Do something with the retrieved data
                              // echo "Order Number: $orderNumber<br>";
                              // echo "Venue: $venue<br>";
                              // echo "Booking Date: $date<br>";
                              // echo "Customer Name: $CustName<br>";
                              // echo "Table Number: $tableno<br>";
                            } else {
                              echo "No rows found for the specified order number.";
                            }

                            ?>

                            <tr>
                              <th>Order Number:</th>
                              <td><?php echo $orderNumber?></td>
                            </tr>
                            <tr>
                              <th>Customer Name:</th>
                              <td><?php echo $CustName?></td>
                            </tr>
                            <tr>
                              <th>Venue:</th>
                              <td><?php echo $venue?></td>
                            </tr>
                            <tr>
                              <th>Booking Date:</th>
                              <td><?php echo $date?></td>
                            </tr>
                            <tr>
                              <th>Table number:</th>
                              <td><?php echo $tableno?></td>
                            </tr>
                          </table>
                          <h2>Order Details</h2>
                          <?php
                            //session_start();
                            $conn = new mysqli("localhost", "root", "", "gogocafe");

                            $orderNumber =  $_SESSION['orderid'];
                            $query = "SELECT menu_name, price, quantity, total_price FROM ordermenu WHERE order_number='$orderNumber'";
                            $result = mysqli_query($conn, $query);
                            // $data = json_decode(file_get_contents('php://input'), true);
                            // $totalamount = $data['total']; // Retrieve the output sent from JavaScript

                            // Check if the query was successful
                            if (mysqli_num_rows($result) > 0) {
                                // Start the table HTML markup
                                echo "<table>";
                                
                                // Create table headers
                                echo "<tr>";
                                echo "<th>Menu Name</th>";
                                echo "<th>Menu Price</th>";
                                echo "<th>Quantity</th>";
                                echo "<th>Total Price</th>";
                                echo "</tr>";
                                $totalPrice = 0;
                                    
                                // Loop through the query results and display data in table rows
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>".$row['menu_name']."</td>";
                                    echo "<td>RM".$row['price']."</td>";
                                    echo "<td>".$row['quantity']."</td>";
                                    echo "<td>RM".$row['total_price']."</td>";
                                    echo "</tr>";
                    
                                    $totalPrice += $row['total_price'];
                                }
                                
                                echo "<tr>";
                                echo "<td colspan='3'>Total Amount</td>";
                                echo "<td >RM".number_format($totalPrice, 2)."</td>";                              
                                echo "</tr>"; 
                                
                                // End the table HTML markup
                                echo "</table>";

                            }else{
                                header("Location: home.php");
                                exit;
                            }                          
                            
                            ?>
                        </div>
                        <div class=" center layout row wrap align-center justify-center">
                          <input type="checkbox" id="check">
                          
                            <button type="button" class="v-btn theme--light primary">
                              <label for="check"><div class="v-btncontent" style= "color: #fff;">Confirm</div></label>
                            </button>
                            <div class="alert_box" style="border-color:black">
                            <p>YOUR RESERVATION IS SUCCESSFUL!</p>
                            <p>THANK YOU</p>
                            <div class="btns">
                              <a href="home.php">
                                <button class="v-btn theme--light primary" for="check">
                                  <div class="v-btncontent" style= "color: #fff;">Back to Home Page</div>
                                </button>
                              </a>
                            </div>
                          </div>
                          <!-- <div class="alert_box">
                            <p>Are you sure you want to proceed with the resrvation?</p>
                            <div class="btns">
                              <button class="v-btn theme--light" for="check">No</button> 
                              <a href="book6.php">
                                <button class="v-btn theme--light primary" for="check">
                                  <div class="v-btncontent" style= "color: #fff;">Yes</div>
                                </button>
                              </a>
                            </div>
                          </div> -->
                          </a>                           
                        </div>
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