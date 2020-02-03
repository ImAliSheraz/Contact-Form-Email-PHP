<?php
if(isset($_POST['fname'])) {$fname  = $_POST['fname'];}
if(isset($_POST['lname'])) {$lname  = $_POST['lname'];}
if(isset($_POST['email'])) {$email  = $_POST['email'];}
if(isset($_POST['subject'])) {$subject  = $_POST['subject'];}
if(isset($_POST['message'])) {$message  = $_POST['message'];}

// Email Body
$body = '<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <span>Hi! '.$fname.' you send us following Query:</span><br>
  <table border="1px solid" width="100%">
    <thead>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Subject</th>
      <th>Message</th>
    </thead>
    <tr>
      <td>'.$fname.'</td>
      <td>'.$lname.'</td>
      <td>'.$email.'</td>
      <td>'.$subject.'</td>
      <td>'.$message.'</td>
    </tr>
  </table><br>
  <span>we will contact you as soon as possible.</span>
</body>
</html>' ;

// Recipient Email 
$recipient_email = $email;

require 'class/class.phpmailer.php';
$mail = new PHPMailer;
$mail->IsSMTP();                
$mail->Host = 'smtp.gmail.com'; // Host Setting I Use Gmail Setting  
$mail->Port = '465';                
$mail->SMTPAuth = true;
$mail->Username = 'Email';    // Add Your Email Address      
$mail->Password = 'Password';         // Add Your Email Address Password
$mail->SMTPSecure = 'ssl';                  
$mail->FromName = 'Website Name';         // Website Name
$mail->AddAddress( $recipient_email, $recipient_email); 
$mail->AddCC('thealisheraz@outlook.com');  // Website Email That receive Query 
$mail->WordWrap = 2550;
$mail->IsHTML(true);       
$mail->Subject = $subject;
$mail->Body = $body;
if($mail->Send()) 
{
$message = '<label class="text-success">Details has been send successfully...</label>';
header('Location: contactus.html');
}
else{
echo "Error";
} ?>
