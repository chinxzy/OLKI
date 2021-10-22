<?php
session_start();
if(isset($_SESSION['user']!= $username))
{
    header('location: ../login.php');
    exit;
}

?>