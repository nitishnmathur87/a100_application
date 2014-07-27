<?php
session_start();
     include "debug.php";
     try {
        $db = new PDO('mysql: host=localhost; dbname=a100_apprentice_form_schema; charset=utf8', 'root', 'root',
            array(PDO::ATTR_PERSISTENT => true));
            echo "Connected";
        } catch (PDOException $e){
        die("Unable to connect: " . $e->getMessage());
        }
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email_address = $_POST['email_address'];
        $password = $_POST['password'];
        $institution_id = $_POST['institution_id'];
        $major = $_POST['major'];
        $graduation_date = $_POST['graduation_date'];
        $cohort_id = $_POST['cohort_id'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state_id = $_POST['state_id'];
        $phone = $_POST['phone'];
        $zip = $_POST['zip'];
        $linkedin = $_POST['linkedin'];
        $portfolio = $_POST['portfolio'];
        $age = (isset($_POST['age']) ? (string) $_POST['age'] : "yes");
        $residency_status = (isset($_POST['residency_status']) ? (string) $_POST['residency_status'] : "yes");
        $road = $_POST['path_id'];
        $other_path = $_POST['other_path'];
        
        if (empty($_POST)) {
            header("location:index.php");
        }
        else {
        //check if first name empty
            if (empty($first_name)){
                $_SESSION['reg']['first_name'] = "Please enter first name";
            }
        //check if last name empty
            if (empty($last_name)){
                $_SESSION['reg']['last_name'] = "Please enter last name";
            }
        //check if email address empty
            if (empty($email_address))
            {
                $_SESSION['reg']['email_address'] = "Please enter email address";
            }
        //check if password empty
            if (empty($password)) {
                $_SESSION['reg']['password'] = "Please enter password.";
            } else if (strlen($password) < 6 ) {
                 $_SESSION['reg']['password'] = "Please enter more then 6 characters.";
                }
            if (!(filter_var($email_address, FILTER_VALIDATE_EMAIL))){
                $_SESSION['reg']['email_address'] = "The Email address is invalid.";
            }    
        }
        try{
        $stmt = $db->prepare('SELECT * FROM apprentice where email_address = ?');
        $stmt->bindValue(1, $email_address, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->rowCount();
        if($rows > 0){
        $_SESSION['reg']['email_address'] = "This email address already exists.";
        }
        //print_r("This statement returns $rows ", $rows);
        } catch(PDOException $e){
            echo $e->getMessage();
        }
        $options = ['cost' =>11];
        $cryptpass = password_hash($password, PASSWORD_DEFAULT, $options);
        
//        $salt = crypt($password, $email_address);
//        $cryptpass = hash('sha256', $salt);
        if (empty($_SESSION['reg'])) {
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // $db->beginTransaction();
            $result = $db->prepare("INSERT INTO apprentice "
                    . "(first_name, last_name, email_address, password, institution_id, major, graduation_date, cohort_id, address, city, state_id, zip,  phone, linkedin, portfolio, age, residency_status, path_id, other_path) "
                    . "VALUES (:first_name, :last_name, :email_address, :password, :institution_id, :major, :graduation_date,:cohort_id,  :address, :city, :state_id, :zip, :phone, :linkedin, :portfolio, :age, :residency_status,:path_id, :other_path)");
            $result->bindParam(':first_name', $first_name, PDO::PARAM_STR);
            $result->bindParam(':last_name', $last_name, PDO::PARAM_STR);
            $result->bindParam(':email_address', $email_address, PDO::PARAM_STR);
            $result->bindParam(':password', $cryptpass, PDO::PARAM_STR);
            $result->bindParam(':cohort_id', $cohort_id, PDO::PARAM_INT);
            $result->bindParam(':major', $major, PDO::PARAM_STR);
            $result->bindParam(':graduation_date', $graduation_date, PDO::PARAM_STR);
            $result->bindParam(':address', $address, PDO::PARAM_STR);
            $result->bindParam(':city', $city, PDO::PARAM_STR);
            $result->bindParam(':state_id', $state_id, PDO::PARAM_INT);
            $result->bindValue(':zip', $zip, PDO::PARAM_INT);
            $result->bindParam(':institution_id', $institution_id, PDO::PARAM_INT);
            $result->bindParam(':phone', $phone, PDO::PARAM_STR);
            $result->bindParam(':linkedin', $linkedin, PDO::PARAM_STR);
            $result->bindParam(':portfolio', $portfolio, PDO::PARAM_STR);
            $result->bindParam(':age', $age, PDO::PARAM_STR);
            $result->bindParam(':residency_status', $residency_status, PDO::PARAM_STR);
            $result->bindParam(':path_id', $road, PDO::PARAM_INT);
            $result->bindParam(':other_path', $other_path, PDO::PARAM_STR);
            $result->execute();
            $insertId = $db->lastInsertId();
         echo $insertId . " insertion successful";
        } 
        else
        {
        $_SESSION['data'] = array();
        foreach ($_POST as $id => $val)
        {
            $_SESSION['data'][$id] = $val;
        }
        }
    ?>

