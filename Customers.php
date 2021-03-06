
<?php
    require('controllers/UserController.php');
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

    <title>Customers - Isuru Motor Traders</title>

</head>

<body>
    
    <header>
        <?php require("header.php"); ?>
    </header>
        
    <div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Customers</li>
            </ol>
        </nav>

        <h2>Below is the list of your customers. Click on a customer to see vehicles purchased by them.</h2>
        <br/>
        <div class='col-lg-3'>
        </div>
        <?php
                    
                $userObj = new UserController;
                $resultSet = $userObj->GetAllCustomers();

                while($row = $resultSet->fetch_assoc()){
                    $cxId = $row['UserId'];
                    $AccountStatusIcon = '';
                    if( $row['AccountStatus'] == 'Active' ){
                        $AccountStatusIcon = 'success';
                    }else{
                        $AccountStatusIcon = 'danger';
                    }
                    echo (
                        "<div class='col-lg-8'>
                            <div class='media position-relative'>
                                <img src='fontawesome/svgs/solid/user.svg' class='mr-3' alt='...' width='30px' height='30px'>
                                <div class='media-body'>
                                    <h5 class='mt-0'>
                                        <a href='CustomerInventory.php?cxId=$cxId&Name=".$row['PreferedName']."'> ".$row['PreferedName']." </a>
                                        <span class='badge badge-pill badge-".$AccountStatusIcon."'>".$row['AccountStatus']."!</span>
                                    </h5>
                                    <p>".$row['NIC']."</p>
                                    <p>".$row['Address']."</p>
                                    <p>".$row['Email']."</p>
                                    <p>".$row['Telephone']."</p>");
                                    if( $_SESSION['UserRole'] == 'Admin' ){
                                        echo "<p><a href='DeleteUser.php?cxId=$cxId&Name=".$row['PreferedName']."&ReturnURL=Customers.php'><button name='deleteBtn' value='Delete Trader' class='btn btn-danger'> <span class='fas fa-trash-alt'></span> Delete Customer </button> </a></p>";
                                    }
                    echo ("
                                </div>
                            </div>
                        </div>");
                }
        ?>    

    </div>

</body>

</html>
