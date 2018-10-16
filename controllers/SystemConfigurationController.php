
<?php

    if($_SESSION['UserRole'] == 'Admin'){
        echo 'You are an admin';
    }else{
        echo 'You are not supposed to see this!';
    }

?>