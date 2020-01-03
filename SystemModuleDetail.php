
<?php
    require('controllers/SystemConfigurationController.php');
?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Main App Style -->
	 <link rel="stylesheet" href="css/AppTheme_Main.css">

    <title>System Module Details - Isuru Motor Traders</title>

</head>

<body>
    
    <header>
        <?php require("header.php"); ?>
    </header>
        
    <div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?php
                    if ( $_SESSION['SystemRole'] == 'System Admin' || $_SESSION['SystemRole'] == 'Employee' ){ 
                        echo ("
                        <li class='breadcrumb-item'><a href='home.php'>Home</a></li>");
                    }elseif( $_SESSION['SystemRole'] == 'Trader' ){
                        echo ("
                        <li class='breadcrumb-item'><a href='TraderPortal.php'>Home</a></li>");
                    }elseif( $_SESSION['SystemRole'] == 'Customer' ){
                        echo ("
                        <li class='breadcrumb-item'><a href='CustomerPortal.php'>Home</a></li>");
                    }
                ?>
                <li class='breadcrumb-item'><a href='SystemConfiguration.php'>System Configuration</a></li>
                <li class='breadcrumb-item'><a href='SystemModule.php'>System Modules</a></li>
                <li class="breadcrumb-item active" aria-current="page">System Module Details</li>
            </ol>
        </nav>

        <h2>Edit Module Details.</h2>
        <br/>
        <div class='col-lg-3'>
        </div>
        <?php
                
                $configObj = new SystemConfigurationController;

                if ( isset($_POST['updateModuleBtn']) ){
                    $configObj->UpdateModuleDetails( $_GET['moduleId'], $_POST['moduleName'], $_POST['moduleDescription'] );
                }

                $resultSet = $configObj->GetModuleDetail( $_GET['moduleId'] );

                while($row = $resultSet->fetch_assoc()){
                    $moduleId = $row['SystemModuleID'];
                    echo (
                        "<form method='POST' action='#'>
                            <div class='card' style='width: 60rem;'>
                                <h5 class='card-title'>Edit: ".$row['ModuleCode']."</h5>
                                <div class='col-lg-3'></div>
                                <div class='col-lg-9'>
                                    <p>Module Name</p>
                                    <input type='text' name='moduleName' value='".$row['ModuleName']."' class='form-control' aria-describedby='basic-addon1'  />
                                    <p>Module Description</p>
                                    <input type='text' name='moduleDescription' value='".$row['ModuleDescription']."' class='form-control'/>
                                    <hr/>
                                    <button type='submit' name='updateModuleBtn' class='btn btn-success' > Update Module </button>
                                    <br/>
                                </div>
                            </div>
                        </form>");
                }
        ?>    

    </div>

</body>

</html>
