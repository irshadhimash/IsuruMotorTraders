
<?php

session_start();

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/LoginModel.php');

class LoginController extends LoginModel{

	private $username = "";
	private $password = "";
	private $username_err = "";
	private $password_err = "";
	private $user = array();

	function verify(){

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
					if( $this->user['AccountStatus'] == 'Active' ){
						$this->signIn();
					}else{
						echo ("<script type='text/javascript'> alert('Your account has been deleted. Please contact System Administrator!');</script>");
					}
				}else{
					echo ("<script type='text/javascript'> alert('Incorrect password!');</script>");
				}

			}else{

				echo ("<script type='text/javascript'> alert('Username doesn`t exist!');</script>");

			}
			
		}

	}

	function signIn(){
		
		$_SESSION['UserID'] = $this->user['UserId'];
		$_SESSION['Username'] = $this->user['Username'];
		$_SESSION['PreferedName'] = $this->user['PreferedName'];
		$_SESSION['IsLoggedIn'] = true;
		$_SESSION['UserRole'] = $this->user['UserRole'];
		$_SESSION['HashedPassword'] = $this->user['HashedPassword'];
		$_SESSION['SystemRole'] = $this->user['SystemRole'];
		if ( $_SESSION['SystemRole'] == 'System Admin' || $_SESSION['SystemRole'] == 'Employee' ){ 
			header('location:home.php');
		}elseif( $_SESSION['SystemRole'] == 'Trader' ){
			header('location:TraderPortal.php');
		}elseif( $_SESSION['SystemRole'] == 'Customer' ){
			header('location:CustomerPortal.php');
		}
		
	}

}

if ( isset($_POST['loginBtn'] )){

	$loginObj = new LoginController;
	$loginObj->verify();

}

?>
