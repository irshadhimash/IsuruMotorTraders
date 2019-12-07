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

    <title>Add Sale</title>
    
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
                                <span class="input-group-addon" id="basic-addon1">Vehicle No</span>
                                <input type="text" name="RegNoTxt" class="form-control" placeholder="Format xx-xxxx" aria-describedby="basic-addon1">
                            </div> </br>

                            <div class="input-group">
                                <button type="submit" name="searchBtn" value="Search" class="btn btn-success">
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"> Search</span>
                                </button>
                            </div> </br>
                        </div>
                    </div>

                    <table class="table" id="vehiclesTable">

                        <tr>
                            <th>Registration No</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Cost</th>
                            <th>Sale Price</th>
                        </tr>

                        <?php

                            if ( isset($_POST['searchBtn']) ){

                                $saleObj = new AddSaleController;
                                $resultSet = $saleObj->search($_POST['RegNoTxt']);
                                
                                while($row = $resultSet->fetch_assoc()){

                                    $_SESSION['RegistrationNo'] = $row['RegistrationNo'];
                                    $_SESSION['Make']           = $row['Make'];
                                    $_SESSION['Model']          = $row['Model'];
                                    $_SESSION['Cost']           = $row['Cost'];
                                    
                                    echo "<tr>";
                                        echo "<td>"; echo $row['RegistrationNo']; echo "</td>";
                                        echo "<td>"; echo $row['Make']; echo "</td>";
                                        echo "<td>"; echo $row['Model']; echo "</td>";
                                        echo "<td>"; echo $row['Cost']; echo "</td>";
                                        echo "<td>"; echo '<input type="text" name="SalePrice" value='.$row['SalePrice'].' />'; echo "</td>";
                                    echo "</tr>";

                                }
                                echo "<tr>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    if ($_SESSION['RegistrationNo'] != ''){
                                        echo "<td> 
                                                <button type='submit' name='generateBtn' class='btn btn-success'>
                                                    <span class='glyphicon glyphicon-list-alt'> Generate Bill</span>
                                                </button>
                                        </td>";
                                    }
                                echo "</tr>";
                            }
                            
                            if ( isset($_POST['generateBtn']) ){

                                $saleObj = new AddSaleController;
                                $saleObj->updateAvailability( $_SESSION['RegistrationNo'] );
                                $saleObj->createSale( $_SESSION['RegistrationNo'], $_SESSION['UserID'], $_POST['SalePrice'] );

                            }
                            
                        ?>

                    </table>

                </form>
            </div>
        </div>

    </div>

<body>

</html>
