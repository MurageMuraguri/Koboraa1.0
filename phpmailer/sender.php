<?php
session_start();
require "../process\DB_connect.php";

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';

if (isset($_POST["submit"])){
    $body = mysqli_real_escape_string($conn, $_POST["body"]);
    $subject = mysqli_real_escape_string($conn, $_POST["subject"]);
    $buildingID = mysqli_real_escape_string($conn, $_POST["buildingID"]);
   
    $stuff_query="SELECT tenantEmail,tenantName FROM tenant where buildingID ='$buildingID' ";
    $result=mysqli_query($conn,$stuff_query);
  

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "koboraa@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "Muragepower1";
//Set who the message is to be sent from
$mail->setFrom('koboraa@gmail.com', 'Landlord');
//Set an alternative reply-to address
//$mail->addReplyTo('koboraa@gmail.com', 'Landlord');
//Set who the message is to be sent to
while($show_row = $result->fetch_assoc()) {
    $mail->addAddress($show_row['tenantEmail'],'');
    }

//Set the subject line
$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($body)."</br><b>Do not reply to this email</b>";
//Replace the plain text body with one created manually
$mail->AltBody = $body;
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    $_SESSION['mail']=1;
    $_SESSION['mailMessage']="<div class=\"alert alert-danger\" role=\"alert\">
    Reminders have not been sent out please try again!
  </div>";
  header("Location: ../reminder.php");
    //. $mail->ErrorInfo;
} else {
    $_SESSION['mail']=1;
    $_SESSION['mailMessage']="<div class=\"alert alert-success\" role=\"alert\">
    Reminders sent out successfully.
  </div>";
  header("Location: ../reminder.php");
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}
//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";
    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);
    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);
    return $result;
}
}
?>