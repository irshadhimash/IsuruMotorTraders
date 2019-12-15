
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <!--<img src="images/logo.jpg" width='15' height='15' />
      <a class="navbar-brand " href="#">Isuru Motor Traders</a>-->
      <a class="navbar-brand navbar-image" href="home.php"><img src="images/logo.jpg" alt="" width='80' height='80'></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <li> <a href="home.php"> <span class="glyphicon glyphicon-home"></span> </a> </li>
        <?php
          if( $_SESSION['UserRole'] == 'Admin' ){
            echo "<li> <a href='SystemConfiguration.php'> <span class='glyphicon glyphicon-wrench'></span> Configure </a> </li> ";
          }
        ?>
        <li> <a class="link" href="MySettings.php"> <span class="glyphicon glyphicon-cog"></span> My Settings </a> </li>
        <li class="navbar-brand">Signed in as <?php echo $_SESSION['PreferedName']; ?></li>
        <li> <a class="link" href="index.php"> <span class="glyphicon glyphicon-log-out"></span> </a></li>
    </ul>
  </div>
</nav>
