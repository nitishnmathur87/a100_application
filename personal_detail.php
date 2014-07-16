<?php

session_start();
require_once "utility/database.php";
include "utility/debug.php" ;

$_SESSION['reg']=array();
$fname = filter_input(INPUT_POST, 'first_name');
$lname=filter_input(INPUT_POST, 'last_name');
$email=filter_input(INPUT_POST,'email_address');
$password = filter_input(INPUT_POST,'password');
$confirm = filter_input(INPUT_POST,'confirm');
$major=filter_input(INPUT_POST,'major');
$graduation_date = filter_input(INPUT_POST,'graduation_date');
$cohort = filter_input(INPUT_POST,'cohort');  //cohort_id
$address=filter_input(INPUT_POST,'address');
$city = filter_input(INPUT_POST,'city');
$state=filter_input(INPUT_POST,'state');
$zip=filter_input(INPUT_POST,"zip_code");
$phone=filter_input(INPUT_POST,"mobile_phone");
$linkedin=filter_input(INPUT_POST,"linkedin");
$portfolio =$linked_url=filter_input(INPUT_POST,"online_portfolio");
$schedule=filter_input(INPUT_POST,"shedule");
$other=filter_input(INPUT_POST,"other");
$age=filter_input(INPUT_POST,"age"); 
$work_status=filter_input(INPUT_POST,"work_status");
$commit=filter_input(INPUT_POST,"schedule");
$extra=filter_input(INPUT_POST,"other"); 


if (empty($_POST)) {
    header("location:index.php");
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
          print_r("This statement returns $rows ", $rows);
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
        $result=$db->exec("INSERT INTO apprentice (first_name, last_name, email_address, password) 
                VALUES ('$first_name','$last_name','$email_address','$cryptpass')");
        $insertId = $db->lastInsertId(); //get the last insert id
        header("location:success.php");
    } else {
        $_SESSION['data'] = array();
        
       
        foreach ($_POST as $id => $val) {
            $_SESSION['data'][$id] = $val;
        }
        header("location:index.php");
    }
}


?>