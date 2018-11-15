
<?php
    require("controllers/HomeController.php");
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

<div class="col-12 col-md-3 col-xl-2 bd-sidebar">
    <nav class="collapse bd-links">
        <div class="bd-toc-item">
            <a class"bd-toc-link">
                Getting started
            </a>
        </div>
    </nav>
</div>

    <div class="container">
        <div class="row row flex-xl-nowrap">
            <div class="col-lg-4">
                <a href="inventory.php">
                    <img class="square" src="images/appicons/Inventory.png" alt="Generic placeholder image" width="180" height="180">
                </a>
                <h2>Inventory</h2>
                <p>View and manage your inventory.</p>
            </div>
            <div class="col-lg-4">
                <a href="#">
                    <img class="square" src="images/appicons/customer.png" alt="Generic placeholder image" width="180" height="180">
                </a>
                <h2>Customers</h2>
                <p>View and manage your list of customers.</p>
            </div>
            <div class="col-lg-4">
                <a href="#">
                    <img class="square" src="images/appicons/meeting.png" alt="Generic placeholder image" width="180" height="180">
                </a>
                <h2>Traders</h2>
                <p>View and manage your list of traders.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <a href="#">
                    <img class="square" src="images/appicons/Sales.png" alt="Generic placeholder image" width="180" height="180">
                </a>
                <h2>Sales Portal</h2>
                <p>View and manage your sales.</p>
            </div>
            <!--<div class="col-lg-4">
                <a href="#">
                    <img class="square" src="images/appicons/money.png" alt="Generic placeholder image" width="180" height="180">
                </a>
                <h2>Revenue Portal</h2>
                <p>View and manage your costs, revenue and profit.</p>
            </div>
            <div class="col-lg-4">
                <a href="#">
                    <img class="square" src="images/appicons/finance.png" alt="Generic placeholder image" width="180" height="180">
                </a>
                <h2>Installment Payments</h2>
                <p>View and manage your installment based payments.</p>
            </div>-->

        </div>
    </div>
    <footer class="container">
        <?php require("footer.php"); ?>
    </footer>

</body>

</html>