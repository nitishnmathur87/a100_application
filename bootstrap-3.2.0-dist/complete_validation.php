<?php

session_start();
$link = new PDO('mysql: host=localhost; dbname=a100_apprentice_form_schema; charset=utf8', 'root', '');
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$link->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$_SESSION['personal'] = array();

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email_address = $_POST['email_address'];
//$password = $_POST['password'];
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

  if (empty($first_name))
  {
    $_SESSION['personal']['first_name'] = "Please enter first name";
  }

  if (empty($last_name))
  {
    $_SESSION['personal']['last_name'] = "Please enter last name";
  }

  if (empty($email_address))
  {
    $_SESSION['personal']['email_address'] = "Please enter email address";
  }

  if (empty($university_name))
  {
    $_SESSION['personal']['university_name'] = "Please enter your university name";
  }

  if (empty($password)) {
    $_SESSION['personal']['password'] = "Please enter password.";
  } else if ((strlen($password)) < 6 ) {
    $_SESSION['personal']['password'] = "Please enter more then 6 characters.";
  }

  if (empty($major_name))
  {
    $_SESSION['personal']['major_name'] = "Please enter your major";
  }

  if (empty($graduation_date))
  {
    $_SESSION['personal']['graduation_date'] = "Please enter your graduation date";
  }

  if (empty($city))
  {
    $_SESSION['personal']['city'] = "Please enter the city you live in";
  }

  if (empty($postal_code))
  {
    $_SESSION['personal']['postal_code'] = "Please enter your postal code";
  }

  if (empty($linkedin))
  {
    $_SESSION['personal']['linkedin'] = "Please enter your linkenin URL else write N/A";
  }
  if (empty($online_portfolio))
  {
    $_SESSION['personal']['online_portfolio'] = "Please enter your a URL else write N/A";
  }
  if (!(filter_var($email_address, FILTER_VALIDATE_EMAIL)))
  {
    $_SESSION['personal']['email_address']= "The Email address is invalid.";
  }

  if (empty($mobile_phone))
  {

    $_SESSION['personal']['mobile_phone'] = "Please enter your Cell Phone Number";
  }
  if( !preg_match("/^([1]-)?([0-9]{3})[0-9]{3}-[0-9]{4}$/i", $mobile_phone))
  {
    $_SESSION['personal']['mobile_phone'] = "Please enter in the right format";
  }
  $stmt = $link->prepare('SELECT * FROM apprentice where email_address = ?');
  $stmt->bindValue(1, $email_address, PDO::PARAM_STR);
  try 
  {
    $stmt->execute();
    $rows = $stmt->rowCount();
    if($rows > 0)  {$_SESSION['personal']['email_address'] = "This email address already exists.";}
    print_r("This statement returns $rows ", $rows);
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }

  if (empty($_SESSION['personal'])) 
  {

  //  $salt = crypt($password, $email_address);
   // $cryptpass = hash('sha256', $salt);

    $result = $link->exec("INSERT INTO apprentice (first_name, last_name, email_address, major, graduation_date, address, city, state, zip_code, mobile_phone, linkedin_profile, online_portfolio, other, age, work_status ) 
     VALUES ('$first_name', '$last_name', '$email_address', '$major_name', '$graduation_date', '$address', '$city', '$state', '$postal_code', '$mobile_phone', '$linkedin', '$online_portfolio', '$other', '$age', '$work_authorization')");
    $insertId = $link->lastInsertId();
   
    header("location:welcome.php");
 
//----------------------------------------------------SCHEDULE---------------------------------
$_SESSION['schedule'] = array();
$hours = $_POST['hours'];
$commitments = $_POST['commitments'];
    if (empty($hours)) {
        $_SESSION['schedule']['hours'] = "Please enter number of hours you can spend per week";
    }
    if (empty($commitments)) {
        $_SESSION['schedule']['commitments'] = "Please list all commitments";
    }
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
