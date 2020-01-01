
<?php
    require("controllers/HomeController.php");
    $saleModel = new HomeController;
    $totalSales = $saleModel->getTotalSalesByMonth();
    $totalSalesCount = $totalSales->fetch_assoc();
    $totalInstallmentSales = $saleModel->getTotalInstallmentSalesByMonth();
    $totalInstallmentSalesCount = $totalInstallmentSales->fetch_assoc();
    $_SESSION['TotalSalesCount'] = $totalSalesCount['TotalSales'];
    $_SESSION['SaleMonth'] = $totalSalesCount['CurrentMonth'];
    $_SESSION['TotalInstallmentSalesCount'] = $totalInstallmentSalesCount['TotalInstallmentSales'];
?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <!-- BootStrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Main App Style -->
	 <link rel="stylesheet" href="css/AppTheme_Main.css">

    <title>Home</title>
    
</head>

<body class='bg-info'>

    <header>
        <?php require("header.php"); ?>
    </header>

    <div>

        <br/>
        <div class="row">
            <div class='col-lg-3 text-center'>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong><?php echo $_SESSION['TotalInstallmentSalesCount']; ?> vehicles sold under installment plan!</strong>
                    <p>During the month of <?php echo $_SESSION['SaleMonth']; ?>.</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class='col-lg-3'>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?php echo $_SESSION['TotalSalesCount']; ?> total sales!</strong>
                    <p>During the month of <?php echo $_SESSION['SaleMonth']; ?>.</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class='col-lg-3'>
            </div>
            <div class='col-lg-3'>
                <span class="badge badge-pill badge-success">Signed in as <?php echo $_SESSION['PreferedName'] ?>!</span>
            </div>
        </div>

        <hr>
        <div class="row">

            <?php

                $homeObj = new HomeController;
                $resultSet = $homeObj->getModulesByRoleCode($_SESSION['UserRole']);

                while($row = $resultSet->fetch_assoc()){
                    echo ("<div class='col-lg-3 text-center text-white'>
                                <a href='".$row['ModuleLink']."'>
                                    <img class='square' src='images/appicons/".$row['ModuleImage']."' alt='Generic placeholder image' width='150' height='150'>
                                </a>
                                <h2>".$row['ModuleName']."</h2>
                                <p>".$row['ModuleDescription']."</p>
                            </div> ");
                    /*echo ("<div class='col-lg-3 text-center'>
                            <div class='card' style='width: 18rem;'>
                                <img src='images/appicons/".$row['ModuleImage']."' class='card-img-top'>
                                <div class='card-body'>
                                    <a href='".$row['ModuleLink']."'>
                                        <h5 class='card-title'>".$row['ModuleName']."</h5>
                                    </a>
                                    <p class='card-text'>".$row['ModuleDescription']."</p>
                                </div>
                            </div>
                        </div>");*/
                }

            ?>

            

        </div>

    </div>
    
    <footer class="container">
    </footer>

</body>

</html>
