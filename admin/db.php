<?php      
session_start();
    $host = "localhost";  
    $user = "tobecci";  
    $password = 'tobecci';  
    $db_name = "olki";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>