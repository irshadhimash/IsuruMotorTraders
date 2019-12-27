<?php
    require("controllers/SettingController.php");

    $settingObj = new SettingController;
    $user = $settingObj->getUser();

    if( isset($_POST['updateBtn']) ){

        $settingObj = new SettingController;
        $settingObj->updateUser();

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

    <title>My Account - Isuru Motor Traders</title>
    
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
        <div class="panel panel-primary">
            <div class="panel-heading"> Edit account details</div>
            <div class="panel-body">
                <form method="post" action="#">
                    <div class="input-group mb-3">
                        <span class="input-group-addon">User Role</span>
                        <select name="role" class="form-control" disabled ?> >
                            <option value="System Admin" <?php if ($user['Role'] == 'System Admin') echo 'selected="selected"'; ?> > System Admin </option>
                            <option value="Employee" <?php if ($user['Role'] == 'Employee') echo 'selected="selected"'; ?> > Employee </option>
                            <option value="Customer" <?php if ($user['Role'] == 'Customer') echo 'selected="selected"'; ?> > Customer </option>
                            <option value="Trader" <?php if ($user['Role'] == 'Trader') echo 'selected="selected"'; ?> > Trader </option>
                        </select>
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">Username</span>
                        <input type="text" name="username" class="form-control" disabled value="<?php echo $user['Username']; ?>" aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">First Name</span>
                        <input type="text" name="fname" class="form-control" required value="<?php echo $user['FirstName']; ?>" aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">Last Name</span>
                        <input type="text" name="lname" class="form-control" required value="<?php echo $user['LastName']; ?>" aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">Prefered Name</span>
                        <input type="text" name="pname" class="form-control" required value="<?php echo $user['PreferedName']; ?>" aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon">Gender</span>
                        <select name="gender" class="form-control" >
                            <option value="Male" <?php if ($user['Gender'] == 'Male') echo 'selected="selected"'; ?> > Male </option>
                            <option value="Female" <?php if ($user['Gender'] == 'Female') echo 'selected="selected"'; ?> > Female </option>
                        </select>
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">Date of Birth</span>
                        <input type="date" name="dob" class="form-control" required value="<?php echo $user['DOB']; ?>" aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">Address</span>
                        <input type="text" name="address" class="form-control" value="<?php echo $user['Address']; ?>" aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">Email</span>
                        <input type="text" name="email" class="form-control" required value="<?php echo $user['Email']; ?>" aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">Telephone</span>
                        <input type="text" name="telephone" class="form-control" value="<?php echo $user['Telephone']; ?>" aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group">
                        <button type="submit" name="updateBtn" value="Pay Now" class="btn btn-success">
                            <span class="glyphicon glyphicon-check" aria-hidden="false"> Update My Details</span>
                        </button>
                    </div> </br>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
