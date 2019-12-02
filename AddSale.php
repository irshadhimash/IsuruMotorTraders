<?php
    require("controllers/AddSaleController.php");
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

    <title>Home</title>
    
</head>

<body>

    <header>
        <?php require("header.php"); ?>
    </header>

    <div class="well">

        <ol class="breadcrumb">
            <li><a href="home.php">Home</a></li>
            <li class="active">Add Sale</li>
        </ol>

        <div class="panel panel-primary">
            <div class="panel-heading">Add Items</div>
            <div class="panel-body">
                <form method="post" action="#">

                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">Vehicle No</span>
                        <input type="text" name="VehicleNoTxt" required class="form-control" placeholder="Format xx-xxxx" aria-describedby="basic-addon1">
                    </div> </br>

                    <div class="input-group">
                        <input type="submit" name="searchBtn" value="Add Vehicle" class="btn btn-success"/>
                    </div> </br>

                </form>
            </div>
            </div>

    </div>

<body>

</html>