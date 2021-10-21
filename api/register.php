<?php
require_once("../utils/config.php");
require_once("../utils/Api.php");
require_once("../utils/Database.php");
$api = new Api();

$data = $api->getBody();


// Api::status();
// Api::send($data);

$db = new Database();
if(!$db->connect()){
    $api->status(500);
    $api->addData("message", "database connection problem");
    $api->send();
    return;
}

$api->status(201);
$api->addData("token", uniqid());
$api->send();