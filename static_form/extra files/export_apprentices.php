<?php 
require_once 'database.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
  // Original PHP code by Chirp Internet: www.chirp.com.au
  // Please acknowledge use of this code by including this header.

  function cleanData(&$str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }
  

  // filename for download
  $filename = "website_data_" . date('Ymd') . ".xls";

  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");

  $flag = false;
  //$stmt = $db->prepare("SELECT * FROM apprentice");
  //$stmt->execute();
  //$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  $result = $db->pg_query("SELECT * FROM apprentice ORDER BY first_name") or die('Query failed!');
  $result->execute();
  $row = $result->fetchAll(PDO::FETCH_ASSOC);
  while(false !== ($row = pg_fetch_assoc($result))) {
    if(!$flag) {
        echo "displaying field/column names";
      // display field/column names as first row
      echo implode("\t", array_keys($row)) . "\r\n";
      $flag = true;
      
    }
    array_walk($row, 'cleanData');
    echo implode("\t", array_values($row)) . "\r\n";
  }
  exit;
        ?>
    </body>
</html>
