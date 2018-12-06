
<?php
    require("controllers/SaleController.php");
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

    <title>Sales - Isuru Motor Traders</title>
</head>

<body>

    <header>
        <?php require("header.php"); ?>
    </header>

<div>

<ol class="breadcrumb">
 <li><a href="home.php">Home</a></li>
 <li class="active">Sales</li>
</ol>

   <a class="link" href="#"> <span class="glyphicon glyphicon-plus"></span>New Sale </a>
   </br>
   <table class="table" id="salesTable">

       <tr>
           <th>Vehicle Registration No</th>
           <th>Customer</th>
           <th>Bill</th>
           <th>Model</th>
           <th>Status</th>
           <th>Fuel Type</th>
           <th>Country</th>
           <th>Sale Price</th>
           <th>Sold By</th>
           <th>Actions</th>
           
       </tr>

   </table>

</div>

</body>

</html>