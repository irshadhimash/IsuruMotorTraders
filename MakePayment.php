<?php
    require("controllers/InstallmentPaymentController.php");
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

    <title>Installment Payments - Isuru Motor Traders</title>
    
</head>

<body>

    <header>
        <?php require("header.php"); ?>
    </header>

    <div>

        <br/>
        <ol class="breadcrumb">
            <li> <a href="home.php">Home</a> </li>
            <li> <a href="InstallmentPayment.php">Installment Payments</a> </li>
            <li class="active">Make Payment</li>
        </ol>

    </div>

</body>

</html>
