<?php

class Database{

    private $databaseDefaults = [
        "host"=>"localhost",
        "name"=>"olki",
        "username"=>"tobecci",
        "password"=>"tobecci"
    ];

    private $connection = null;

    public function __construct($host=null, $db=null, $user=null, $password=null)
    {
        //if no arguments are passed
        if(!$host)
        {
            return;
        }

        $this->databaseDefaults["host"] = $host;
        $this->databaseDefaults["name"] = $db;
        $this->databaseDefaults["username"] = $user;
        $this->databaseDefaults["password"] = $password;
    }

    public function connect()
    {
        try {
            $conn = new PDO("mysql:host=".$this->databaseDefaults["host"].";dbname=".$this->databaseDefaults["name"], 
            $this->databaseDefaults["username"], 
            $this->databaseDefaults["password"]);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection = $conn;
            error_log("Database connection successful");
            return true;
          } catch(PDOException $e) {
            error_log("[:: DB CONNECTION ERROR ::] ". $e->getMessage());
            return false;
          }
    }
    
}