<?php

session_start();
$conn = new mysqli("localhost", "root", "", "gogocafe");

if(isset($_POST['add_to_cart'])){
    
    if(isset($_SESSION['cart'])){

        $session_array_id = array_column($_SESSION['cart'], "id");

        if(!in_array($_GET['id'], $session_array_id)){
            $session_array = array(
                'id' => $_GET['id'],
                'menu_name' => $_GET['menu_name'],
                'price' => $_GET['price'],
                'quantity' => $_GET['quantity'],
            );
        }
         
    }
    else{

        $session_array = array(
            'id' => $_GET['id'],
            'menu_name' => $_GET['menu_name'],
            'price' => $_GET['price'],
            'quantity' => $_GET['quantity'],
        );

        $_SESSION['cart'][] = $session_array;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GOGO Cafe</title>
        <link rel="icon" type="image/png" href="images/icon.png"/>

        <!-- box icons -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        
        <!-- styles -->
        <link rel="stylesheet" href="styles/book4.css">
        <link rel="stylesheet" href="styles/topnavigation.css">
       
    </head>

    <body style="font-family: Poppins, sans-serif;">
        <!-- HEADER -->
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
                    <!-- CART ICON -->
                    <i class='bx bx-shopping-bag' id="cart-icon" style="padding-right: 1em;"></i>

                <!-- CART  -->
                <div class="cart">
                    <h2 class="cart-title">Your Cart</h2>

                    <!-- CONTENT  -->
                    <div class="cart-content">
                    </div>


                    <!-- TOTAL  -->
                    <div class="total">
                        <div class="total-title">Total</div>
                        <div class="total-price">RM0</div>
                    </div>

                    <!-- BUY BUTTON  -->
                    <button type="button" class="btn-buy"> Buy Now</button>
                    
                    <!-- CART CLOSE  -->
                    <i class="bx bx-x" id="cart-close"></i>
                </div>
                </nav>
            </a>
            
        </header>

        <!-- SHOP SECTION -->
        <section class="shop container">
            <h2 class="section-title" style="font-weight: bold;">CHOOSE YOUR MENU</h2>

            <br><h3 class="section-subtitle" style="text-align: center;">COFFEE DRINKS</h3><br>
            <div class="shop-content">
            <?php
                $query = "SELECT * FROM menu WHERE menu_type = 1 AND availability = 'yes'";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_array($result)) {?>
                
                    <!-- BOX 1 -->
                    <div class="product-box">
                        <form method="post" action="indexes.php?id=<?$row['id']?>">
                            <img src="./images/<?= $row['menu_image']?>" alt="" class="product-img">
                            <h2 class="product-title"><?= $row['menu_name']?></h2>
                            <span class="product-price">RM<?= number_format($row['price'],2); ?></span>
                            <i class='bx bx-shopping-bag add-cart' id='add_to_cart'></i>
                        </form>
                    </div>
            <?php }
            ?>
            </div>

            <br><br><h3 class="section-subtitle" style="text-align: center;">NON-COFFEE DRINKS</h3>
            <br><h3 class="section-subtitle" style="text-align: center;">REFRESHING</h3><br>
            <div class="shop-content">
            <?php
                $query = "SELECT * FROM menu WHERE menu_type = 2 AND availability = 'yes'";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_array($result)) {?>
                
                    <!-- BOX 1 -->
                    <div class="product-box">
                        <form method="post" action="indexes.php?id=<?$row['id']?>">
                            <img src="./images/<?= $row['menu_image']?>" alt="" class="product-img">
                            <h2 class="product-title"><?= $row['menu_name']?></h2>
                            <span class="product-price">RM<?= number_format($row['price'],2); ?></span>
                            <i class='bx bx-shopping-bag add-cart' id='add_to_cart'></i>
                        </form>
                    </div>
            <?php }
            ?>
            </div>

            <br><h3 class="section-subtitle" style="text-align: center;">CHOCOLATE DRINKS</h3><br>
            <div class="shop-content">
            <?php
                $query = "SELECT * FROM menu WHERE menu_type = 3 AND availability = 'yes'";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_array($result)) {?>
                
                    <!-- BOX 1 -->
                    <div class="product-box">
                        <form method="post" action="indexes.php?id=<?$row['id']?>">
                            <img src="./images/<?= $row['menu_image']?>" alt="" class="product-img">
                            <h2 class="product-title"><?= $row['menu_name']?></h2>
                            <span class="product-price">RM<?= number_format($row['price'],2); ?></span>
                            <i class='bx bx-shopping-bag add-cart' id='add_to_cart'></i>
                        </form>
                    </div>
            <?php }
            ?>
            </div>
            
            <br><h3 class="section-subtitle" style="text-align: center;">FRAPPE</h3><br>
            <div class="shop-content">
            <?php
                $query = "SELECT * FROM menu WHERE menu_type = 4 AND availability = 'yes'";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_array($result)) {?>
                
                    <!-- BOX 1 -->
                    <div class="product-box" style="text-align: center;">
                        <form method="post" action="indexes.php?id=<?$row['id']?>">
                            <img src="./images/<?= $row['menu_image']?>" alt="" class="product-img">
                            <h2 class="product-title"><?= $row['menu_name']?></h2>
                            <span class="product-price">RM<?= number_format($row['price'],2); ?></span>
                            <i class='bx bx-shopping-bag add-cart' id='add_to_cart'></i>
                        </form>
                    </div>
            <?php }
            ?>
            </div>

            <br><h3 class="section-subtitle" style="text-align: center;">PASTRY</h3><br>
            <div class="shop-content">
            <?php
                $query = "SELECT * FROM menu WHERE menu_type = 5 AND availability = 'yes'";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_array($result)) {?>
                
                    <!-- BOX 1 -->
                    <div class="product-box" style="text-align: center;">
                        <form method="post" action="indexes.php?id=<?$row['id']?>">
                            <img src="./images/<?= $row['menu_image']?>" alt="" class="product-img">
                            <h2 class="product-title"><?= $row['menu_name']?></h2>
                            <span class="product-price">RM<?= number_format($row['price'],2); ?></span>
                            <i class='bx bx-shopping-bag add-cart' id='add_to_cart'></i>
                        </form>
                    </div>
            <?php }
            ?>
            </div>

            <br><h3 class="section-subtitle" style="text-align: center;">PASTA</h3><br>
            <div class="shop-content">
            <?php
                $query = "SELECT * FROM menu WHERE menu_type = 6 AND availability = 'yes'";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_array($result)) {?>
                
                    <!-- BOX 1 -->
                    <div class="product-box" style="text-align: center;">
                        <form method="post" action="indexes.php?id=<?$row['id']?>">
                            <img src="./images/<?= $row['menu_image']?>" alt="" class="product-img">
                            <h2 class="product-title"><?= $row['menu_name']?></h2>
                            <span class="product-price">RM<?= number_format($row['price'],2); ?></span>
                            <i class='bx bx-shopping-bag add-cart' id='add_to_cart'></i>
                        </form>
                    </div>
            <?php }
            ?>
            </div>

            
            
            
            </div>
        </section>

        <!-- link js -->
        <script src="book4.js"></script>
    </body>
</html>