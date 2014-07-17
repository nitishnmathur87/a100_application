<?php
//include a javascript file
 //  echo "<script type='text/javascript' src='JavaScript/form_validation.js'></script>";
session_start();
require_once 'utility/config.php';
//include 'utility/debug.php';

$_SESSION['reg'] = array();
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email_address = $_POST['email_address'];
$password = $_POST['password'];
$re_enter = $_POST['re_enter'];

if (empty($_POST)) {
    header("location:register.php");
} else {
    if (empty($first_name)) {
        $_SESSION['reg']['first_name'] = "Please enter first name.";
    }
    if (empty($last_name)) {
        $_SESSION['reg']['last_name'] = "Please enter last name.";
    }
    
    if (empty($email_address)) {
        $_SESSION['reg']['email_address'] = "Please enter email address.";
   } 
    if (!(filter_var($email_address, FILTER_VALIDATE_EMAIL))){
              $_SESSION['reg']['email_address']= "The Email address is invalid.";
    }
     $stmt = $link->prepare('SELECT * FROM apprentice where email_address = ?');
     $stmt->bindValue(1, $email_address);
     try {
          $stmt->execute();
          $rows = $stmt->fetchColumn();
          if($rows > 0)  {$_SESSION['reg']['email_address'] = "This email address already exists.";}
         // print_r("This statement returns $rows ", $rows);
    }catch(PDOException $e){echo $e->getMessage();};
  
    if (empty($password)) {
        $_SESSION['reg']['password'] = "Please enter password.";
    } else if ((strlen($password)) < 6) {
        $_SESSION['reg']['password'] = "Please enter more then 6 character.";
    }
    if (empty($re_enter)) {
        $_SESSION['reg']['re_enter'] = "Please re-enter password to confirm:";
    }
    if ($re_enter != $password) {
        $_SESSION['reg']['re_enter'] = "Password must be same .";
    }
    if (empty($_SESSION['reg'])) {
        $salt = crypt($password, $email_address);
        $cryptpass = hash('sha256', $salt);
        $result=$link->exec("INSERT INTO apprentice (first_name, last_name, email_address, password) 
                VALUES ('$first_name','$last_name','$email_address','$cryptpass')");
        $insertId = $link->lastInsertId();
        header("location:welcome.php");
    } else {
        $_SESSION['data'] = array();
        foreach ($_POST as $id => $val) {
            $_SESSION['data'][$id] = $val;
        }
        header("location:register.php");
    }
}
