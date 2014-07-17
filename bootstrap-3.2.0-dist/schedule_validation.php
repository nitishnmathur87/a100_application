<?php
//include a javascript file
 //  echo "<script type='text/javascript' src='JavaScript/form_validation.js'></script>";
session_start();
require_once 'utility/config.php';
//include 'utility/debug.php';

$_SESSION['schedule'] = array();
$hours = $_POST['hours'];
$commitments = $_POST['commitments'];
$email_address = "SELECT email_address FROM apprentice";
if (empty($_POST)) {
    header("location:index.php");
} else {
    
    if (empty($_SESSION['schedule'])) {
        $result=$link->exec("UPDATE apprentice 
				SET hours='$hours', commitments='$commitments' WHERE email_address='$email_address'"); //will be changed once the login is in place

        $insertId = $link->lastInsertId();
        header("location:welcome.php");
    } else {
        $_SESSION['data'] = array();
        foreach ($_POST as $id => $val) {
            $_SESSION['data'][$id] = $val;
        }
        header("location:index.php");
    }
}
