<?php
    require("controllers/SettingController.php");
?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <!-- BootStrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Main App Style -->
	<link rel="stylesheet" href="css/AppTheme_Main.css">
    <script src="js/bootstrap.js"></script>

    <title>My Settings - Isuru Motor Traders</title>
    
</head>

<body>

    <header>
        <?php require("header.php"); ?>
    </header>

    <br/>
    <ol class="breadcrumb">
        <li><a href="home.php">Home</a></li>
        <li class="active">My Settings</li>
    </ol>

    <h2>Hi <em><?php echo $_SESSION['PreferedName']; ?>! What do you want to do?</em></h2> <hr/>
    <div class="col-lg-2 text-center">
        <div class="list-group">
            <a href="ChangePassword.php" class="list-group-item list-group-item-action list-group-item-info">Change My Password</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-info">Update My Details</a>
        </div>
    </div>
    <div class="col-lg-10 text-left">
    </div>

</body>

</html>
