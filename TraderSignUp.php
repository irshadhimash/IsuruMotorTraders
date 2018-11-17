
<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <!-- BootStrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Main App Style -->
	 <link rel="stylesheet" href="css/AppTheme_Main.css">
    <script src="js/bootstrap.js"></script>

    <title>Sign Up - Isuru Motor Traders</title>

</head>

<body>

<div class="container">

    <form method="post" action="#" >

        <br/>
        <h1>Sign up and we will talk business!</h1>
        <hr/>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">First Name</span>
            </div>
            <input type="text" name="tFirstName" id="tFirstName" class="form-control w-25" placeholder="Your first name"  aria-label="Your first name" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Last Name</span>
            </div>
            <input type="text" name="tLastName" id="tLastName" class="form-control" placeholder="Your last name"   aria-label="Your last name" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Prefered Name</span>
            </div>
            <input type="text" name="tPreferedName" id="tPreferedName" class="form-control" placeholder="How do you prefer to be refered to?"   aria-label="Your last name" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Address</span>
            </div>
            <input type="text" name="tAddress" id="tAddress" class="form-control" placeholder="Your city" aria-label="Your full address"   aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Gender</span>
            </div>
            <input type="radio" value="Male" name="tGender"/> Male
            <input type="radio" value="Female" name="tGender"/> Female
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Date of Birth</span>
            </div>
            <input type="date" name="tDob" id="tDob" class="form-control" placeholder="Pick you date of birth"  aria-label="Pick you date of birth"   aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Email</span>
            </div>
            <input type="email" name="tEmail" id="tEmail" class="form-control" placeholder="Type in your email"  aria-label="Type in your email"   aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Username</span>
            </div>
            <input type="text" name="tUsername" id="tUsername" class="form-control" placeholder="Pick your username"  aria-label="Pick your username"   aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Password</span>
            </div>
            <input type="password" name="tPassword" id="tPassword" class="form-control" placeholder="Pick your username"  aria-label="Pick your username"   aria-describedby="basic-addon1">
        </div>
                
        <div class="input-group mb-3">
            <input type="submit" name="clearBtn" value="Clear"  class="btn"/> | 
            <input type="submit" name="tSaveBtn" value="Save" class="btn btn-success"/>
        </div>

    </form>

</div>

</body>

<?php 
    require("controllers/TraderSignUpController.php");
    
    if( isset($_POST['tSaveBtn']) ){

        $TraderSignUp = new TraderSignUpController;
        $TraderSignUp->checkUsernameAvailability($_POST['tUsername']);

    }
?>

</html>