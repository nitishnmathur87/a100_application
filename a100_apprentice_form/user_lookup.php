<?php
require_once 'utility/config.php';
include "utility/debug.php";

$data = array();
$email = "" ;
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $stmt=$link->prepare("SELECT * FROM register WHERE email_address=?");
    $stmt->bindValue(1, $email);
    $stmt->execute();
  //  $rows = $stmt->fetchColumn();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
//      $data = $stmt->fetchAll(PDO::FETCH_NUM);
  //  echo $rows; 
}
if(empty($data)) {
    echo "<tr>";
        echo "<td colspan='4'>There were not records</td>";
    echo "</tr>";
}
//else {
//    echo '<pre>' , json_encode($data) , '</pre>'; 
//    exit;
//}
else {
    //print_r($data);
    echo "<html><head><title><h1>User Search Information</h1></title></head></html>";
    echo "<table border='1' color='blue'>";
    foreach ($data as $d) {
//        echo "<pre>";
//        print_r($d);
//        echo "</pre>";
        echo "<tr>";
            echo "<td width='65' height='25'>".$d['id']."</td>";
            echo "<td width='165' height='25'>".$d['first_name']."</td>";
            echo "<td width='165' height='25'>".$d['last_name']."</td>";
            echo "<td width='250' height='25'>".$d['email_address']."</td>";
            echo "<td width='100' height='25'>".$d['password']."</td>";
        echo "</tr>";
    }
}
echo "</table>";