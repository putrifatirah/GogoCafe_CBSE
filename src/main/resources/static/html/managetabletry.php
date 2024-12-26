<?php
//session_start();
$conn = new mysqli("localhost", "root", "", "gogocafe");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database
$sql = "SELECT * FROM bookinfo"; // Replace 'your_table_name' with the actual table name in your database
$result = $conn->query($sql);

// Retrieve menu data from the database and synchronize it with the bookinfo table
$menuSql = "SELECT menu_name, quantity FROM ordermenu WHERE order_number = ?";
$menuStmt = $conn->prepare($menuSql);

// Prepare a separate statement to retrieve the order numbers from the bookinfo table
$orderNumberSql = "SELECT order_number FROM bookinfo";
$orderNumberResult = $conn->query($orderNumberSql);

// Create an associative array to store the menu data
$menuData = array();
if ($orderNumberResult->num_rows > 0) {
    while ($orderNumberRow = $orderNumberResult->fetch_assoc()) {
        $orderNumber = $orderNumberRow['order_number'];
        $menuStmt->bind_param("s", $orderNumber);
        $menuStmt->execute();
        $menuResult = $menuStmt->get_result();

        // Create an array to store the menu data for each order number
        $orderMenuData = array();
        if ($menuResult->num_rows > 0) {
            while ($menuRow = $menuResult->fetch_assoc()) {
                $orderMenuData[] = $menuRow; // Store menu data in the array
            }
        }

        // Store the menu data for the order number in the main array
        $menuData[$orderNumber] = $orderMenuData;
    }
}


$conn->close();
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
    <link rel="stylesheet" href="acc.css" /> 

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  </head>

  <body>
    <header>
      <div>
        <img src="images/logo.png" class="logo">
        <ul class="nav">
          <div class="nav__list">
            <a href="managemenu.html" class="nav__link">MENU</a>
            <a href="manageacc.html" class="nav__link">ACCOUNT</a>
            <a href="managetable.html" class="nav__link active">TABLE</a>
          </div>
        </ul>
      </div>
    </header>
    <main>
		<h2>MANAGE TABLE</h2>
		<table>
			<thead>
				<tr>
          <th width="8%">User ID</th>
					<th width="11%">Order Number</th>
					<th width="14%">Venue</th>
					<th width="8%">Date</th>
					<th width="8%">Time</th>
					<th width="11%">Table Number</th>
					<th width="13%">Total Amount (RM)</th>
					<th width="12%">Chosen Menu</th>
					<th width="15%">Edit</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if ($result->num_rows > 0) {
				    while ($row = $result->fetch_assoc()) {
				        echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
				        echo "<td>" . $row['order_number'] . "</td>";
				        echo "<td>" . $row['venue'] . "</td>";
				        echo "<td>" . $row['date'] . "</td>";
				        echo "<td>" . $row['book_time'] . "</td>";
				        echo "<td>" . $row['table_no'] . "</td>";
				        echo "<td>" . $row['total_amount'] . "</td>";
				        echo "<td>";
				        echo "<div class='popup1'>";
				        echo "Details";
				        echo "<div class='popup1-content'>";
				        echo "<span class='tooltip'><strong>List:</strong></span>";
				        echo "<table class='popup1-table'>";
                        echo "<thead>";
                        echo "<tr class='popup1-row'>";
                        echo "<th class='popup1-cell'>Menu</th>";
                        echo "<th class='popup1-cell'>Quantity</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        $orderNumber = $row['order_number']; // Assuming the column name in 'bookinfo' for the order number is 'order_number'
                        if (isset($menuData[$orderNumber])) {
                            foreach ($menuData[$orderNumber] as $menuRow) {
                                echo "<tr class='popup1-row'>";
                                echo "<td class='popup1-cell'>" . $menuRow['menu_name'] . "</td>";
                                echo "<td class='popup1-cell2'>" . $menuRow['quantity'] . "</td>";
                                echo "</tr>";
                            }
                        }
                        echo "</tbody>";
                        echo "</table>";
                        echo "</div>";
                        echo "</div>";
                        echo "</td>";
                        echo "<td>";
                        echo "<a class='tablenav' href='#'>Edit</a>";
                        echo "<a class='tablenav' href='#'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No data found</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </main>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

        </body>
    </html>
        