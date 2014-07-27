<?php
    $db=$result=$sql="";
    $db = new PDO('mysql: host=localhost; dbname=a100_apprentice_form_schema; charset=utf8', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
 
function querymysql($query){
    try{
         $result=$db->prepare($query);
         if(!$result) { echo "connection error" ; }
         return $result;
    }
    catch(PDOException $e){
        echo "error querying data" . $query;
    } 
}

function destroySession(){
    $_SESSION=array();
    if (session_id() != "" || isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 259200, '/');
    }
    session_destroy();
}

function emailExists($email) {
    $stmt = querymysql('SELECT * FROM apprentice where email_address = ?');
    $stmt->bindValue(1, $email, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->rowCount();
    if($rows > 0)  
      {
        return true; 
      }
      return false; 
}

function searchByFirstName($fname){
    try {
         $stmt=querymysql("SELECT * FROM apprentice where first_name=?");
         $stmt->bindValue(1, $fname, PDO::PARAM_STR);
         $stmt->execute();
        if(rows>0) {
          $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
          return $data; 
         }
         else{    echo 'no record for  '. $fname ; }
         }
         catch(PDOException $e){
             echo "Error " . $e->getMessage();
         }
}

function update_user(){
    $sql = "UPDATE apprentice SET 
            apprentice_id = :apprentice_id,
            first_name = :first_name, 
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
    $stmt->bindParam(':apprentice_id', $_POST['apprentice_id'], PDO::PARAM_INT);
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
    $stmt-> bindValue(':zip', $_POST['zip'], PDO::PARAM_STR);
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
}
