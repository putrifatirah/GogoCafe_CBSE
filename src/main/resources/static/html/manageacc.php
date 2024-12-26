<?php

require_once('connection.php');
$query = "select * from member";
$result = mysqli_query($con,$query);

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
    <link rel="stylesheet" href="styleadmin.css" /> 
  </head>

  
  <body>
    
    <header>
      <div>
        <img src="images/logo.png" class="logo">
        <ul class="nav">
          <div class="nav__list">
            <a href="managemenu.php" class="nav__link">MENU</a>
            <a href="manageacc.php" class="nav__link active">ACCOUNT</a>
            <a href="managetable.php" class="nav__link">TABLE</a>
          </div>
        </ul>
        
        
    
              <!--
              Too bad the menu has to be inside of the button
              but hey, it's pure CSS magic.
              -->
            
          </div>
        </nav>
      </div>
    </header>
    <main>
      <div class="row">
        <!--<div class="col-directory">
          <li>
            <h4>mama</h4>
          </li>
        </div>-->
        
        <div class="col-menu">
          <br> <br> <br> <br> <br>
          <!--coffee drink-->
          <h2>MANAGE ACCOUNT</h2>
          <div class="container" >
            <table>
                <tr>
                  <th>User ID</th>
                  <th>First name</th>
                  <th>Last name</th>
                  <th>Email</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                <tr>
                  <?php

                  while($row = mysqli_fetch_assoc($result))
                  {
                    $id=$row['id'];
                    $firstname=$row['firstN'];
                    $lastname=$row['lastN'];
                    $email=$row['email'];

                    ?>
                    <tr>
                      <td><?php echo $id ?></td>
                      <td><?php echo $firstname ?></td>
                      <td><?php echo $lastname ?></td>
                      <td><?php echo $email ?></td>
                      <td><a class = "tablenav" href="editacc.php?GetID=<?php echo $id ?>">Edit</a></td>
                      <td><a class="tablenav" href="#" onclick="confirmDelete(<?php echo $id ?>)">Delete</a></td>

                      <script>
                      function confirmDelete(id) {
                      var confirmDelete = confirm("Are you sure you want to delete the account?");
                      if (confirmDelete) {
                      window.location.href = "deleteacc.php?Del=" + id;
                      }
                     }
                    </script>
                    </tr>
                  <?php
                  }

                   ?>
                <!-- Add more rows for additional user accounts -->
              </table>
          </div>
            
              <!-- Add form elements for adding new user accounts or searching for existing accounts -->
            
            </main>
            </body>
            </html>
            
