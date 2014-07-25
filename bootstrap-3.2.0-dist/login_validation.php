<?php
session_start();
$link = new PDO('mysql: host=localhost; dbname=a100_apprentice_form_schema; charset=utf8', 'root', '');
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$link->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$_SESSION['login']=array();
$email_address = $_POST['email_address'];
$password = $_POST['password'];

if (empty($_POST)) 
{
    header("location:login.php");
} 
else 
{

	if (empty($email_address)) 
	{
        echo "Please enter email address.";
	} 
    elseif (!(filter_var($email_address, FILTER_VALIDATE_EMAIL)))
	{
        echo "The Email address is invalid.";
    }
	if (empty($password)) 
	{
        echo "Please enter password.";
	}
	
	$stmt = $link->prepare('SELECT * FROM apprentice where email_address = :email_address');
    $stmt->bindValue(':email_address', $email_address, PDO::PARAM_STR);
    try 
	{
        $stmt->execute();
        $rows = $stmt->rowCount();
		
		$sth = $link->prepare('SELECT password FROM apprentice WHERE email_address = :email_address');
		$sth->bindValue(':email_address', $email_address, PDO::PARAM_STR);
		$sth->execute();
		$pass_result = $sth->fetchColumn();
        if($rows > 0)  
		{
			$salt = crypt($password, $email_address);
			$cryptpass = hash('sha256', $salt);
			if($cryptpass != $pass_result)
			{
				echo "Please check your credentials<br />";
				echo "<a href=\"login.php\">Go back</a>";
			}
			else
			{
				header("location:index.php");
			}
			
		}
		
		else
		{
			echo "<a href=\"register.php\">You are not registered, register here</a>";
		}
    }     
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
		 
	/*if (!empty($_SESSION['login'])) 
	{
		$salt = crypt($password, $email_address);
		$cryptpass = hash('sha256', $salt);
		$result=$link->prepare("SELECT email_address, password FROM apprentice WHERE email_address = :email_address AND password = :password");
		$result->bindValue(':email_address', $email_address, PDO::PARAM_STR);
		$result->bindValue(':password', $cryptpass, PDO::PARAM_STR);
		$result->execute();
		$insertId = $link->lastInsertId();
		if()
		header("location:index.php");
	} 
	else 
	{
		$_SESSION['data'] = array();
		foreach ($_POST as $id => $val) 
		{
			$_SESSION['data'][$id] = $val;
		}
		header("location:login.php");
	}*/

}
?>