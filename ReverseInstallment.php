
<?php

require("controllers/InstallmentPaymentController.php");

$installmentPaymentId = $_GET['id'];
//$regNo = $_GET['RegNo'];

if( isset($_POST['reverseBtn']) ){

    $installmentItemObj = new InstallmentPaymentController;
    $installmentItemObj->reverseInstallment($installmentPaymentId);
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

<title>Reverse Sale</title>

</head>

<body>

<header>
    <?php require("header.php"); ?>
</header>

<div class="well">

<ol class="breadcrumb">
    <li> <a href="home.php">Home</a> </li>
    <li> <a href="InstallmentPayment.php">Installment Payments</a> </li>
    <li class="active">Reverse Installment</li>
</ol>

    <form method="POST" action="#">
        <P>Vehicle Registration No: <?php echo $_GET['RegNo'] ?></P>
        <p> Do you really need to reverse the payment of <?php echo $_GET['Amount'] ?>?  </p>
        <a href="Sales.php"> Go back! </a>
        <input type="submit" name="reverseBtn" value="Reverse!" class="btn btn-danger"/>
    </form>
</div>

</body>

</html>