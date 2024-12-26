<?php
session_start();
require_once("connection.php");

if (isset($_GET['GetID'])) {
    $getID = $_GET['GetID'];

    $query = "SELECT * FROM member WHERE id = ? LIMIT 1";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $getID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $firstname = $row['firstN'];
        $lastname = $row['lastN'];
} 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GOGO CAFE</title>
    <link rel="icon" type="image/png" href="images/icon.png"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="updateprofileadmin.css"> 
</head>
<body>
    <header>
        <a>
            <img src="images/logo.png" class="logo">
            <ul class="nav">
                <div class="nav__list">
                    <a href="menuavailability.html" class="nav__link">MENU</a>
                    <a href="manageacc.php" class="nav__link ">ACCOUNT</a>
                    <a href="rafi.html" class="nav__link">TABLE</a>
                </div>
            </ul>
            <nav role='navigation' style="padding-right: 2em;">
                <a href="profile.html">
                    <img src="images/user.svg" style="width:29px;;max-width:29px;">
                </a>
            </nav>
        </a>
    </header>
    <main>
        <div class="row">
            <div class="col-menu">
                <div align="center" class="page_content_panel" style="padding-bottom:0px;padding-top:0px;border-top:0px #efefef solid;margin-top:0px;">
                    <div class="content_panel_special" style="display:inline-block;">
                        <div class="sub_page_content_panel">
                            <table border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="20"></td>
                                    </tr>
                                    <tr>
                                        <td class="pageHeading" align="center">Update User Account</td>
                                    </tr>
                                    <tr>
                                        <td class="heading_description" align="center">You can now update user account details below.</td>
                                    </tr>
                                    <tr>
                                        <td><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="10"></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" align="center" class="main_content">
                                            <form action="update.php" method="post">
                                                <input type="hidden" name="action" value="process">
                                                <input type="hidden" name="goto">
                                                <table border="0" width="80%" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="maincontentbox">
                                                                <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="contentBox_heading_bg">
                                                                                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="contentBox_heading">User Account Details</td>
                                                                                            <td class="inputRequirement" align="right" width="130" style="border-bottom:0px #dedede solid">* Required information</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="fieldcontent" colspan="2">
                                                                                <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td colspan="2">
                                                                                                <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td width="200" class="main2"><span class="inputRequirement">*</span>&nbsp;User ID:</td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td class="Inner_fieldContent"><input type="number" name="id" value="<?php echo $id ?>"></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td class="main2"><span class="inputRequirement">*</span>&nbsp;First name:</td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td class="Inner_fieldContent"><input type="text" name="firstN" value="<?php echo $firstname?>"></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td class="main2"><span class="inputRequirement">*</span>&nbsp;Last name:</td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td class="Inner_fieldContent"><input type="text" name="lastN" value="<?php echo $lastname?>"></td>
                                                                                                        </tr>
                                                                                                        <td class="css_btnStyle">

                                                                                                        
                                                                                                            <a class="css_btn" href="manageacc.php">Back</a>&nbsp;<input type="submit" name="update" class="css_btn" value="Save">
                                                                                                            
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="5"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="defaultHeight"><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="10"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</main>

<footer>
</footer>

</body>
</html>
