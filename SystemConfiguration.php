
<?php 
    session_start();
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

    <title>System Configuration</title>
</head>

<body>

    <header>
        <?php require("header.php"); ?>
    </header>

    <div class="table">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li>Module Label Replacements</li>
                    <li>User Roles</li>
                </ul>
            </div>
            <div class="col-md-8">
                
            </div>
        </div>
    </div>

</body>


<?php 
	require("controllers/SystemConfigurationController.php");
?>

</html>