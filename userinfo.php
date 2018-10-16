<?php 
    session_start();
?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <!-- BootStrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Main App Style -->
	 <link rel="stylesheet" href="css/AppTheme_Main.css">
    <script src="js/bootstrap.js"></script>

    <title>User Details</title>

</head>

<body>
    
    <header>
        <?php require("header.php"); ?>
    </header>

    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Kasun Gunarathne</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="" src="" class="img-circle img-responsive"> </div>
            
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Department:</td>
                        <td>N/A</td>
                      </tr>
                      <tr>
                        <td>Hire date:</td>
                        <td>06/23/2018</td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td>09/26/1994</td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Gender</td>
                        <td>Male</td>
                      </tr>
                        <tr>
                        <td>Home Address</td>
                        <td>Nilpanagoda, Minuwangoda</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:kasun.g@isurumotortraders.com">kasun.g@isurumotortraders.com</a></td>
                      </tr>
                        <td>Phone Number</td>
                        <td>011-4567-890(Landline)<br><br>075-4567-890(Mobile)
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    
</body>

</html>