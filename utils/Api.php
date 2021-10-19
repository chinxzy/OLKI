<?php

class Api{
    public $data = []; 
    
    public function send()
    {
        header("Content-Type: application/json");
        $dataJson = json_encode($this->data);
        echo $dataJson;
    }

    public function getBody()
    {
        $bodyJson = file_get_contents("php://input");
        $bodyDecoded = json_decode($bodyJson);
        return $bodyDecoded;
    }

    public function status($code)
    {
        header("HTTP/1.1 ". $code);
    }

    public function addData($name, $content)
    {
        $this->data[$name] = $content;
    }
}