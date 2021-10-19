<?php
function redirectToLogin($error){
    $_SESSION["error"] = $error;
    header('location: ../login.php');
}

include('db.php');
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
    if(!$row){
        redirectToLogin("incorrect credentials");
    }
    $db_password_hash = $row["password"];
    $passwordIsCorrect = password_verify($password, $db_password_hash);

    // if password is wrong
    if(!$passwordIsCorrect){
        redirectToLogin("incorrect credentials");
    }

    //set sessions and redirect to admin dashboard
    echo "password is correct, redirect to admin";
}
