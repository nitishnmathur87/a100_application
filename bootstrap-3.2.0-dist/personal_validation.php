<?php
if (isset($_POST['save'])) 
{
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
  $hours = $_POST['hours'];
  $commitments = $_POST['commitments'];
  $programming_experience = $_POST['programming_experience'];
  $work_experience = $_POST['work_experience'];
  $job_title = $_POST['job_title'];
  $front_end = $_POST['front_end'];
  $app_stack = $_POST['app_stack'];
  $mobile_app = $_POST['mobile_app'];
  $cms = $_POST['cms'];
  $other_rel = $_POST['other_rel'];
  $resume = $_POST['resume'];
  $cover_letter = $_POST['cover_letter'];
  $references_field = $_POST['references_field'];
  $additional_info = $_POST['additional_info'];



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
    if (empty($password)) 
    {
      $_SESSION['personal']['password'] = "Please enter password.";
    } 
    else if ((strlen($password)) < 6 ) 
    {
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
      $result_new = $link->prepare("INSERT INTO apprentice (first_name, last_name, email_address, password, cohort_id, major, graduation_date, address, city, state, zip_code, institution_id, mobile_phone, linkedin_profile, online_portfolio, other, age, work_status, hours, commitments) VALUES (:first_name, :last_name, :email_address, :password, :cohort, :major, :graduation_date, :address, :city, :state, :zip_code, :university_id, :mobile_phone, :linkedin_profile, :online_portfolio, :other, :age, :work_authorization, :hours, :commitments)");
      $result_new -> bindParam(':first_name', $first_name, PDO::PARAM_STR);
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
      $result_new -> bindParam(':hours', $hours, PDO::PARAM_INT);
      $result_new -> bindParam(':commitments', $commitments, PDO::PARAM_STR);
      $result_new->execute();
      $insertId = $link->lastInsertId();

      //after the initial data is executed, we get the lastInsertId for the path_link table
      $pathStmt = $link->prepare("INSERT INTO path_link(path_id, apprentice_id) VALUES(:path_id, :apprentice_id)");
      $pathStmt->bindParam(':path_id', $path_to_a100);
      $pathStmt->bindParam(':apprentice_id', $insertId);
      
      //for each of the checked box  
      foreach ($_POST['path_to_a100'] as $path_to_a100)     
        $pathStmt->execute();
    
      //supporting materials sections
      $supportStmt = $link->prepare("INSERT INTO supporting_materials(resume, cover_letter, other, references_field) VALUES(:resume, :cover_letter, :other_support, :references_field)");
      $supportStmt->bindParam(':resume', $resume);
      $supportStmt->bindParam(':cover_letter', $cover_letter);     
      $supportStmt->bindParam(':other_support', $additional_info);
      $supportStmt->bindParam(':references_field', $references_field);
      $supportStmt->execute();
      $supportId = $link->lastInsertId();
      $supportUpdate = $link->prepare("UPDATE apprentice SET support_id = :support_id WHERE apprentice_id = :insertId");
      $supportUpdate -> bindParam(':support_id', $supportId);
      $supportUpdate -> bindValue(':insertId', $insertId);
      $supportUpdate -> execute();
      
      //for technical experience table
      $techStmt = $link->prepare("INSERT INTO technical_experience(other, job_title) VALUES(:other_rel, :job_title)");
      $techStmt->bindParam(':other_rel', $other_rel);
      $techStmt->bindParam('job_title', $job_title);
      $techStmt->execute();
      $techId = $link->lastInsertId();
      $techUpdate = $link->prepare("UPDATE apprentice SET tech_id = :tech_id WHERE apprentice_id = :insertId");
      $techUpdate->bindValue(':tech_id', $techId, PDO::PARAM_INT);
      $techUpdate->bindValue(':insertId', $insertId, PDO::PARAM_INT);
      $techUpdate->execute();
      
      //front-end
      $frontendStmt = $link->prepare("INSERT INTO front_end_language(description) VALUES(:description)");
      $frontendStmt->bindParam(':description', $front_end);
      $frontendStmt->execute();
      $frontendId = $link->lastInsertId();
      $frontendUpdate = $link->prepare("UPDATE technical_experience SET front_end_id = :front_end WHERE tech_id = :techId");
      $frontendUpdate -> bindValue(':front_end', $frontendId, PDO::PARAM_INT);
      $frontendUpdate -> bindValue(':techId', $techId, PDO::PARAM_INT);
      $frontendUpdate -> execute();

      //application stack
      $appstackStmt = $link->prepare("INSERT INTO application_stack(description) VALUES(:description)");
      $appstackStmt->bindParam(':description', $app_stack);
      $appstackStmt->execute();
      $appstackId = $link->lastInsertId();
      $appstackUpdate = $link->prepare("UPDATE technical_experience SET app_stack_id = :app_stack WHERE tech_id = :techId");
      $appstackUpdate -> bindValue(':app_stack', $appstackId, PDO::PARAM_INT);
      $appstackUpdate -> bindValue(':techId', $techId, PDO::PARAM_INT);
      $appstackUpdate -> execute();

      //mobile application development
      $mobileappStmt = $link->prepare("INSERT INTO mobile_app_develop(description) VALUES(:description)");
      $mobileappStmt->bindParam(':description', $mobile_app);
      $mobileappStmt->execute();
      $mobileappId = $link->lastInsertId();
      $mobileappUpdate = $link->prepare("UPDATE technical_experience SET mobile_app_id = :mobile_app WHERE tech_id = :techId");
      $mobileappUpdate -> bindValue(':mobile_app', $mobileappId, PDO::PARAM_INT);
      $mobileappUpdate -> bindValue(':techId', $techId, PDO::PARAM_INT);
      $mobileappUpdate -> execute();

      //content management system
      $cmsStmt = $link->prepare("INSERT INTO content_management_system(description) VALUES(:description)");
      $cmsStmt->bindParam(':description', $app_stack);
      $cmsStmt->execute();
      $cmsId = $link->lastInsertId();
      $cmsUpdate = $link->prepare("UPDATE technical_experience SET content_mgmt_id = :cms WHERE tech_id = :techId");
      $cmsUpdate -> bindValue(':cms', $cmsId, PDO::PARAM_INT);
      $cmsUpdate -> bindValue(':techId', $techId, PDO::PARAM_INT);
      $cmsUpdate -> execute();

      //work experience
      $workStmt = $link->prepare("INSERT INTO technical_experience(work_id) VALUES(:work)");
      $workStmt->bindParam(':work', $work_experience);
      $workStmt->execute();
      
      //programming experience
      $programStmt = $link->prepare("INSERT INTO technical_experience(program_id) VALUES(:program)");
      $programStmt->bindParam(':program', $programming_experience);
      $programStmt->execute();


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
}

if (isset($_POST['submit'])) 
{

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
  $hours = $_POST['hours'];
  $commitments = $_POST['commitments'];
  $programming_experience = $_POST['programming_experience'];
  $work_experience = $_POST['work_experience'];
  $job_title = $_POST['job_title'];
  $front_end = $_POST['front_end'];
  $app_stack = $_POST['app_stack'];
  $mobile_app = $_POST['mobile_app'];
  $cms = $_POST['cms'];
  $other_rel = $_POST['other_rel'];
  $resume = $_POST['resume'];
  $cover_letter = $_POST['cover_letter'];
  $references_field = $_POST['references_field'];
  $additional_info = $_POST['additional_info'];



  if (empty($_POST))
  {

   header("location:index.php");
  } 
  else 
  {
  //check if first name empty{
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
      if (empty($password)) 
      {
        $_SESSION['personal']['password'] = "Please enter password.";
      } 
      else if ((strlen($password)) < 6 ) 
      {
        $_SESSION['personal']['password'] = "Please enter more then 6 characters.";
      }
      //check if email address format
      if (!(filter_var($email_address, FILTER_VALIDATE_EMAIL)))
      {
        $_SESSION['personal']['email_address']= "The Email address is invalid.";
      }
  
      if (empty($mobile_phone))
      {
        $_SESSION['personal']['mobile_phone'] = "Please enter mobile phone  number";
      }
  
      if (empty($city))
      {
        $_SESSION['personal']['city'] = "Please enter your city";
      }
  
      if (empty($postal_code))
      {
        $_SESSION['personal']['postal_code'] = "Please enter your postal code";
      }
  
      if (empty($major_name))
      {
        $_SESSION['personal']['major_name'] = "Please enter name of your major ";
      }
  
      if (empty($graduation_date))
      {
        $_SESSION['personal']['graduation_date'] = "Please enter your graduation date";
      } elseif( !preg_match("/^[1-2]{1}[0-9]{3}-[0-2]{1}[0-9]{1}-[0-3]{1}[0-9]{1}$/i", $graduation_date))
      {
        $_SESSION['personal']['graduation_date'] = "Please enter of the form YYYY-MM-DD";
      }

      if (empty($linkedin))
      {
        $_SESSION['personal']['linkedin'] = "Please enter your linkedin URL";
      } 
      if (empty($hours))
      {
        $_SESSION['personal']['hours'] = "Please enter number of hours you can commit per week to the program";
      }
      if (empty($commitments))
      {
        $_SESSION['personal']['commitments'] = "Please enter your unchangeable commitments";
      }  

      if (empty($front_end))
      {
        $_SESSION['personal']['front_end'] = "Please enter your experience with front end languages else write N/A";
      } 
      if (empty($app_stack))
      {
        $_SESSION['personal']['app_stack'] = "Please enter your experience with Application Stack else write N/A";
      } 
      if (empty($mobile_app))
      {
        $_SESSION['personal']['mobile_app'] = "Please enter your experience with Mobile Application Development else write N/A";
      } 
      if (empty($cms))
      {
        $_SESSION['personal']['cms'] = "Please enter your experience with content management systems else write N/A";
      } 

      if (empty($references_field))
      {
        $_SESSION['personal']['references_field'] = "Please enter your references";
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
        $result_new = $link->prepare("INSERT INTO apprentice (first_name, last_name, email_address, password, cohort_id, major, graduation_date, address, city, state, zip_code, institution_id, mobile_phone, linkedin_profile, online_portfolio, other, age, work_status, hours, commitments) VALUES (:first_name, :last_name, :email_address, :password, :cohort, :major, :graduation_date, :address, :city, :state, :zip_code, :university_id, :mobile_phone, :linkedin_profile, :online_portfolio, :other, :age, :work_authorization, :hours, :commitments)");
        $result_new -> bindParam(':first_name', $first_name, PDO::PARAM_STR);
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
        $result_new -> bindParam(':hours', $hours, PDO::PARAM_INT);
        $result_new -> bindParam(':commitments', $commitments, PDO::PARAM_STR);
        $result_new->execute();
        $insertId = $link->lastInsertId();
  
        //after the initial data is executed, we get the lastInsertId for the path_link table
        $pathStmt = $link->prepare("INSERT INTO path_link(path_id, apprentice_id) VALUES(:path_id, :apprentice_id)");
        $pathStmt->bindParam(':path_id', $path_to_a100);
        $pathStmt->bindParam(':apprentice_id', $insertId);
        
        //for each of the checked box  
        foreach ($_POST['path_to_a100'] as $path_to_a100)     
          $pathStmt->execute();
      
        //supporting materials sections
        $supportStmt = $link->prepare("INSERT INTO supporting_materials(resume, cover_letter, other, references_field) VALUES(:resume, :cover_letter, :other_support, :references_field)");
        $supportStmt->bindParam(':resume', $resume);
        $supportStmt->bindParam(':cover_letter', $cover_letter);     
        $supportStmt->bindParam(':other_support', $additional_info);
        $supportStmt->bindParam(':references_field', $references_field);
        $supportStmt->execute();
        $supportId = $link->lastInsertId();
        $supportUpdate = $link->prepare("UPDATE apprentice SET support_id = :support_id WHERE apprentice_id = :insertId");
        $supportUpdate -> bindParam(':support_id', $supportId);
        $supportUpdate -> bindValue(':insertId', $insertId);
        $supportUpdate -> execute();
        
        //for technical experience table
        $techStmt = $link->prepare("INSERT INTO technical_experience(other, job_title) VALUES(:other_rel, :job_title)");
        $techStmt->bindParam(':other_rel', $other_rel);
        $techStmt->bindParam('job_title', $job_title);
        $techStmt->execute();
        $techId = $link->lastInsertId();
        $techUpdate = $link->prepare("UPDATE apprentice SET tech_id = :tech_id WHERE apprentice_id = :insertId");
        $techUpdate->bindValue(':tech_id', $techId, PDO::PARAM_INT);
        $techUpdate->bindValue(':insertId', $insertId, PDO::PARAM_INT);
        $techUpdate->execute();
        
        //front-end
        $frontendStmt = $link->prepare("INSERT INTO front_end_language(description) VALUES(:description)");
        $frontendStmt->bindParam(':description', $front_end);
        $frontendStmt->execute();
        $frontendId = $link->lastInsertId();
        $frontendUpdate = $link->prepare("UPDATE technical_experience SET front_end_id = :front_end WHERE tech_id = :techId");
        $frontendUpdate -> bindValue(':front_end', $frontendId, PDO::PARAM_INT);
        $frontendUpdate -> bindValue(':techId', $techId, PDO::PARAM_INT);
        $frontendUpdate -> execute();
  
        //application stack
        $appstackStmt = $link->prepare("INSERT INTO application_stack(description) VALUES(:description)");
        $appstackStmt->bindParam(':description', $app_stack);
        $appstackStmt->execute();
        $appstackId = $link->lastInsertId();
        $appstackUpdate = $link->prepare("UPDATE technical_experience SET app_stack_id = :app_stack WHERE tech_id = :techId");
        $appstackUpdate -> bindValue(':app_stack', $appstackId, PDO::PARAM_INT);
        $appstackUpdate -> bindValue(':techId', $techId, PDO::PARAM_INT);
        $appstackUpdate -> execute();
  
        //mobile application development
        $mobileappStmt = $link->prepare("INSERT INTO mobile_app_develop(description) VALUES(:description)");
        $mobileappStmt->bindParam(':description', $mobile_app);
        $mobileappStmt->execute();
        $mobileappId = $link->lastInsertId();
        $mobileappUpdate = $link->prepare("UPDATE technical_experience SET mobile_app_id = :mobile_app WHERE tech_id = :techId");
        $mobileappUpdate -> bindValue(':mobile_app', $mobileappId, PDO::PARAM_INT);
        $mobileappUpdate -> bindValue(':techId', $techId, PDO::PARAM_INT);
        $mobileappUpdate -> execute();
  
        //content management system
        $cmsStmt = $link->prepare("INSERT INTO content_management_system(description) VALUES(:description)");
        $cmsStmt->bindParam(':description', $app_stack);
        $cmsStmt->execute();
        $cmsId = $link->lastInsertId();
        $cmsUpdate = $link->prepare("UPDATE technical_experience SET content_mgmt_id = :cms WHERE tech_id = :techId");
        $cmsUpdate -> bindValue(':cms', $cmsId, PDO::PARAM_INT);
        $cmsUpdate -> bindValue(':techId', $techId, PDO::PARAM_INT);
        $cmsUpdate -> execute();
  
        //work experience
        $workStmt = $link->prepare("INSERT INTO technical_experience(work_id) VALUES(:work)");
        $workStmt->bindParam(':work', $work_experience);
        $workStmt->execute();
        
        //programming experience
        $programStmt = $link->prepare("INSERT INTO technical_experience(program_id) VALUES(:program)");
        $programStmt->bindParam(':program', $programming_experience);
        $programStmt->execute();
        
        //set the complete flag on click of submit button
        $complete = 1;
        $completeUpdate = $link->prepare("UPDATE apprentice SET completed = :complete WHERE apprentice_id=:apprentice_id");
        $completeUpdate->bindValue(':complete', $complete, PDO::PARAM_INT );
        $completeUpdate->bindValue(':apprentice_id', $insertId, PDO::PARAM_INT);
        $completeUpdate->execute();
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

}
?>