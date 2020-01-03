
<?php
    require('controllers/VehicleDocumentController.php');
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

    <title>Documents - Isuru Motor Traders</title>

</head>

<body>
    
    <header>
        <?php require("header.php"); ?>
    </header>
        
    <div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Traders</li>
            </ol>
        </nav>

        <h2>Search to view document of vehicles currently in inventory.</h2>
        <br/>
        <div class='col-lg-6'>

            <form method = "POST" action="#">

                <div class="row">
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Vehicle No</span>
                        </div>
                        <input type="text" name="regNo" class="form-control" placeholder="Enter vehicle registration number" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <button type="submit" name = "searchBtn" class="btn btn-info" > <span class='fas fa-search'></span> Search </button>
                </div>

            </form>

        </div>
        <br/>
        <?php
                if( isset( $_POST['searchBtn'] ) ){

                    $vehicleObj = new VehicleDocumentController;
                    $resultSet = $vehicleObj->getVehicleDocumentsByVNo( $_POST['regNo'] );

                    while($row = $resultSet->fetch_assoc()){

                        $vehicleId = $row['VehicleId'];

                        echo "<div class='col-lg-3'></div>";
                        echo (
                            "<div class='col-lg-9'>
                                <div class='card' style='width: 60rem;'>
                                    <h5 class='card-title'>".$row['RegistrationNo']."</h5>
                                    <img src='".$row['VehicleDocmuent'].".jpg' class='card-img-top' />
                                </div>
                            </div>");
                    }

                }
                
        ?>

    </div>

</body>

</html>
