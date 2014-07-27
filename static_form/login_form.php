<?php
require_once 'database.php';
include 'debug.php';

?>
<!DOCTYPE html>
<!--
* Document: login_form and validation
* Author: Pinxia Li
*
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Log In Form</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href='css/form.css' rel='stylesheet'>
    </head>
    <body>
        <p class="page-header"> New User? &nbsp;<a href="registration.php">Sign up</a>&nbsp; is easy</p>
        <p class='divider'></p>
        <div class='container-fluid'>
            <form class="form-horizontal" role="form" id="login" action="validate_apprentie_login.php" method="POST">
		<fieldset class="col-md-4 well">
			<legend >Log in</legend>
                                <input type="email" id="email" name="email_address">
                                <label for="email">Email Address</label><br>
                                <input type="password" id="password" name="password">
                                 <label for="password">Password</label><br>
                                <input type="submit" id='submit' name="submit" value="submit">
                </fieldset>
            </form>
        </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</body>
</html>