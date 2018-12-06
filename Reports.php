
<?php
    require('controllers/InventoryController.php');
?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <!-- BootStrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!--Data Table-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- Main App Style -->
	 <link rel="stylesheet" href="css/AppTheme_Main.css">
    <script src="js/bootstrap.js"></script>
    <!--Data Table-->
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <title>Inventory - Isuru Motor Traders</title>

</head>

<body>
    
<header>
    <?php require("header.php"); ?>
</header>
    
<div>

 <ol class="breadcrumb">
  <li><a href="home.php">Home</a></li>
  <li class="active">Reports</li>
 </ol>

    <table class="table" id="reportTable">

		<tr>
            <th>Count</th>
			<th>Country</th>
		</tr>

        <?php
                
            $inventoryObj = new InventoryController;
            $resultSet = $inventoryObj->getreport();

            while($row = $resultSet->fetch_assoc()){
                echo "<tr>";
                    echo "<td>"; echo $row['Count']; echo "</td>";
                    echo "<td>"; echo $row['Country']; echo "</td>";
                echo "</tr>";
            }
            
        ?>

    </table>

</div>  

</body>

</html>
