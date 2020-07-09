<!DOCTYPE html>
<html>
 
  <?php include ('header.php');?>
  <body>
  <!--Nav-->

  <nav class="navbar navbar-expand-lg fixed-top">
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
          <a class="nav-link" href="about.php">About-Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gallery.php">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact-Us</a>
        </li>
      </ul>
    </div>
  </nav> 
  <!--/Nav-->

  <!--carousel-->
<?php include ("carousel.php");?>
  <!--/carousel-->

  
  <!--mission-->
      <?php include ("about_mission.php");?>
  <!--/misssion-->
      <?php include ("mini_services.php");?>

  <!--specialization-->
      <?php include ("spec.php");?>
  <!--/specialization-->

  <!--footer--> 
    <?php include ("footer.php");?>
  <!--/footer-->

  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src= 
"https://code.jquery.com/jquery-3.2.1.slim.min.js"> 
  </script> 
    <script src= 
"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"> 
  </script> 
    <script src= 
 "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"> 
  </script> 
  
<script src="main.js"></script>
  
  </body>
</html>