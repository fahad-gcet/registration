<?php include('server.php') ?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href=".">Profile Hub</a> -->
      <ul>
        <li><a class="navbar-brand" href=".">Profile Hub</a></li>
      </ul>
    </div>
    <?php
    if (isset($_SESSION['username'])) {
      ?>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="profile.php"><button type="button" class="btn btn-primary btn-block ">Edit Profile</button></a></li>
      <li><a href="index.php?logout=1"><button type="button" class="btn btn-danger btn-block " >Log Out</button></a></li>
      
      </ul>
      <?php
    } else {
    ?>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="login.php"><button type="button" class="btn btn-success btn-block ">Log In</button></a></li>
     <li><a href="register.php"><button type="button" class="btn btn-primary btn-block ">Sign Up</button></a></li>
      </ul>
      <?php } ?>


  
  </div><!-- /.container-fluid -->
</nav>