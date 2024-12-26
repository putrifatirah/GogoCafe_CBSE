<?php
session_start();
$conn = new mysqli("localhost", "root", "", "gogocafe");

if($conn->error){
    header("Location: home.php");
    exit;
}else{

    $menutype = $_POST['menu-type'];
    $menuname = $_POST['menu-name'];
    $menuimage = $_POST['menu_image'];
    $menuingredient = $_POST['menu_ing']; 
    $menuprice = $_POST['menu_price']; 

    // Perform the update operation
    $query = "INSERT INTO menu (menu_type, menu_name, menu_image, menu_ing, price) VALUES ('$menutype', '$menuname', '$menuimage', '$menuingredient', '$menuprice')";
    $updateStmt = $conn->prepare($query);
    $updateStmt->execute();
    if($menuname!==""){
        header("Location: managemenu.php");
        exit;
    }

}
?>
