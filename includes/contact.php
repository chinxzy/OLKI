<?php
 $from ='Demo contact form <demo@domain.com>';

 $sendTo = 'Demo contact form <demo@domain.com>';

 $subject = ' New message from contac form';

 $fields = array( 'name' => 'Name', 'surname' =>'Surname', 'phone' => 'Phone', 'email' => 'Email', 'message' => 'Message');

$okMessage = 'Message delievered successfully. Thank you, we will get back to you soon.';

$errorMessage ='There was an error while submitting form';


error_reporting(E_ALL & E_NOTICE);
try {
    if(count($_POST)== 0) throw new \Exception('form is empty');

    $emailText = "You have a new message from your contact form\n==================================\n";

    foreach ($$_POST as $key => $value) {
        if (isset($fields[$key])){
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    $headers = array('Content-Type: text/plain; charset="UTF-8;',
    'From: ' . $from,
    'Reply-To: ' . $from,
    'Return-Path: ' . $from,
);

mail($sendTo, $subject, $emailText, implode("\n", $headers));

$responseArray = array('type' => 'success', 'message' => $okMessage);
}
 catch (\Throwable $th) {
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}


// if requested by AJAX request return JSON response
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
// else just display the message
else {
    echo $responseArray['message'];
}
?>