<?php
include "debug.php";
require_once "database.php";
include "functions.php";
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
     $sql = "UPDATE apprentice SET first_name = :first_name, 
            last_name = :last_name, 
            email_address = :email_address,  
            password = :password,  
            institution_id = :institution_id ,
            major = :major,
            graduation_date = :graduation_date,
            cohort_id= :cohort_id,
            address = :address,
            city = :city,
            state_id = : state_id,
            zip = :zip,
            phone= :phone,
            linkedin = :linkedin,
            portfolio = :portfolio,
            age = :age,  
            residency_status =: residency_status,
            path_id =: path_id, 
            other_path =:other_path, 
            active = :active,
            comments = :comments 
            WHERE apprentice_id = :apprentice_id";
 
    $stmt = querymysql($sql);
    $stmt->bindParam(':first_name', $_POST['first_name'], PDO::PARAM_STR);
    $stmt -> bindParam(':last_name', $_PSOT['last_name'], PDO::PARAM_STR);
    $stmt -> bindParam(':email_address', $_POST['email_address'], PDO::PARAM_STR);
    $stmt -> bindParam(':password', $_POST['$cryptpass'], PDO::PARAM_STR);
    $stmt-> bindParam(':cohort_id', $_POST['cohort_id'], PDO::PARAM_INT);
    $stmt-> bindParam(':major', $_POST['major'], PDO::PARAM_STR);
    $stmt -> bindParam(':graduation_date', $_POST['graduation_date'],PDO::PARAM_STR);
    $stmt-> bindParam(':address', $_POST['address'], PDO::PARAM_STR);
    $stmt-> bindParam(':city', $_POST['city'], PDO::PARAM_STR);
    $stmt -> bindParam(':state_id', $_POST['state_id'], PDO::PARAM_INT);
    $stmt-> bindValue(':zip', $_POST['zip'], PDO::PARAM_INT);
    $stmt -> bindParam(':institution_id', $_POST['institution_id'], PDO::PARAM_INT);
    $stmt-> bindParam(':phone', $_POST['phone'], PDO::PARAM_STR);
    $stmt -> bindParam(':linkedin', $_POST['linkedin'], PDO::PARAM_STR);
    $stmt -> bindParam(':portfolio', $_POST['portfolio'], PDO::PARAM_STR);
    $stmt-> bindParam(':age', $_POST['age'], PDO::PARAM_STR);
    $stmt -> bindParam(':residency_status', $_POST['residency_status'], PDO::PARAM_STR);
    $stmt -> bindParam(':path_id', $_POST['path_id'], PDO::PARAM_INT);
    $stmt -> bindParam(':other_path', $_POST['other_path'], PDO::PARAM_STR);
    $stmt->bindParam(':apprentice_id', $_POST['apprentice_id'], PDO::PARAM_INT);   
    $stmt->execute(); 
  ?>
   <form action="update_apprentice.php" name="update">
       
       </form>
        
    </body>
</html>
