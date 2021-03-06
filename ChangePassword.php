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

    <title>Change Password - Isuru Motor Traders</title>
    
</head>

<body>

    <header>
        <?php require("header.php"); ?>
    </header>

    <br/>
    <ol class="breadcrumb">
        <?php
            if ( $_SESSION['SystemRole'] == 'System Admin' || $_SESSION['SystemRole'] == 'Employee' ){ 
                echo ("
                <li class='breadcrumb-item'><a href='home.php'>Home</a></li>");
            }elseif( $_SESSION['SystemRole'] == 'Trader' ){
                echo ("
                <li class='breadcrumb-item'><a href='TraderPortal.php'>Home</a></li>");
            }elseif( $_SESSION['SystemRole'] == 'Customer' ){
                echo ("
                <li class='breadcrumb-item'><a href='CustomerPortal.php'>Home</a></li>");
            }
        ?>
        <li class="active">My Settings</li>
    </ol>

    <h2>Hi <em><?php echo $_SESSION['PreferedName']; ?>! What do you want to do?</em></h2> <hr/>
    <div class="col-lg-2 text-center">
        <div class="list-group">
            <a href="ChangeUsername.php" class="list-group-item list-group-item-action list-group-item-info">Change My Username</a>
            <a href="#" class="list-group-item list-group-item-action list-group-item-info">Change My Password</a>
            <a href="MyAccount.php" class="list-group-item list-group-item-action list-group-item-info">Update My Details</a>
        </div>
    </div>
    <div class="col-lg-10 text-left">
        <form method="post" action="#">
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">Current Password</span>
                        <input type="password" name="currentPW" required class="form-control" aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">New Password</span>
                        <input type="password" name="newPW" required class="form-control" aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">Confirm New Password</span>
                        <input type="password" name="confirmedPW" required class="form-control" aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group">
                        <button type="submit" name="changePWBtn" value="Pay Now" class="btn btn-success">
                            <span class="glyphicon glyphicon-check" aria-hidden="false"> Change Password</span>
                        </button>
                    </div> </br>
                </div>
            </div>
        </form>
    </div>

</body>

</html>

<?php

    if ( isset($_POST['changePWBtn']) ){

        if ( $_POST['newPW'] == $_POST['confirmedPW'] ){
            $settingObj = new SettingController;
            $settingObj->verify( $_POST['currentPW'], $_POST['confirmedPW'] );
        }else{
            echo ("<script type='text/javascript'> alert('New password and its confirmation must match');</script>");
        }
        
    }

?>
