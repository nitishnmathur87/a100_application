<?php
require_once 'utility/config.php';
include "utility/debug.php";

$data = array();
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    
  //  echo $email ;
    $stmt=$link->prepare("SELECT * FROM register WHERE email_address=?");
    $stmt->bindValue(1, $email);
    $stmt->execute();
  //  $rows = $stmt->fetchColumn();
  //  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $data = $stmt->fetchAll(PDO::FETCH_NUM);
  //  echo $rows; 
}
if(empty($data)) {
    echo "<tr>";
        echo "<td colspan='4'>There were not records</td>";
    echo "</tr>";
}
else {
    echo json_encode($data); 
    exit;
}
//else {
//    
//    foreach ($data as $d) {
//        echo "<tr>";
//            echo "<td>".$d['id']."</td>";
//            echo "<td>".$d['first_name']."</td>";
//            echo "<td>".$d['last_name']."</td>";
//            echo "<td>".$d['email_address']."</td>";
//            echo "<td>".$d['password']."</td>";
//        echo "</tr>";
//    }
//}
