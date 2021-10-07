<?php     
 
        include('db.php');  
        $username = $_POST['user'];  
        $password = $_POST['pass'];  
        $error = "username/password incorrect";
if (Isset($_POST['Login'])) {
         //to prevent from mysqli injection  
         $username = stripcslashes($username);  
         $password = stripcslashes($password);  
         $username = mysqli_real_escape_string($con, $username);  
         $password = mysqli_real_escape_string($con, $password);  
       
         $sql = "select *from accounts where username = '$username' and password = '$password'";  
         $result = mysqli_query($con, $sql);  
         $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
         $count = mysqli_num_rows($result);  
           
         if($count == 1){  
                $_SESSION['user']= $username;
                $_SESSION['pass']= $password;
             header('location: index.php');  
         }  
         else{
            $_SESSION["error"] = $error;
             header('location: ../login.php');
         } 
}

               
    ?>  