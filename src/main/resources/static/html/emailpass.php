<?php
    $email = $_POST['email'];
    $con = new mysqli("localhost","root","","gogocafe");
    $body = '<table border="0" cellspacing="0" cellpadding="0" style="padding-bottom:20px;max-width:516px;min-width:220px;margin-left: auto; margin-right: auto">
    <tbody>
      <tr>
        <td width="8" style="width:8px"></td>
        <td>
          <div style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px" align="center" class="m_2690848758196573096mdv2rw">
            <div style="font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word">
              <div style="font-size:24px">Reset your password </div>
            </div>
            <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left">You are receiving this email because we received a password reset request for your account.<br><br>Click this button to reset your password:<br>
              <table align="center" width="100%" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;margin:30px auto;padding:0;text-align:center;width:100%"><tbody><tr>
  <td align="center" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
              <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box"><tbody><tr>
  <td align="center" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                          <table border="0" cellpadding="0" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box"><tbody><tr>
  <td style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                                      <a href="http://localhost:3000/html/resetpassword.php?email='.$email.'" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;border-radius:3px;color:#ffffff;display:inline-block;text-decoration:none;background-color:#7600bc;border-top:10px solid #7600bc;border-right:18px solid #7600bc;border-bottom:10px solid #7600bc;border-left:18px solid #7600bc" >Reset <span class="il">Password</span></a>
                                  </td>
                              </tr></tbody></table>
  </td>
                  </tr></tbody></table>
  </td>
      </tr></tbody></table><br>If you did not request a password reset, you can safely ignore this email.<br><br>Regards,<br>
  GoGoCafe
            </div>
          </div>
        </td>
        <td width="8" style="width:8px"></td>
      </tr>
    </tbody>
  </table>';

   // Include required PHPMailer files
   require 'includes/PHPMailer.php';
   require 'includes/SMTP.php';
   require 'includes/Exception.php';

   // Define namespaces
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;

   // Create an instance of PHPMailer
   $mail = new PHPMailer();

    $stmt = $con->prepare("select * from member where email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0) {
       // Set the mailer to use SMTP
   $mail->isSMTP();

   // Define the SMTP host
   $mail->Host = "smtp.gmail.com";

   // Enable SMTP authentication
   $mail->SMTPAuth = true;

   // Set the type of encryption (ssl/tls)
   $mail->SMTPSecure = "tls";

   // Set the port to connect to SMTP
   $mail->Port = "587";

   // Set the Gmail username
   $mail->Username = "gogocafe2023@gmail.com";

   // Set the Gmail password
   $mail->Password = "cvczvdiuxhpapmxe";
    
   // Set the Gmail subject
   $mail->Subject = "Reset password request";

   // Set the sender email
   $mail->setFrom("gogocafe2023@gmail.com");

   $mail->isHTML(true);

   // Set the email body
   $mail->Body = $body;

   // Add the recipient
   $mail->addAddress($email);

   // Send the email
   if($mail->Send()){
       header("Location: loginpage.php?action=successpass");
   } else {
       header("Location: home.php");
   }

   // Close the SMTP connection
   $mail->smtpClose();      

    }
    else{
      header("Location: forgotpass.php?action=fail");
    }
    
?>
