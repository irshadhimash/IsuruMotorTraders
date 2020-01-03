<?php
    require("controllers/UserController.php");

    $settingObj = new UserController;

    if( isset($_POST['addBtn']) ){
        $settingObj->AddUser();
    }

?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Main App Style -->
	 <link rel="stylesheet" href="css/AppTheme_Main.css">

    <title>Add User - Isuru Motor Traders</title>
    
</head>

<body>

    <header>
        <?php require("header.php"); ?>
    </header>

    <nav aria-label="breadcrumb">
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
            <li class='breadcrumb-item'><a href='SystemConfiguration.php'>System Configuration</a></li>
            <li class='breadcrumb-item'><a href='SystemUser.php'>System Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add New User</li>
        </ol>
    </nav>

    <div class="col-lg-10 text-left">
        <div class="card">
            <div class="card-body">
                <form method="post" action="#">
                    <div class="input-group mb-3">
                        <span class="input-group-addon">User Role</span>
                        <select name="role" class="form-control">
                            <option value="System Admin"> System Admin </option>
                            <option value="Employee"> Employee </option>
                            <option value="Customer"> Customer </option>
                            <option value="Trader"> Trader </option>
                        </select>
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">NIC</span>
                        <input type="text" name="nic" class="form-control" required aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">First Name</span>
                        <input type="text" name="fname" class="form-control" required aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">Last Name</span>
                        <input type="text" name="lname" class="form-control" required aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">Prefered Name</span>
                        <input type="text" name="pname" class="form-control" required aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon">Gender</span>
                        <select name="gender" class="form-control" >
                            <option value="Male"> Male </option>
                            <option value="Female"> Female </option>
                        </select>
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">Date of Birth</span>
                        <input type="date" name="dob" class="form-control" required aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">Address</span>
                        <input type="text" name="address" class="form-control" aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">Email</span>
                        <input type="email" name="email" class="form-control" required aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">Telephone</span>
                        <input type="text" name="telephone" class="form-control" aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">Username</span>
                        <input type="text" name="username" class="form-control" required aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">Password</span>
                        <input type="password" name="password" class="form-control" required aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">Confirm Password</span>
                        <input type="password" name="confirmedPassword" class="form-control" required aria-describedby="basic-addon1">
                    </div> </br>
                    <div class="input-group">
                        <button type="submit" name="addBtn" class="btn btn-success">
                            <span class='fas fa-plus'> Add User</span>
                        </button>
                    </div> </br>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
