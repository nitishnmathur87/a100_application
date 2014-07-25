<!DOCTYPE html>
<?php 
/*
The login.php is the page that the user lands when the apply now button is clicked
*/

//include 'https.php';
session_start();
?>
<?php
// Turn off all error reporting
error_reporting(0);
?>

<html>

<title>A100 Application Login</title>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">


<body>
<h1 class="col-md-12">
		A100 Apprentice Login Form
	</h1>
	<form class="form-horizontal" role="form" id="login" action="login_validation.php" method="post">
		<div>
			<?php
				if(isset($_SESSION['login']))
				{
					$email_address = $_SESSION['data']['email_address'];
					$password = $_SESSION['data']['password'];
				}

			?>

			<?php
				if (isset($_SESSION['login']['done'])) 
				{
					echo '<font color="green">' . $_SESSION['login']['done'] . '</font>';
				}
			?>	
		</div>
		<fieldset class="col-md-12 well">
			<legend class="scheduler-border">Login</legend>
			<div class="form-group">
				<label for="email_address" class="col-md-1 control-label">Email Address</label>
				<div class="col-md-3">
					<input type="text" name="email_address" placeholder="Enter email address" class="form-control" value="<?php echo $email_address="" ?>" >
					<?php 
						if (isset($_SESSION['login']['email_address'])) 
						{
						echo '<font color="red">' . $_SESSION['login']['email_address'] . '</font>';
						}
					?>
				</div>
				<label for="password" class="col-md-1 control-label">Password</label>
				<div class="col-md-3">
					<input type="password" name="password" placeholder="Enter password" class="form-control" value="<?php echo $password="" ?>">
					<?php
						if (isset($_SESSION['login']['password']))
						{
							echo '<font color="red">' . $_SESSION['login']['password'] . '</font>'; 
						}
					?>	
				</div>
				</div>
				<div style="text-align:center;">
					<input type="submit"  value="Login">
				</div>
			
			</fieldset>
			<div class="col-md-12" style="text-align:center;">
				<label for="register"><a href="register.php">Click here to register</a> </label>
			</div>
			
		
	</form>
</body>
</html>
  
