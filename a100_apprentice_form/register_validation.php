<?php
//include a javascript file
 //  echo "<script type='text/javascript' src='JavaScript/form_validation.js'></script>";
session_start();
require_once 'utility/config.php';
include 'utility/debug.php';

$_SESSION['reg'] = array();
$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$email_address = filter_input(INPUT_POST, 'email_address');
$password = filter_input(INPUT_POST, 'password');
$re_enter = filter_input(INPUT_POST, 're_enter');
$gender = filter_input(INPUT_POST, 'gender');
$in_id = filter_input(INPUT_POST,'institution_id');
$major = filter_input(INPUT_POST, 'major');
$graduation =filter_input(INPUT_POST, 'graduation_date');
 
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
     $stmt = $link->prepare('SELECT * FROM register where email_address = ?');
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
    if (empty($re_enter)) {
        $_SESSION['reg']['re_enter'] = "Please re-enter password to confirm:";
    }
    if ($re_enter != $password) {
        $_SESSION['reg']['re_enter'] = "Passwords entered do not match.";
    }
    if(empty($gender)){
        $_SESSION['reg']['gender']="Please select gender"; 
    }
   
    
    if (empty($_SESSION['reg'])) {
        $salt = crypt($password, $email_address);
        $cryptpass = hash('sha256', $salt);
        
        
        
        $result=$link->exec("INSERT INTO register (first_name, last_name, email_address, password, gender, in_id, major, graduation_date ) 
                VALUES ('$first_name','$last_name','$email_address','$cryptpass','$gender', '$in_id', '$major', '$graduation')");
        $insertId = $link->lastInsertId(); //check the last inserted id
        header("location:welcome.php");
    } else {
        $_SESSION['data'] = array();
        foreach ($_POST as $id => $val) {
            $_SESSION['data'][$id] = $val;
        }
        header("location:register.php");
    }
}
