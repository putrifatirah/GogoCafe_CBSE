<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge" /> -->
    <title>GOGO CAFE</title>
    <link rel="icon" type="image/png" href="images/icon.png"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap" rel="stylesheet"/>
    
      <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="acc.css" />
    
    <!-- <link rel="stylesheet" href="acc.css" />  -->

  </head>

  <body style="margin-top: 120px;">
		
    <header>
        <div>
            <img src="images/logo.png" class="logo">
            <ul class="nav">
            <div class="nav__list">
                <a href="managemenu.php" class="nav__link">MENU</a>
                <a href="manageacc.html" class="nav__link">ACCOUNT</a>
                <a href="managetable.php" class="nav__link active">BOOK</a>
            </div>	
            </ul>
	    </div>
        
    </header>

        <h1 class="text-center">BOOKING DETAILS</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">			
                        <div class="col-md-8">
                            <!-- Button trigger modal -->
                        </div>            
                        <div class="row" >
                            <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Order Number</th>
                                <th>Venue</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Table Number</th>
                                <th>Total Amount (RM)</th>
                                <th>Menu</th>
                                <th>Quantity</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td>1</td> 
                                    <td>1</td>
                                    <td>MidValley</td>
                                    <td>2023-6-17</td>
                                    <td>2 p.m.</td>
                                    <td>2</td>
                                    <td>16.00</td>
                                    <td> Spaghetti</td>
                                    <td> 1</td>
                                    <td>
                                        <a href="">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
          