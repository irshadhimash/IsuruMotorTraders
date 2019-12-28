
<?php
    require('controllers/UserController.php');
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

    <title>Traders - Isuru Motor Traders</title>

</head>

<body>
    
    <header>
        <?php require("header.php"); ?>
    </header>
        
    <div>

        <br/>
        <ol class="breadcrumb">
        <li><a href="home.php">Home</a></li>
        <li class="active">Traders</li>
        </ol>

        <table class="table" id="tradersTable">
        <legend>Below are the list of traders registered in the system. Click on a trader to view available vehicles listed.</legend>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Telephone</th>
            </tr>

            <?php
                    
                $userObj = new UserController;
                $resultSet = $userObj->getAllTraders();

                while($row = $resultSet->fetch_assoc()){
                    $userId = $row['UserId'];
                    echo "<tr>";
                        echo "<td>"; echo "<a href='#?id=$userId'> ".$row['PreferedName']." </a>"; echo "</td>";
                        echo "<td>"; echo $row['Address']; echo "</td>";
                        echo "<td>"; echo $row['Email']; echo "</td>";
                        echo "<td>"; echo $row['Telephone']; echo "</td>";
                        if( $_SESSION['UserRole'] == 'Admin' ){
                            echo "<td>"; echo "<a href='#?id=$userId'><input type='submit' name='deleteBtn' value='Delete Trader' class='btn btn-danger' /> </a>"; echo "</td>";
                        }
                    echo "</tr>";
                }
                
            ?>

        </table>

    </div>

    <script type="text/javascript">
        $(document).ready( function () {
            $('#vehiclesTable').DataTable();
        } );
    </script>

</body>

</html>
