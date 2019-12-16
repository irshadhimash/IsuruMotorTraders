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

    <title>Make Payment - Isuru Motor Traders</title>
    
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

        <form method="post" action="#">

            <div class="row">
                <div class="col-lg-4">
                    <p>List of payments for: <strong> <?php echo $_GET['RegNo'] ?> </strong> </p>
                    <p>Total left to pay   : <strong> <?php echo $_GET['TotalLeft'] ?> </strong> </P>
                    <div class="input-group mb-3">
                        <span class="input-group-addon" id="basic-addon1">Amount To Pay</span>
                        <input type="number" name="amountPaid" required class="form-control" aria-describedby="basic-addon1">
                    </div> </br>

                    <div class="input-group">
                        <button type="submit" name="payBtn" value="Pay Now" class="btn btn-success">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"> Pay Now</span>
                        </button>
                    </div> </br>
                </div>
            </div>
        </form>

        <table class="table" id="installmentsTable">
            <tr>
                <th>Payment Date</th>
                <th>Amount Paid</th>
                <th>Actions</th>
            </tr>
            <?php
                
            $installmentObj = new InstallmentPaymentController;
            $resultSet = $installmentObj->viewDetailsBySaleId($_GET['id']);

            while($row = $resultSet->fetch_assoc()){
                echo "<tr>";
                    echo "<td>"; echo $row['PaymentDate']; echo "</td>";
                    echo "<td>"; echo $row['AmountPaid']; echo "</td>";
                    echo "<td>";
                    if( $_SESSION['UserRole'] == 'Admin' ){
                        echo "<a href='ReverseInstallment.php?id=".$row['InstallmentPaymentId']."&RegNo=".$_GET['RegNo']."&Amount=".$row['AmountPaid']."'><input type='submit' name='reverseBtn' value='Reverse Installment' class='btn btn-danger' /> </a>";
                    }
                    echo "</td>";
                echo "</tr>";
            }
            
            ?>
        </table>

    </div>

</body>

</html>

<?php

    if ( isset($_POST['payBtn']) ){

        if ( $_POST['amountPaid'] > $_GET['TotalLeft'] ){
            echo ("<script type='text/javascript'> alert('You can not pay more than what`s left to pay!');</script>");
        }else{
            $installmentObj = new InstallmentPaymentController;
            $resultSet = $installmentObj->createPayment($_GET['id'], $_POST['amountPaid']);
        }

    }

?>