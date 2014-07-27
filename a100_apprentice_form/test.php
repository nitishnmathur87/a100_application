<?php
require_once 'utility/config.php';
include "utility/debug.php";
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
        <div>
         
        <?php
        try{
     //   $stmt=$link->prepare("SELECT description FROM path_to_a100");
        $stmt=$link->prepare("SELECT * FROM path_to_a100");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            echo 'ERROR: ' . $e->getMessage();
        } 
      ?>
       <select id="pathlist" name="pathlist">   
       <?php foreach($data as $row) : ?> 
           <option value="<?php echo $row['path_id']; ?>"><?php echo $row['description']; ?></option> 
       <?php endforeach ?> 
      </select>    
     </div>
    </body>
</html>
