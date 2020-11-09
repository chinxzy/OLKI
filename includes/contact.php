<?php
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
      
    if($need == "Requset quotation") {
        $recipient = "chinxzypoet@gmail.com";
    }
    else if($need == "Request order status") {
        $recipient = "chinxzypoet@gmail.com";
    }
    else if($need == "Request copy of invoice") {
        $recipient = "chinxzypoet@gmail.com";
    }
    else if($need == "other") {
        $recipient = "chinxzypoet@gmail.com";
    }
    else {
        $recipient = "chinxzypoet@gmail.com";
    }
      
    $email_body .= "</div>";
 
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";
      
    if(mail($recipient, $email, $email_body, $headers)) {
        echo "<p>Thank you for contacting us, $name. You will get a reply within 24 hours.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
      
} else {
    echo '<p>Something went wrong</p>';
}
?>