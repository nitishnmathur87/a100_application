<?php
session_start();
 if (isset($_SESSION['reg'])) {
                $first_name = $_SESSION['data']['first_name'];
                $last_name = $_SESSION['data']['last_name'];
                $email_address = $_SESSION['data']['email_address'];
                $password = $_SESSION['data']['password'];
 }
   
   if (isset($_SESSION['reg']['first_name'])) {
      echo '<font color="red">' . $_SESSION['reg']['first_name'] . '</font>' ;
   }
   
    if (isset($_SESSION['reg']['last_name'])) {
          echo '<font color="red">' . $_SESSION['reg']['last_name'] . '</font>';
     }
     if (isset($_SESSION['reg']['email_address'])) {
         echo '<font color="red">' . $_SESSION['reg']['email_address'] . '</font>';
     }
     if (isset($_SESSION['reg']['password'])){
        echo '<font color="red">' . $_SESSION['reg']['password'] . '</font>'; 
     }
     if (isset($_SESSION['reg']['confirm'])){
           echo '<font color="red">' . $_SESSION['reg']['confirm']  . '</font>';
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>A100 Apprentice Application Form</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href='css/form.css' rel='stylesheet'>
</head>
<body>
    <div>
        <form class="form-horizontal" role="form" id="register" action="registration_validation.php" method="POST" autocomplete="off">
		<fieldset class="col-sm-8 well">
			<legend  class="scheduler-border">Register Area</legend>
			<div class="form-group">
				 <input type="text" name="first_name" id="first_name">
                                 <label for="first_name">First Name</label>
                                
                                <input type="text" id="last_name" name="last_name">
                                <label for="last_name">Last Name</label><br>
                                
                                <input type="text" id="email_address" name="email_address">
                                <label for="email_address">Email Address</label>
				
                                 <input type="password" id="password" name="password">
                                  <label for="password">Password</label><br>
                               
                                <input type="password" id="confirm"  name="confirm">
                                 <label for="confirm">Re-enter password: </label><br><br>
                                <input type="submit" name="submit" value="submit">
                                </div>
                        </fieldset>
            </form>
        </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</body>
</html>