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
  
  <!--form-->
      <?php include ("contact_form.php");?>
  <!--/form-->
    
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
  <script src="inlcudes/contact.js"></script>
  </body>
</html>