<?php

session_start();
$link = new PDO('mysql: host=localhost; dbname=a100_apprentice_form_schema; charset=utf8', 'root', '');
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$link->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$_SESSION['personal'] = array();

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email_address = $_POST['email_address'];
$password = $_POST['password'];
$university_name = $_POST['university_name'];
$major_name = $_POST['major_name'];
$graduation_date = $_POST['graduation_date'];
$cohort = $_POST['cohort'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$mobile_phone = $_POST['mobile_phone'];
$postal_code = $_POST['postal_code'];
$linkedin = $_POST['linkedin'];
$online_portfolio = $_POST['online_portfolio'];
$age = (isset($_POST['age']) ? (string) $_POST['age'] : "yes");
$work_authorization = (isset($_POST['work_authorization']) ? (string) $_POST['work_authorization'] : "yes");
$path_to_a100 = $_POST['path_to_a100'];
$other = $_POST['other'];

if (empty($_POST))
{

 header("location:index.php");
} 
else 
{
  //check if first name empty
  if (empty($first_name))
  {
    $_SESSION['personal']['first_name'] = "Please enter first name";
  }
  //check if last name empty
  if (empty($last_name))
  {
    $_SESSION['personal']['last_name'] = "Please enter last name";
  }
  //check if email address empty
  if (empty($email_address))
  {
    $_SESSION['personal']['email_address'] = "Please enter email address";
  }
  //check if password empty
  if (empty($password)) {
    $_SESSION['personal']['password'] = "Please enter password.";
  } else if ((strlen($password)) < 6 ) {
    $_SESSION['personal']['password'] = "Please enter more then 6 characters.";
  }
  //check if email address format
  if (!(filter_var($email_address, FILTER_VALIDATE_EMAIL)))
  {
    $_SESSION['personal']['email_address']= "The Email address is invalid.";
  }

  // check phone number format
  //if( !preg_match("/^([1]-)?([0-9]{3})[0-9]{3}-[0-9]{4}$/i", $mobile_phone))
  //{
   // $_SESSION['personal']['mobile_phone'] = "Please enter in the right format";
 // }
  
  //check if email address already exists
  $stmt = $link->prepare('SELECT * FROM apprentice where email_address = ?');
  $stmt->bindValue(1, $email_address, PDO::PARAM_STR);
  try 
  {
    $stmt->execute();
    $rows = $stmt->rowCount();
    if($rows > 0)  
      {
        $_SESSION['personal']['email_address'] = "This email address already exists.";
      }
    //print_r("This statement returns $rows ", $rows);
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }
  $salt = crypt($password, $email_address);
    $cryptpass = hash('sha256', $salt);
  //query
  if (empty($_SESSION['personal'])) 
  {
    $result_new = $link->prepare("INSERT INTO apprentice (first_name, last_name, email_address, password, cohort_id, major, graduation_date, address, city, state, zip_code, institution_id, mobile_phone, linkedin_profile, online_portfolio, other, age, work_status) VALUES (:first_name, :last_name, :email_address, :password, :cohort, :major, :graduation_date, :address, :city, :state, :zip_code, :university_id, :mobile_phone, :linkedin_profile, :online_portfolio, :other, :age, :work_authorization)");
    $result_new->bindParam(':first_name', $first_name, PDO::PARAM_STR);
    $result_new -> bindParam(':last_name', $last_name, PDO::PARAM_STR);
    $result_new -> bindParam(':email_address', $email_address, PDO::PARAM_STR);
    $result_new -> bindParam(':password', $cryptpass, PDO::PARAM_STR);
    $result_new -> bindParam(':cohort', $cohort, PDO::PARAM_INT);
    $result_new -> bindParam(':major', $major_name, PDO::PARAM_STR);
    $result_new -> bindParam(':graduation_date', $graduation_date, PDO::PARAM_STR);
    $result_new -> bindParam(':address', $address, PDO::PARAM_STR);
    $result_new -> bindParam(':city', $city, PDO::PARAM_STR);
    
    $result_new -> bindParam(':state', $state, PDO::PARAM_STR);
    $result_new -> bindValue(':zip_code', $postal_code, PDO::PARAM_INT);
    $result_new -> bindParam(':university_id', $university_name, PDO::PARAM_STR);
    $result_new -> bindParam(':mobile_phone', $mobile_phone, PDO::PARAM_STR);
    $result_new -> bindParam(':linkedin_profile', $linkedin, PDO::PARAM_STR);
    $result_new -> bindParam(':online_portfolio', $online_portfolio, PDO::PARAM_STR);
    $result_new -> bindParam(':other', $other, PDO::PARAM_STR);
    $result_new -> bindParam(':age', $age, PDO::PARAM_STR);
    $result_new -> bindParam(':work_authorization', $work_authorization, PDO::PARAM_STR);
    $result_new->execute();
    $insertId = $link->lastInsertId();

    //after the initial data is executed, we get the lastInsertId for the path_link table
    $insertStmt = $link->prepare("INSERT INTO path_link(path_id, apprentice_id) VALUES(:path_id, :apprentice_id)");
    $insertStmt->bindParam(':path_id', $path_to_a100);
    $insertStmt->bindParam(':apprentice_id', $insertId);
    //for each of the checked box  
    foreach ($_POST['path_to_a100'] as $path_to_a100)     
    $insertStmt->execute();
    
    //test query

    //$result = $link->exec("INSERT INTO apprentice (first_name, last_name, email_address, major, graduation_date, address, city, state, zip_code, mobile_phone, linkedin_profile, online_portfolio, other, age, work_status) 
    // VALUES ('$first_name', '$last_name', '$email_address', '$major_name', '$graduation_date', '$address', '$city', '$state', '$postal_code', '$mobile_phone', '$linkedin', '$online_portfolio', '$other', '$age', '$work_authorization')");
    //$insertId = $link->lastInsertId();

  

    header("location:welcome.php");
  }
  else 
  {

    $_SESSION['data'] = array();
    foreach ($_POST as $id => $val) 
    {
     $_SESSION['data'][$id] = $val;
   }
   header("location:index.php");
 }

}




?>