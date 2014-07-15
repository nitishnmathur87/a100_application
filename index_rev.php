<?=

session_start();
include "utility/debug.php";
//require_once "utility/database.php";
  try {
    $db = new PDO('mysql: host=localhost; dbname=a100_apprentice_form_schema; charset=utf8', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  }catch (PDOException $e) {
    echo "connection failed". $e->getMessage();
 }
 
 try {
         $stmt_institution=$db->prepare("SELECT * FROM institution");
         $stmt_institution->execute();
         $data_institution = $stmt_institution->fetchAll(PDO::FETCH_ASSOC);
         }catch (PDOException $e){
               echo "error" . $e->getMessage();
         }  
         if(empty($data_institution)) { echo "There were no records."; }
         
  try {
         $stmt_cohort=$db->prepare("SELECT * FROM cohort");
         $stmt_cohort->execute();
         $data_cohort = $stmt_cohort->fetchAll(PDO::FETCH_ASSOC);
       } catch (PDOException $e) { echo "error" . $e->getMessage(); }   
        if(empty($data_cohort)) {  echo "There were no records."; }     
        
  try {
         $stmt_state=$db->prepare("SELECT * FROM state");
         $stmt_state->execute();
         $data_state = $stmt_state->fetchAll(PDO::FETCH_ASSOC);
         }catch (PDOException $e){
               echo "error" . $e->getMessage();
      }  
              
  try {
         $stmt=$db->prepare("SELECT * FROM path_to_a100");
          $stmt->execute();
         $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
                                   echo "error" . $e->getMessage();
         }   
         if(empty($data)) {   echo "There were no records."; }
 
   try {
          $stmt_pro=$db->prepare("SELECT * FROM programming_experience");
          $stmt_pro->execute();
          $data_pro = $stmt_pro->fetchAll(PDO::FETCH_ASSOC);
            }catch (PDOException $e){    echo "error" . $e->getMessage();}
            if(empty($data)) { echo "There were no records."; }
            
    try {
          $stmt_work=$db->prepare("SELECT * FROM work_experience");
          $stmt_work->execute();
          $data_work = $stmt->fetchAll(PDO::FETCH_ASSOC);
         }catch (PDOException $e){   echo "error" . $e->getMessage();}   
         if(empty($data_work)) { echo "There were no records."; }         
      
 if (isset($_SESSION['reg'])) {
                $first_name = $_SESSION['data']['first_name'];
                $last_name = $_SESSION['data']['last_name'];
                $email_address = $_SESSION['data']['email_address'];
                $password = $_SESSION['data']['password'];
 }
                            
    if (isset($_SESSION['reg']['done'])) {
          echo '<font color="green">' . $_SESSION['reg']['done'] . '</font>';
       }
   if (isset($_SESSION['reg']['first_name'])) {
      echo '<font color="red">' . $_SESSION['reg']['first_name'] . '</font>' ;
   }
   
    if (isset($_SESSION['reg']['last_name'])) {
                        echo '<font color="red">' . $_SESSION['reg']['last_name'] . '</font>';
     }
     if (isset($_SESSION['reg']['email_address'])) {
         echo '<font color="red">' . $_SESSION['reg']['email_address'] . '</font>';
     }
     if (isset($_SESSION['reg']['password'])){
        echo '<font color="red">' . $_SESSION['reg']['password'] . '</font>'; 
     }
     if (isset($_SESSION['reg']['confirm'])){
           echo '<font color="red">' . $SESSION['reg']['confirm']  . '</font>';
     }
    if (isset($_SESSION['reg']['institution_id'])) {
            echo '<font color="red">' . $_SESSION['reg']['institution_id'] . '</font>';
       }

    if (isset($_SESSION['reg']['major'])) {
            echo '<font color="red">' . $_SESSION['data']['major'] . '</font>' ;
       }

    if (isset($_SESSION['reg']['graduation_date'])) {
            echo '<font color="red">' . $_SESSION['reg']['graduation_date'] . '</font>';
       }
    if (isset($_SESSION['reg']['cohort_id'])) {
            echo '<font color="red">' . $_SESSION['reg']['cohort_id'] . '</font>';
       }
    if(isset($_SESSION['reg']['address'])){
        echo '<font color="red">'.$_SESSION['data']['address'].'</font>' ;
    } 
    if (isset($_SESSION['reg']['city'])) {
            echo '<font color="red">' . $_SESSION['reg']['city'] . '</font>';
       }
    if (isset($_SESSION['reg']['state'])) {
            echo '<font color="red">' . $_SESSION['reg']['state'] . '</font>';
       }
       
    if (isset($_SESSION['reg']['zip'])) {
            echo '<font color="red">' . $_SESSION['reg']['zip'] . '</font>';
       }
    if (isset($_SESSION['reg']['phone'])) {
            echo '<font color="red">' . $_SESSION['reg']['phone'] . '</font>';
       }   
    if (isset($_SESSION['reg']['linkedin'])) {
            echo '<font color="red">' . $_SESSION['reg']['linkedin'] . '</font>';
       }
    if (isset($_SESSION['reg']['portfolio'])) {
            echo '<font color="red">' . $_SESSION['reg']['portfolio'] . '</font>';
       } 
       
   if (isset($_SESSION['reg']['age'])) {
            echo '<font color="red">' . $_SESSION['reg']['age'] . '</font>';
       } 
       
    if (isset($_SESSION['reg']['residency'])) {
            echo '<font color="red">' . $_SESSION['reg']['residency'] . '</font>';
       }  
       
    if (isset($_SESSION['reg']['path_id'])) {
            echo '<font color="red">' . $_SESSION['reg']['path_id'] . '</font>';
       }  
       
    if (isset($_SESSION['reg']['other'])) {
            echo '<font color="red">' . $_SESSION['reg']['other'] . '</font>';
       }   

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>A100 Apprentice Application Form</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head>
<body>
	<div class="container-fluid"></div>
	<h1 class="col-md-12">A100 Apprentice Application Form</h1>
	<form class="form-horizontal" role="form" id="personal" action="personal_detail.php" method="POST">
		<fieldset class="col-sm-12 well">
			<legend  class="scheduler-border">Personal Details</legend>
			<div class="form-group">
				<label for="first_name" class="col-sm-2 control-label" id="first_name">First Name</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="first_name" placeholder="Enter First Name">
				</div>
				<label for="last_name" class="col-sm-2 control-label">Last Name</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="last_name" placeholder="Enter Last Name">
				</div>
			</div>
                        <div class="form-group">
				<label for="email" class="col-sm-1 control-label">Email:</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="email" placeholder="Enter Email Address:" value="<?php echo $email_address ?>">
				</div>
				<label for="password" class="col-sm-1 control-label">Password: </label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="password" placeholder="Password">
				</div>
                                <label for="confirm" class="col-sm-1 control-label">Confirm:</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="confirm" placeholder="Re-enter Password">
				</div>
	        </div>
		<div class="form-group">
				<label for="institution_id" class="col-sm-3 control-label">What is the name of your university?</label>
				<div class="col-sm-9">
                                    <select class="form-control" name="institution_id">
                                        <?php foreach($data_institution as $row) : ?>
                                              <option value= "<?php echo $row['id'];?>"<?php if($option==$row['id']) $selected="selected" ;?>>
                                                  <?php echo $row['institution_name']; ?> </option>
                                        <?php endforeach; ?>  
                                     </select>
				</div>
		</div>
		<div class="form-group">
				<label for="major" class="col-sm-3 control-label">What is your Major?</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="major" placeholder="Enter your major">
				</div>
		</div>
			<div class="form-group">
				<label for="graduation_date" class="col-sm-3 control-label">What is your graduation date?</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="graduation_date" placeholder="Enter your graduation date in the form of: mm/dd/yyyy" value="<?php echo $graduation_date ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="cohort_id" class="col-sm-3 control-label">Which Cohort are you applying to?</label>
				<div class="col-sm-9">
					<select class="form-control" name="cohort_id">
                                            <?php foreach($data_cohort as $row) : ?>
                                                <option value= "<?php echo $row['cohort_id'];?>"<?php if(option==$row['cohort_id']) '$selected="selected"' ?>>
                                                       <?php echo $row['schedule']; ?> </option>
                                            <?php endforeach ?>  
                                        </select>
				</div>
			</div>
			<div class="form-group">
				<label for="address" class="col-sm-3 control-label">Address</label>
				<div class="col-sm-9">
                                    <input type="text" class="form-control" name="address" placeholder="enter your address" value="<?php echo $address?>">
<!--                                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address here"></textarea>-->
				</div>
			</div>
			<div class="form-group">
				<label for="city" class="col-sm-1 control-label">City</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="city" name="city" placeholder="Name of city" value="<?php echo $city ?>">
				</div>
				<label for="state" class="col-sm-1 control-label">State</label>
				<div class="col-sm-3">
			<select class="form-control" id="state" name="state">
                        <?php foreach($data_state as $row) : ?>
                            <option value= "<?php echo $row['state_id'];?>"<?php if($option==$row['state_id']) $selected="selected"; ?>>
                                  <?php echo $row['name']; ?> </option>
                           <?php endforeach; ?>  
                       </select>	
				</div>
				<label for="zip_code" class="col-sm-2 control-label">Zip Code</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="zip_code" name="zip" placeholder="Postal Code:">
				</div>
			
			</div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-3 control-label">Mobile Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="phone" placeholder="Enter mobile phone number. Format: (###)-###-####">
			    </div>
                            </div>
                          <div class="form-group">
				<label for="linkedin" class="col-sm-3 control-label">LinkedIn URL</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Enter your LinkedIn profile URL">
				</div>
			</div>
			<div class="form-group">
				
				<label for="portfolio" class="col-sm-3 control-label">Online Portfolio URL</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="portfolio" name="portfolio" placeholder="Enter your Online Portfolio URL">
				</div>
			</div>
			<div class="form-group" >
				<label for="age"  class="col-sm-3 control-label">Are you 18 or older?</label>
				<div class="col-sm-9">
                                <label class="radio-inline">
					<input type="radio" name="age" value="yes">Yes
                                </label>
                                <label class="radio-inline">
					<input type="radio" name="age"  value="no">No
                                </label>
				</div>
			</div>
			<div class="form-group">
				<label for="residency" class="col-sm-3 control-label">Are you a US citizen, a permanent resident or a resident-alien?
				 </label>
                                <div class="col-lg-2">
					<label class="radio-inline">
					   <input type="radio" name="residency" value="yes">
							Yes
					</label>
					<label class="radio-inline">
                                            <input type="radio" name="residency" value="no">
							No
					</label>
				</div>
                            <div id="important"><p class="fsSupport">IMPORTANT: If you are a foreign student on an F-1 Visa or other student visa, please note it in the "Additional Information" section at the bottom of the page. We are eager to work with international students on student visas of all types. Depending on your status, we can help counsel you on your pathway to an H1-B or similar visa type.</p></div>
			</div>

			<div class="form-group">
				<label for="path_id" class="col-sm-3 control-label">How did you hear about us?</label>
				<div class="col-sm-9">
					<select class="form-control" id="path_id" name="path_id" multiple="multiple" >
                                            <?php foreach($data as $row) : ?>
                                                   <option value= "<?php echo $row['path_id']; ?>"><?php echo $row['description']; ?> </option>
                                            <?php endforeach; ?>
					</select>
                                    </div>
                                </div>
                        <div class="form-group">
					<label for="other" class="col-sm-3 control-label">Other Source (if any):</label>
                                        <div class="col-sm-9">
						<input type="text" class="form-control" id="other" name="other" placeholder="Any other Source">
			     </div>
                        </div>
			<div class="form-group">
      			<div class="col-sm-offset-3 col-sm-9">
                               <input type="hidden" id="apprentice_id">
      				<button type="submit" class="btn btn-primary" id="personal_info_submit">Save this section</button>
                                
    			</div>
    			</div>
		</fieldset>
	</form>
	<form class="form-horizontal" role="form" method="POST" id="schedule">
		<fieldset class="col-sm-12 well">
			<legend  class="scheduler-border">Schedule</legend>
			<div class="form-group">
				<label for="hours" class="col-sm-3 control-label">How many hours per week will you be able to dedicate to the A100 program and homework?</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="hours" name="hours" placeholder="Enter number of hours available per week">
				</div>
			</div>
			<div class="form-group">
				<label for="other_commit" class="col-sm-3 control-label">Any other Commitments? Please list them out</label>
                                <div class="col-sm-9" id="other_commit"> 
                                    <textarea class="form-control" name="other_commit" rows="6" placeholder="What are all of your unchangeable time commitments? Please include any classes you are taking, work schedules, vacations you plan to take, and important personal commitments, including both weekdays and WEEKENDS.">
                                         <?php echo $other_commit ?>
                                    </textarea>
				</div>
			</div>
			<div class="form-group">
    			<div class="col-sm-offset-3 col-sm-9">
      				<button type="submit" class="btn btn-primary">Save this section</button>
    			</div>
  			</div>
		</fieldset>
	</form>

	<form class="form-horizontal" role="form" method="POST" id="technical">
		<fieldset class="col-sm-12 well">
			<legend  class="scheduler-border">Technical Experience</legend>
			<div class="form-group">
				<label for="program_id" class="col-sm-3 control-label">How much programming experience do you have?</label>
				<div class="col-sm-9">
                                        <?php foreach($data as $row) : ?>
                                              <input type="radio" name="program_id" value= "<?php echo $row['program_id'];?>"><?php echo "    " . $row['description']; ?> <br>
                                        <?php endforeach ?> 
			    </div>
                        </div>    
			<div class="form-group">
				
				<label for="other_commit" class="col-sm-3 control-label">Any other commitments? Please list them out</label>
				<div class="col-sm-9">
					<textarea class="form-control" id="other_commit" rows="6" placeholder="What are all of your unchangeable time commitments? Please include any classes you are taking, work schedules, vacations you plan to take, and important personal commitments, including both weekdays and WEEKENDS."></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="work_experience" class="col-sm-3 control-label">How much work experience do you have?</label>
				<div class="col-sm-9">
                                    <?php 
                                       foreach($data as $row) : ?>
                                            <input type="radio" name="work_experience" value= "<?php echo $row['work_id'];?>"><?php echo "    " . $row['description']; ?> <br>
                                            <?php endforeach ?> 
                                  </div>
			</div>
			<div class="form-group">
				<label for="job_title" class="col-sm-3 control-label">What was your last job title (or current, if you are still working there), and where?</label>
				<div class="col-sm-9">
					<input type="text" name="job_title" class="form-control" placeholder="Enter your current or past job title">
				</div>
			</div>

			<div class="form-group">
				
				<label for="front_end" class="col-sm-3 control-label">Explain your experience with front-end languages (HTML/CSS/ JavaScript)</label>
				<div class="col-sm-9">
					<textarea class="form-control" id="address" rows="6" placeholder="Please enter your experience with front-end languages"></textarea>
				</div>
			</div>

			<div class="form-group">
				
				<label for="other_commit" class="col-sm-3 control-label">What is your experience relating to the LAMP (Linux, Apache, MySQL, PHP) application stack?</label>
				<div class="col-sm-9">
					<textarea class="form-control" id="address" rows="6" placeholder="Please enter your experience with LAMP Stack "></textarea>
				</div>
			</div>

			<div class="form-group">
				
				<label for="other_commit" class="col-sm-3 control-label">Explain your experience with mobile app development (Android, iOS, Windows Mobile)</label>
				<div class="col-sm-9">
					<textarea class="form-control" id="address" rows="6" placeholder="Please explain your experience with mobile application development"></textarea>
				</div>
			</div>

			<div class="form-group">
				
				<label for="other_commit" class="col-sm-3 control-label">What is your experience with Content Management Systems (Drupal, Joomla, WordPress, etc.)?</label>
				<div class="col-sm-9">
					<textarea class="form-control" id="address" rows="6" placeholder="Please explain your experience with content management systems"></textarea>
				</div>
			</div>

			<div class="form-group">
				
				<label for="other_commit" class="col-sm-3 control-label">Any other Relevant Experience? Please list that out</label>
				<div class="col-sm-9">
					<textarea class="form-control" id="address" rows="6" placeholder="Please list out any other relevant experience"></textarea>
				</div>
			</div>
			<div class="form-group">
    			<div class="col-sm-offset-3 col-sm-9">
      				<button type="submit" class="btn btn-primary">Save</button>
    			</div>
  			</div>
		</fieldset>
	</form>
	<form class="form-horizontal" role="form" method="POST" id="technical">
		<fieldset class="col-sm-12 well">
			<legend  class="scheduler-border">
				Supporting Documents
			</legend>
			<label>We ask for a resume, cover letter, and references from at least 2 people who can attest to your suitability to work as a software developer.
				If you don't yet have a resume or cover letter, feel free to submit without them for now, but make sure to complete your application by e-mailing them to krishna@indie-soft.com within TWO days of your submission.</label>
				<br /><br />
				<div class="form-group">
					<label for="resume" class="col-sm-5 control-label">Upload your resume with this filename format "Firstname Lastname Resume"</label>
					<div class="col-sm-7 fileupload fileupload-new" data-provides="fileupload" id="resume">
						<span class="btn btn-primary btn-file"><span class="fileupload-new">Select file</span>
						<span class="fileupload-exists">Change</span>         <input type="file" /></span>
						<span class="fileupload-preview"></span>
						<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>

					</div>
				</div>
				<div class="form-group">
					<label for="cover_letter" class="col-sm-5 control-label">Upload a cover letter (250 words maximum) with this filename format: "Firstname Lastname Cover Letter"</label>
					<div class="col-sm-7 fileupload fileupload-new" data-provides="fileupload" id="cover_letter">
						<span class="btn btn-primary btn-file"><span class="fileupload-new">Select file</span>
						<span class="fileupload-exists">Change</span>         <input type="file" /></span>
						<span class="fileupload-preview"></span>
						<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a><br>
						<br /><p style="font-size:10px;">Your cover letter should address why you are applying for the A100 Program, why you would be a good candidate, and what got you interested in startups.
						</p>
					</div>
				</div>

				<div class="form-group">
				
					<label for="references" class="col-sm-3 control-label">References:</label>
					<div class="col-sm-9">
						<textarea required class="form-control" id="address" rows="6" placeholder="(Example: Professor Jim Honeycutt, University of Northern Connecticut, honeycutt.j@unct.edu)"></textarea>
					</div>
				</div>
			
			<div class="form-group">
				
				<label for="other_commit" class="col-sm-3 control-label">Any other additonal information that needs to be listed out</label>
				<div class="col-sm-9">
					<textarea class="form-control" id="address" rows="6" placeholder="Please list out any other additoinal information pertaining to the application"></textarea>
				</div>
			</div>

			<div class="form-group">
    			<div class="col-sm-offset-3 col-sm-9">
      				<button type="submit" class="btn btn-primary">Save</button>
    			</div>
  			</div>
  		</fieldset>
  	</form>
  	<div class="form-group">
    	<div style="text-align:center;">
      			<button type="submit" class="btn btn-primary">Submit the Form</button><br /><br />
		</div>
 	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>