<?php
//include a javascript file
 //  echo "<script type='text/javascript' src='JavaScript/form_validation.js'></script>";
session_start();
require_once 'utility/config.php';
//include 'utility/debug.php';

$_SESSION['schedule'] = array();
$hours = $_POST['hours'];
$commitments = $_POST['commitments'];

if (empty($_POST)) {
    header("location:index.php");
} else {
    if (empty($hours)) {
        $_SESSION['schedule']['hours'] = "Please enter number of hours you can spend per week";
    }
    if (empty($commitments)) {
        $_SESSION['schedule']['commitments'] = "Please list all commitments";
    }
    

    if (empty($_SESSION['schedule'])) {
        $result=$link->exec("UPDATE apprentice 
				SET hours=$hours, commitments='$commitments' WHERE email_address='push@gmail.com'");
    } else {
        $_SESSION['data'] = array();
        foreach ($_POST as $id => $val) {
            $_SESSION['data'][$id] = $val;
        }
        header("location:index.php");
    }
}
