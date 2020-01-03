
<?php
    require('controllers/UserController.php');
    $userObj = new UserController;
    $resultSet = $userObj->GetUser( $_GET['UserId'] );
    $user = $resultSet->fetch_assoc();
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

    <title>User Details - Isuru Motor Traders</title>

</head>

<body>
    
    <header>
        <?php require("header.php"); ?>
    </header>
        
    <div>

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
                <li class="breadcrumb-item active" aria-current="page">System User Details</li>
            </ol>
        </nav>

        <h2>Details of <em><?php echo $user['Username']; ?></em></h2>
        <br/>
        <div class='col-lg-3'>
        </div>
        <div class='col-lg-9'>
            <div class='card' style='width: 60rem;'>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">User Role</span>
                    </div>
                    <label class="form-control" aria-describedby="basic-addon1"><?php echo $user['Role']; ?></label>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Username</span>
                    </div>
                    <label class="form-control" aria-describedby="basic-addon1"><?php echo $user['Username']; ?></label>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">NIC</span>
                    </div>
                    <label class="form-control" aria-describedby="basic-addon1"><?php echo $user['NIC']; ?></label>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Name</span>
                    </div>
                    <label class="form-control" aria-describedby="basic-addon1"><?php echo $user['FirstName']." ".$user['LastName']; ?></label>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Gender</span>
                    </div>
                    <label class="form-control" aria-describedby="basic-addon1"><?php echo $user['Gender']; ?></label>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Date of Birth</span>
                    </div>
                    <label class="form-control" aria-describedby="basic-addon1"><?php echo $user['DOB']; ?></label>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Address</span>
                    </div>
                    <label class="form-control" aria-describedby="basic-addon1"><?php echo $user['Address']; ?></label>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Email</span>
                    </div>
                    <label class="form-control" aria-describedby="basic-addon1"><?php echo $user['Email']; ?></label>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Telephone</span>
                    </div>
                    <label class="form-control" aria-describedby="basic-addon1"><?php echo $user['Telephone']; ?></label>
                </div>
            </div>
        </div>
        
        <br/>

    </div>

</body>

</html>
