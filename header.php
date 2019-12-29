<?php
    require("controllers/HeaderController.php");

    if ( isset($_POST['logout']) ){
        $headerObj = new HeaderController;
        $headerObj->logout();
    }

?>

<!--<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand navbar-image" href="home.php"><img src="images/logo.jpg" alt="" width='80' height='80'></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <li> <a href="home.php"> <span class="glyphicon glyphicon-home"></span> </a> </li>
        <li> <a class="link" href="MySettings.php"> <span class="glyphicon glyphicon-cog"></span> My Settings </a> </li>
        <li class="navbar-brand">Signed in as </li>
        <li> <a class="link" href="index.php"> <span class="glyphicon glyphicon-log-out"></span> </a></li>
    </ul>
  </div>
</nav>-->

<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="home.php">
        <img src="images/logo.jpg" width="50" height="50" alt=""> Isuru Motor Traders
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav navbar-right">
            <li class="nav-item">
                <a class="nav-link" href="MySettings.php"> <span class='fas fa-users-cog'></span> Settings</a>
            </li>
            <?php
                if( $_SESSION['UserRole'] == 'Admin' ){
                    echo "<li class='nav-item'> <a class='nav-link' href='SystemConfiguration.php'> <span class='fas fa-tools'></span> Configure </a> </li> ";
                }
            ?>
        </ul>
        <form method="post" action="#" class="form-inline my-2 my-lg-0 text-right">
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" name='logout'> <span class='fas fa-sign-out-alt'></span> Sign Out</button>
        </form>
    </div>
</nav>
