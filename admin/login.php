<?php

function redirectToLogin($error){
    $_SESSION["error"] = $error;
    header('location: ../login.php');
}

include('db.php');
session_start();
$username = $_POST['user'];
$password = $_POST['pass'];

if (isset($_POST['Login'])) {
    //to prevent from mysqli injection  
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);

    $sql = "select * from accounts where username = '$username'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    //if username is incorrect

    $db_password_hash = $row["password"];
    $passwordIsCorrect = password_verify($password, $db_password_hash);
    if(!$row || !$passwordIsCorrect){
        redirectToLogin("incorrect credentials");
    } elseif ($row && $passwordIsCorrect) {
                $_SESSION['user']= $username;
        header('location: index.php');
    }
    

    //set sessions and redirect to admin dashboard

 
}
