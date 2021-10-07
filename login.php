<?php
session_start();
?>
<!DOCTYPE html>
<html>
 
  <?php include ('header.php');?>
  <body>
  <!--Nav-->

  <nav class="navbar navbar-expand-lg fixed-top">
  <img src="images/olki-logo1.png" alt="" class="img-fluid">
    <!-- Brand -->
    <a class="navbar-brand" href="#">OLKI</a>
  
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler ml-auto custom-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php"><i class="fa fa-home"></i>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php"><i class="fa fa-info"></i>About-Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gallery1.php"><i class="fa fa-images"></i>Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.php"><i class="fa fa-hands-helping"></i>Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php"><i class="fa fa-id-card"></i>Contact-Us</a>
        </li>
      </ul>
    </div>
  </nav> 
  <!--/Nav-->

 
 <form name="f1" action = "admin/login.php" onsubmit = "return validation()" method = "POST">

     <div class="login_wrapper ">

        <div class="login col-lg-12 col-md-12 col-sm-12">
            <div class="loginVector col-lg-6 col-md-6 col-sm-6">
                <img src="images/Project_55-01.jpg" alt="" class="img-fluid">
            </div>
            <div class="loginForm col-lg-6 col-md-6 col-sm-6">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group user">
                        <label for="form_name">Username *</label>
                        <input id ="user" name  = "user" type="text" class="form-control "  placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                     <div class="form-group pass">
                        <label for="form_password">password*</label>
                        <input type = "password" id ="pass" name  = "pass" class="form-control " placeholder="Please enter your password *" required="required" data-error="password is required.">
                        <div class="invalid-feedback"><?php echo $password_err; ?></div>
                    </div>
                </div>
                <div class="button">
                    <button class="btn" type =  "submit" id = "btn" value = "Login">Login</button>
                </div>
            </div>
        </div>
    </div>
    <?php
      if (isset($_SESSION["error"])) {
            $error = $_SESSION["error"];
            echo "<span>$error</span>";
      }
    ?>
 </form>

  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src= 
"https://code.jquery.com/jquery-3.2.1.slim.min.js"> 
  </script> 
  <script src="main.js"></script>
    <script src= 
"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"> 
  </script> 
    <script src= 
 "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"> 
  </script>
   <script src="assets/aos-master/dist/aos.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
  AOS.init({
    offset: 200,
        duration: 900,
        easing: 'ease-in-out-sine'
      });
    </script>
  </body>
</html>
<?php
  unset($_SESSION["error"]);
?>