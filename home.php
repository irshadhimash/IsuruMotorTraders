
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

    <div class="container">

        <div class="row">
            
            <?php

                $homeObj = new HomeController;
                $resultSet = $homeObj->getModulesByRoleCode($_SESSION['UserRole']);

                while($row = $resultSet->fetch_assoc()){
                    echo ("<div class='col-lg-4'>
                                <a href='".$row['ModuleLink']."'>
                                    <img class='square' src='images/appicons/".$row['ModuleImage']."' alt='Generic placeholder image' width='150' height='150'>
                                </a>
                                <h2>".$row['ModuleName']."</h2>
                                <p>".$row['ModuleDescription']."</p>
                            </div> ");
                }

            ?>

        </div>

    </div>
    
    <footer class="container">
        <?php require("footer.php"); ?>
    </footer>

</body>

</html>