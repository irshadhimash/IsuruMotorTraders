
<?php
    require('controllers/UserController.php');

    if( isset($_POST['continueBtn']) ){
        $userObj = new UserController;
        $userObj->ValidateEmailTelephoneForPasswordReset();
    }
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

    <title>Forgot Password - Isuru Motor Traders</title>

</head>

<body>
    
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <a class='navbar-brand' href='index.php'>
                <img src="images/logo.jpg" width="50" height="50" alt=""> Isuru Motor Traders
            </a>
        </nav>
    </header>

    <div>

        <br/>
        <h2>Password Help</h2>
        <br/>
        <div class='col-lg-3'>
        </div>
        <div class='col-lg-3'>
            <form method='POST' action='#'>
                <div class='card' style='width: 60rem;'>
                    <h5 class='card-title'>Enter your email address and telephone number to reset password.</h5>
                    <div class='col-lg-3'></div>
                    <div class='col-lg-9'>
                        <input type='email' name='email' placeholder='Your Email' required class='form-control' aria-describedby='basic-addon1' />
                        <br/>
                        <input type='number' name='telephone' placeholder='Telephone Number' required class='form-control'/>
                        <br/>
                        <p>New Password</p>
                        <input type='password' name='password' placeholder='Telephone Number' required class='form-control'/>
                        <br/>
                        <p>Repeat New Password</p>
                        <input type='password' name='confirmedPassword' placeholder='Telephone Number' required class='form-control'/>
                        <hr/>
                        <button type='submit' name='continueBtn' class='btn btn-success' > Reset Password </button>
                        <br/>
                    </div>
                </div>
            </form>
        </div>

    </div>

</body>

</html>
