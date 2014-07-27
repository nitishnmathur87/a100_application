<?php
session_start();
require_once 'database.php';
include 'debug.php';

$_SESSION['reg'] = array();
$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$email_address = filter_input(INPUT_POST, 'email_address');
$password = filter_input(INPUT_POST, 'password');
$confirm = filter_input(INPUT_POST, 'confirm');

if (empty($_POST)) {
    header("location:registration.php");
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
     $stmt = $db->prepare('SELECT * FROM registration where email_address = ?');
     $stmt->bindValue(1, $email_address, PDO::PARAM_STR);
     try {
          $stmt->execute();
          $rows = $stmt->fetchColumn();
          if($rows > 0)  {$_SESSION['reg']['email_address'] = "This email address already exists.";}
         // print_r("This statement returns $rows ", $rows);
    }catch(PDOException $e){echo $e->getMessage();};
  
    if (empty($password)) {
        $_SESSION['reg']['password'] = "Please enter password.";
    } else if ((strlen($password)) < 6) {
        $_SESSION['reg']['password'] = "Please enter more then 6 characters.";
    }
    if (empty($confirm)) {
        $_SESSION['reg']['re_enter'] = "Please re-enter password to confirm:";
    }
    if ($confirm != $password) {
        $_SESSION['reg']['re_enter'] = "Password entered do not match.";
    }
    if (empty($_SESSION['reg'])) {
        $options = ['cost' =>11];
        $cryptpass = password_hash($password, PASSWORD_DEFAULT, $options);
      //  $salt = crypt($password, $email_address);
      //  $cryptpass = hash('sha256', $salt);
        echo "cryptpass is " . $cryptpass. "<br>";
        $result=$db->exec("INSERT INTO registration (first_name, last_name, email_address, password) 
                VALUES('$first_name','$last_name','$email_address','$cryptpass')");
        $insertId = $db->lastInsertId(); //check the last inserted id
       // header("location: www.google.com");
         echo "Thank you for registering with us! Please browse our " . "<a href='index.php'>Home Page</a>" ;
    } else {
        $_SESSION['data'] = array();
        foreach ($_POST as $id => $val) {
            $_SESSION['data'][$id] = $val;
        }
        header('location:index.php');
    }
}

