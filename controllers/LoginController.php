
<?php

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/LoginModel.php');

class LoginController extends LoginModel{

	private $username = "";
	private $password = "";
	private $username_err = "";
	private $password_err = "";
	private $user = array();

	function validateLoginState(){

		if( isset($_SESSION['IsLoggedIn']) && $_SESSION['IsLoggedIn'] == true ){
			$this->redirectToHome();
		}else{
			$this->verify();
		}

	}

	function redirectToHome(){
		header('location:home.php');
	}

	function verify(){

		if($_SERVER["REQUEST_METHOD"] == "POST"){

			if(empty(trim($_POST["username"]))){
				$this->username_err = 'Please enter username.';
			} else{
				$this->username = trim($_POST["username"]);
			}

			if(empty(trim($_POST['password']))){
				$this->password_err = 'Please enter your password.';
			} else{
				$this->password = trim($_POST['password']);
			}

			if(empty($username_err) && empty($password_err)){

				$this->user = $this->getUser($this->username);

				if( ($this->username == $this->user['Username']) ){

					$SALT = 'This is my password salt!';
					$HashedPassword = crypt($this->password, $SALT);

					if( $HashedPassword == $this->user['HashedPassword'] ){
						$this->signIn();
					}else{
						echo ("<script type='text/javascript'> alert('Incorrect password!');</script>");
					}

				}else{

					echo ("<script type='text/javascript'> alert('Username doesn`t exist!');</script>");

				}
				
			}

		}

	}

	function signIn(){
		
		session_start();
		$_SESSION['UserID'] = $this->user['UserId'];
		$_SESSION['Username'] = $this->user['Username'];
		$_SESSION['PreferedName'] = $this->user['PreferedName'];
		$_SESSION['IsLoggedIn'] = true;
		$_SESSION['UserRole'] = $this->user['UserRole'];
		header('location:home.php');
		
	}

}

$loginObj = new LoginController;
$loginObj->validateLoginState();

?>