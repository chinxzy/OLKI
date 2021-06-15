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
    $tempReciever = "ojinakatochukwu@gmail.com";
    if($need == "Request quotation") {
        $recipient = $tempReciever;
    }
    else if($need == "Request order status") {
        $recipient = $tempReciever;
    }
    else if($need == "Request copy of invoice") {
        $recipient = $tempReciever;
    }
    else if($need == "other") {
        $recipient = $tempReciever;
    }
    else {
        $recipient = $tempReciever;
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
        $mail->SMTPDebug = SMTP::DEBUG_CONNECTION;               
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
        $mail->addAddress($tempReciever, 'Temp Reciever');     //Add a recipient
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'OLKI Contact Form';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        // echo "Message could not be sent";
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
      
} else {
    echo '<p>Something went wrong</p>';
}
?>