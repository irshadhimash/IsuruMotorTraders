
<?php

session_start();

require($_SERVER['DOCUMENT_ROOT'].'/IsuruMotorTraders/models/SystemUserModel.php');

class UserController extends SystemUserModel{
    
    function GetUser( $userid ){
        return $this->GetUserById( $userid );
    }

    function getAllTraders(){
        
        return $this->getTraders();

    }

    function GetAllCustomers(){
        return $this->GetCustomers();
    }

    function deleteUser( $userid, $returnURL ){
        
        $msg = $this->delete( $userid );

        if ( $msg == 'success' ){
		    header("location:".$returnURL);
        }

    }

    function GetAllUsers(){
        return $this->GetAll();
    }

    function AddUser(){

        $isUsernameValid = false;
        $isNICValid = false;
        $isTelephoneNoValid = false;
        $isPwValid = false;
        $validationMsg = '';
        
        if ( $this -> CheckUsernameAvailability( $_POST['username'] ) ){
            $isUsernameValid = true;
        }else{
            $validationMsg = $validationMsg."* Username already exists.<br/>";
        }

        if ( strlen($_POST['nic']) == 10 && strpos( $_POST['nic'], 'V') != false ){
            $isNICValid = true;
        }else{
            $validationMsg = $validationMsg."* Please enter a valid NIC.<br/>";
        }

        if( strlen($_POST['telephone']) == 10 || strlen($_POST['telephone']) == 9 ){
            $isTelephoneNoValid = true;
        }else{
            $validationMsg = $validationMsg."* Please enter a valid telephone number.<br/>";
        }

        if( $_POST['password'] == $_POST['confirmedPassword'] ){
            if( preg_match('/[\'^£$%&*()}{#~?><>,|=_+¬-]/', $_POST['confirmedPassword']) ) {
                $validationMsg = $validationMsg."* Password contains special characters.<br/>";
            }else{
                $isPwValid = true;
            }
        }else{
            $validationMsg = $validationMsg."* Passwords don`t match.<br/>";
        }

        if ( $isUsernameValid && $isNICValid && $isTelephoneNoValid && $isPwValid ){
            
            if( $_POST['role'] == 'System Admin' ){
                $this ->create( 'n', 'n', 'n', $_POST['fname'], $_POST['lname'], $_POST['pname'], $_POST['address'], $_POST['gender'], $_POST['dob'], $_POST['email'], $_POST['username'], crypt($_POST['confirmedPassword'], 'This is my password salt!'), 'y', $_POST['nic'] );
            }elseif( $_POST['role'] == 'Employee' ){
                $this ->create('n', 'n', 'y', $_POST['fname'], $_POST['lname'], $_POST['pname'], $_POST['address'], $_POST['gender'], $_POST['dob'], $_POST['email'], $_POST['username'], crypt($_POST['confirmedPassword'], 'This is my password salt!'), 'n', $_POST['nic']);
            }elseif( $_POST['role'] == 'Customer' ){
                $this ->create('n', 'y', 'n', $_POST['fname'], $_POST['lname'], $_POST['pname'], $_POST['address'], $_POST['gender'], $_POST['dob'], $_POST['email'], $_POST['username'], crypt($_POST['confirmedPassword'], 'This is my password salt!'), 'n', $_POST['nic']);
            }elseif( $_POST['role'] == 'Trader' ){
                $this ->create('y', 'n', 'n', $_POST['fname'], $_POST['lname'], $_POST['pname'], $_POST['address'], $_POST['gender'], $_POST['dob'], $_POST['email'], $_POST['username'], crypt($_POST['confirmedPassword'], 'This is my password salt!'), 'n', $_POST['nic']);
            }else{

            }

        }else{
            echo ("<h4 style=color:red;>Please address following!<br/>".$validationMsg."</h4>");
        }
        
    }

}

//'n', 'n', 'n', $_POST['fname'], $_POST['lname'], $_POST['pname'], $_POST['address'], $_POST['gender'], $_POST['dob'], $_POST['email'], $_POST['username'], crypt($_POST['confirmedPassword'], 'This is my password salt!'), 'n', $_POST['nic']

?>
