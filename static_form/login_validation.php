<?php
require_once 'database.php';
include 'debug.php';
        //get user input 
        $email = filter_input(INPUT_POST, 'email_address');
        $password_from_post = filter_input(INPUT_POST, 'password');
        if ($password_from_post == "") {
            echo "email_address or password not correct";
        }
       //check registration table to find the email_address entered by the user
        try {
            $stmt = $db->prepare("SELECT password FROM registration where email_address = :email_address");
            $stmt -> bindParam(":email_address", $email);
            $stmt->execute();
            $rows = $stmt->rowCount();
            echo $rows . " rows<br>";
            if ($rows == 1){ //email_address exists
                 $pwd_from_db = $stmt->fetch();
                 echo $pwd_from_db['password'] . "    <br>from db <br>";
                 if(password_verify($password_from_post, $pwd_from_db['password'])){
                     $_SESSION['email_address'] = $email;
                    echo "Log in successfully <br>";
                    echo "<br><a href='index.php'>Home Page</a>" ;
                   // header('Location: /index.php');
                    exit; 
                 }
            }else {     
               echo "<br>combination of email and password are not correct, try again <br>";
               echo "<br><a href='login_form.php'>Login</a>" ;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

