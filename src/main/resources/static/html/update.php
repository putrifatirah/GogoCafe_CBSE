<?php
session_start();
require_once('connection.php');

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $firstname = $_POST['firstN'];
    $lastname = $_POST['lastN'];

    $query = "UPDATE member SET firstN = '$firstname', lastN = '$lastname' WHERE id = '$id'";

    $result = mysqli_query($con, $query);

    if($result){
        header("Location: manageacc.php");
        exit; // Make sure to add an exit statement after redirecting
    }
    else {
        echo 'Please check';
    }
}
    else{
        header("Location: editacc.php");
    }

?>