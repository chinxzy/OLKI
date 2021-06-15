<?php
require("../vendor/autoload.php");
require("../config.php");

// dummy content
// $_POST['name'] = "name";
// $_POST['surname'] = "surname";
// $_POST['email'] = "ojinakatochukwu@gmail.com";
// $_POST['need'] = "other";
// $_POST['message'] = "dummy message";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
var_dump($_POST);
// die();

if($_POST) {
    $name = "";
    $surname= "";
    $email = "";
    $need = "";
    $message = "";
    $email_body = "<div>";
      
    if(isset($_POST['name'])) { 
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>First Name:</b></label>&nbsp;<span>".$name."</span>
                        </div>";
    }
 
    if(isset($_POST['surname'])) {
        $name = filter_var($_POST['surname'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Last Name:</b></label>&nbsp;<span>".$surname."</span>
                        </div>";
    }

    if(isset($_POST['email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div>
                           <label><b>Visitor Email:</b></label>&nbsp;<span>".$email."</span>
                        </div>";
    }
      
      
    if(isset($_POST['need'])) {
        $need = filter_var($_POST['need'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Reason for contact:</b></label>&nbsp;<span>".$need."</span>
                        </div>";
    }
      
    if(isset($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
        $email_body .= "<div>
                           <label><b> Message:</b></label>
                           <div>".$message."</div>
                        </div>";
    }
    $visitor_email = $_POST['email'];
    $admin_email = "Olkielectromechanical@yahoo.co.uk";
    if($need == "Request quotation") {
        $recipient = $visitor_email;
    }
    else if($need == "Request order status") {
        $recipient = $visitor_email;
    }
    else if($need == "Request copy of invoice") {
        $recipient = $visitor_email;
    }
    else if($need == "other") {
        $recipient = $visitor_email;
    }
    else {
        $recipient = $visitor_email;
    }
      
    $email_body .= "</div>";
 
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";

    $visitorDetails = [
        "name" => $name,
        "surname" => $surname,
        "email" => $email,
        "need" => $need,
        "message" => $message,
    ];

    // var_dump($visitorDetails);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;               
        $mail->isSMTP();                         
        $mail->SMTPAuth   = true;                           
        $mail->Port       = $smtpConfig["outgoingImapPort"];                                   
        $mail->Host       = $smtpConfig["outgoingImapServer"];                     
        $mail->Username   = $smtpConfig["username"];
        $mail->Password   = $smtpConfig["password"];          
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    
        //Recipients
        $mail->From = $mail->Username;
        // $mail->setFrom($smtpConfig["username"], 'OLKI');
        $mail->addAddress($recipient);     //Add a recipient
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Thank You For Contacting Us';
        $mail->Body    = 'Your Message has been received';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        
        echo 'Message 1 has been sent';
        
        $mail->ClearAllRecipients();
        $mail->addAddress($admin_email);     //Add a recipient
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = $email_body;
        $mail->AltBody = $mail->Body;
        $mail->send();
        echo 'Message 2 has been sent';
    } catch (Exception $e) {
         echo "Message could not be sent";
        // "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
      
} else {
    echo '<p>Something went wrong</p>';
}
?>