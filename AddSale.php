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

    <title>Checkout - Isuru Motor Traders</title>
    
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

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <span class="input-group-addon" id="basic-addon1">Registration No</span>
                                <input type="text" name="RegNoTxt" class="form-control" placeholder="Format xx-xxxx" aria-describedby="basic-addon1">
                            </div> </br>

                            <div class="input-group">
                                <button type="submit" name="searchBtn" value="Search" class="btn btn-success">
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"> Search</span>
                                </button>
                            </div> </br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                        <?php

                            if ( isset($_POST['searchBtn']) ){

                                $saleObj = new AddSaleController;
                                $resultSet = $saleObj->search($_POST['RegNoTxt']);
                                
                                while($row = $resultSet->fetch_assoc()){

                                    $_SESSION['RegistrationNo'] = $row['RegistrationNo'];
                                    $_SESSION['Make']           = $row['Make'];
                                    $_SESSION['Model']          = $row['Model'];
                                    $_SESSION['Cost']           = $row['Cost'];
                                    
                                    echo '<div class="input-group mb-3">
                                            <span class="input-group-addon" id="basic-addon1">Registration No</span>
                                            <label name="RegNoTxt" class="form-control" aria-describedby="basic-addon1">'.$row['RegistrationNo'].'<label>
                                        </div> </br>';
                                    echo '<div class="input-group mb-3">
                                        <span class="input-group-addon" id="basic-addon1">Make</span>
                                        <label name="RegNoTxt" class="form-control" aria-describedby="basic-addon1">'.$row['Make'].'<label>
                                    </div> </br>';
                                    echo '<div class="input-group mb-3">
                                        <span class="input-group-addon" id="basic-addon1">Model</span>
                                        <label name="RegNoTxt" class="form-control" aria-describedby="basic-addon1">'.$row['Model'].'<label>
                                    </div> </br>';
                                    echo '<div class="input-group mb-3">
                                        <span class="input-group-addon" id="basic-addon1">Cost</span>
                                        <label name="RegNoTxt" class="form-control" aria-describedby="basic-addon1">'.$row['Cost'].'<label>
                                    </div> </br>';
                                    echo '<div class="input-group mb-3">
                                        <span class="input-group-addon" id="basic-addon1">Sold For</span>
                                        <input type="number" name="SalePrice" required class="form-control" aria-describedby="basic-addon1" value='.$row['SalePrice'].' />
                                    </div> </br>';
                                    echo '<div class="input-group mb-3">
                                        <span class="input-group-addon" id="basic-addon1">Payment Method</span>
                                        <select name="paymentMethod" class="form-control"> <option value="Cash"> Cash </option> <option value="Installment"> Installments - 12 Months </option> </select>
                                    </div> </br>';
                                    echo '<div class="input-group mb-3">
                                        <span class="input-group-addon" id="basic-addon1">Initial Payment</span>
                                        <input type="number" name="InitialPayment" required class="form-control" aria-describedby="basic-addon1" value="0" />
                                    </div> </br>';
                                    if ($_SESSION['RegistrationNo'] != ''){
                                        echo "<button type='submit' name='generateBtn' class='btn btn-success'>
                                                <span class='glyphicon glyphicon-list-alt'> Generate Bill</span>
                                            </button>";
                                    }

                                }
                            }

                            if ( isset($_POST['generateBtn']) ){

                                $saleObj = new AddSaleController;
                                $saleObj->updateAvailability( $_SESSION['RegistrationNo'] );
                                $saleObj->createSale( $_SESSION['RegistrationNo'], $_SESSION['UserID'], $_POST['SalePrice'], $_POST['paymentMethod'], $_POST['InitialPayment'] );

                            }

                            ?>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

<body>

</html>
