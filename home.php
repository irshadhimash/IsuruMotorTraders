
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

<!--<div class="col-12 col-md-3 col-xl-2 bd-sidebar">
    <nav class="collapse bd-links">
        <div class="bd-toc-item">
            <a class"bd-toc-link">
                Getting started
            </a>
        </div>
    </nav>
</div>-->

    <div >

        <div class="row">
            
            <!--<div class='col-lg-3'>
                <p>Sidebar</p>
            </div>-->

            <?php

                $homeObj = new HomeController;
                $resultSet = $homeObj->getModulesByRoleCode($_SESSION['UserRole']);

                while($row = $resultSet->fetch_assoc()){
                    echo ("<div class='col-lg-3 text-center'>
                                <a href='".$row['ModuleLink']."'>
                                    <img class='square' src='images/appicons/".$row['ModuleImage']."' alt='Generic placeholder image' width='150' height='150'>
                                </a>
                                <h2>".$row['ModuleName']."</h2>
                                <p>".$row['ModuleDescription']."</p>
                            </div> ");
                }

            ?>
            <div class='col-lg-3 text-center'>
                <a href='Reports.php'>
                    <img class='square' src='images/appicons/reports.png' alt='Generic placeholder image' width='150' height='150'>
                </a>
                <h2>Reports</h2>
                <p>View and manage your reports</p>
            </div>
        </div>

    </div>
    
    <footer class="container">
        <?php require("footer.php"); ?>
    </footer>

</body>

</html>