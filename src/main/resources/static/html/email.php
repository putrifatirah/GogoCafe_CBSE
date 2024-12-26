<?php
    //Include required phpmailer files
    require 'includes/PHPMailer.php';
    require 'includes/SMTP.php';
    require 'includes/Exception.php';

    //Define name spaces
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Create instance of phpmailer
    $mail = new PHPMailer();

    //Set mailer to use smtp
    $mail->isSMTP();

    //define smtp host
    $mail->Host = "smtp.gmail.com";

    //enable smtp authentication
    $mail->SMTPAuth = true;

    //set type of encryption (ssl/tls)
    $mail->SMTPSecure = "tls";

    //set port to connect smtp
    $mail->Port = "587";

    //set gmail username
    $mail->Username = "gogocafe2023@gmail.com";

    //set gmail password
    $mail->Password = "cvczvdiuxhpapmxe";
    
    //set gmail subject
    $mail->Subject = "Verify your account";

    //set sender email
    $mail->setFrom("gogocafe2023@gmail.com");

    //Email body
    $mail->Body = "This is a trying email";

    //Add recipient
    $mail->addAddress("umiariffah@gmail.com");

    //Send Email
    if($mail->Send()){
        echo "Email sent";
    }else{
        echo "error";
    }

    //Closing smtp connection
    $mail->smtpClose();


?>