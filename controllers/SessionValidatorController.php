
<?php

class SessionValidator{

    function validateLoginState(){

		if( isset($_SESSION['IsLoggedIn']) && $_SESSION['IsLoggedIn'] == true ){
			$this->redirectToHome();
			
		}else{
			$this->redirectToLogin();
		}

    }
    
    function redirectToLogin(){
		header('location:index.php');
	}

    function redirectToHome(){
		header('location:home.php');
	}

}

?>
