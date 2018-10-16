
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">

	 <!-- Compiled and minified CSS -->
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
	 <!-- Main App Style -->
	 <link rel="stylesheet" href="css/AppTheme_Main.css">
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import FontAwesome Icons-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>	

	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
	
	<title>Login</title>

</head>

<body background="images/LoginBackground.jpg">

<div class="container box">

	<h1 style="color:white !important;">Login</h1>
	<form method="post" class="col s6">
		<div class="row">
			<div class="input-field col s6">
				<input id="username" name="username" type="text" class="validate" style="color:white !important;" required="true">
				<label for="username">Username</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
				<input id="password" name="password" type="password" class="validate" style="color:white !important;" required="true">
				<label for="password">Password</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
				<button name="loginBtn" class="waves-effect waves-light btn">
					<i class="material-icons left">keyboard_tab</i>
					<span>Get me in!</span>
				</button>
				<span>
					| 
				</span>
				<a href="#" class="link" onclick="return openModal()" >
					<span> Forgot password?</span>
					<!--<button>Forgot Password?</button>-->
				</a>
			</div>
		</div>
	</form>

</div>

</body>

<?php 
	require("controllers/LoginController.php");
?>

</html>