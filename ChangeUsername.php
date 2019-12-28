<?php
    require("controllers/SettingController.php");

    if ( isset($_POST['updateUsernameBtn']) ){
        $settingObj = new SettingController;
        $settingObj->verifyUsername();
    }

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
    <script src="js/jQuery.js"></script>

    <title>Change Password - Isuru Motor Traders</title>
    
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
            <a href="#" class="list-group-item list-group-item-action list-group-item-info">Change My Username</a>
            <a href="ChangePassword.php" class="list-group-item list-group-item-action list-group-item-info">Change My Password</a>
            <a href="MyAccount.php" class="list-group-item list-group-item-action list-group-item-info">Update My Details</a>
        </div>
    </div>
    <div class="col-lg-10 text-left">
        <form method="post" action="#">
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">Current Username</span>
                        <input type="text" name="currentUsername" required class="form-control" aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">New Username</span>
                        <input type="text" name="newUsername" required class="form-control" aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group">
                        <button type="submit" name="updateUsernameBtn" value="Pay Now" class="btn btn-success">
                            <span class="glyphicon glyphicon-check" aria-hidden="false"> Change My Username</span>
                        </button>
                    </div> </br>
                </div>
            </div>
        </form>
    </div>

</body>

</html>
