
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="home.php">Isuru Motor Traders</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <li class="navbar-brand">Hello <?php echo $_SESSION['PreferedName']; ?></li>
        <li class="navbar-brand"> <a href="SystemConfiguration.php">System Configuration</a> </li>
        <li class="navbar-brand"> <a href="index.php">Logout</a></li>
    </ul>
  </div>
</nav>

<br/>