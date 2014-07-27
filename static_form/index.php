<?php
require_once "database.php" ;

session_start();
// $db = new PDO('mysql: host=localhost; dbname=a100_apprentice_form_schema; charset=utf8', 'root', 'root');
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

 try {
         $stmt_institution=$db->prepare("SELECT * FROM institution ORDER BY institution_name ASC");
         $stmt_institution->execute();
         $data_institution = $stmt_institution->fetchAll(PDO::FETCH_ASSOC);
         }catch (PDOException $e){
               echo "error" . $e->getMessage();
         }  
  try {
         $stmt_cohort=$db->prepare("SELECT * FROM cohort");
         $stmt_cohort->execute();
         $data_cohort = $stmt_cohort->fetchAll(PDO::FETCH_ASSOC);
       } catch (PDOException $e) { echo "error" . $e->getMessage(); }   
        if(empty($data_cohort)) {  echo "cohort--There were no records."; }  
  try {
         $stmt_state=$db->prepare("SELECT * FROM state");
         $stmt_state->execute();
         $data_state = $stmt_state->fetchAll(PDO::FETCH_ASSOC);
         }catch (PDOException $e){
               echo "error" . $e->getMessage();
      }  
              
  try {
         $stmt_path=$db->prepare("SELECT * FROM path_to_a100");
          $stmt_path->execute();
         $data_path = $stmt_path->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
                 echo "error" . $e->getMessage();
         }   
         if(empty($data_path)) {   echo "path--There were no records."; }
 
   try {
          $stmt_pro=$db->prepare("SELECT * FROM programming_experience");
          $stmt_pro->execute();
          $data_pro = $stmt_pro->fetchAll(PDO::FETCH_ASSOC);
            }catch (PDOException $e){    echo "error" . $e->getMessage();}
            if(empty($data_pro)) { echo "programming-There were no records."; }
            
    try {
          $stmt_work=$db->prepare("SELECT * FROM work_experience");
          $stmt_work->execute();
          $data_work = $stmt_work->fetchAll(PDO::FETCH_ASSOC);
         }catch (PDOException $e){   echo "error" . $e->getMessage();}   
         if(empty($data_work)) { echo "work-ex: There were no records."; }         
      
 if (isset($_SESSION['personal'])) {
                $first_name = $_SESSION['data']['first_name'];
                $last_name = $_SESSION['data']['last_name'];
                $email_address = $_SESSION['data']['email_address'];
                $password = $_SESSION['data']['password'];
 }
                            
    if (isset($_SESSION['personal']['done'])) {
          echo '<font color="green">' . $_SESSION['reg']['done'] . '</font>';
       }
   if (isset($_SESSION['personal']['first_name'])) {
      echo '<font color="red">' . $_SESSION['reg']['first_name'] . '</font>' ;
   }
   
    if (isset($_SESSION['personal']['last_name'])) {
          echo '<font color="red">' . $_SESSION['reg']['last_name'] . '</font>';
     }
     if (isset($_SESSION['personal']['email_address'])) {
         echo '<font color="red">' . $_SESSION['reg']['email_address'] . '</font>';
     }
     if (isset($_SESSION['personal']['password'])){
        echo '<font color="red">' . $_SESSION['reg']['password'] . '</font>'; 
     }
    if (isset($_SESSION['personal']['institution_id'])) {
            echo '<font color="red">' . $_SESSION['reg']['institution_id'] . '</font>';
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
	<form class="form-horizontal" role="form" id="personal" action="personal_validation.php" method="POST" autocomplete="on">
		<fieldset class="col-sm-12 well">
			<legend  class="scheduler-border">Personal Details</legend>
			<div class="form-group">
				<label for="first_name" class="col-sm-2 control-label">First Name</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="first_name" placeholder="Enter First Name">
				</div>
				<label for="last_name" class="col-sm-2 control-label">Last Name</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="last_name" placeholder="Enter Last Name">
				</div>
			</div>
                        <div class="form-group">
				<label for="email_address" class="col-sm-1 control-label">Email:</label>
				<div class="col-sm-3">
                                    <input type="email" class="form-control" name="email_address" placeholder="Enter Email Address:" value="<?php echo $email_address ?>">
				</div>
				<label for="password" class="col-sm-1 control-label" >Password: </label>
				<div class="col-sm-3">
					<input type="password" class="form-control" name='password' placeholder="Password" value="<?php echo $password ?>">
				</div>
<!--                                <label for="confirm" class="col-sm-1 control-label">Confirm:</label>
				<div class="col-sm-3">
					<input type="password" class="form-control" name="confirm" placeholder="Re-enter Password">
				</div>-->
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
					<input type="text" class="form-control" name="major" placeholder="Enter your major">
				</div>
		</div>
			<div class="form-group">
				<label for="graduation_date" class="col-sm-3 control-label">What is your graduation date?</label>
				<div class="col-sm-9">
                                    <input type="date" class="form-control" name="graduation_date" placeholder="Enter your graduation date" value="<?php echo $graduation_date ?>">
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
				<label class="col-sm-1 control-label">State</label>
				<div class="col-sm-3">
			<select class="form-control" name="state_id">
                        <?php foreach($data_state as $row) : ?>
                            <option value= "<?php echo $row['state_id'];?>"<?php if($option==$row['state_id']){ $selected="selected";} ?>>
                                  <?php echo $row['name']; ?> </option>
                           <?php endforeach; ?>  
                       </select>	
				</div>
				<label class="col-sm-2 control-label">Zip Code</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="zip" placeholder="Postal Code:">
				</div>
			
			</div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Mobile Phone</label>
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
				<label class="col-sm-3 control-label">Are you 18 or older?</label>
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
				<label class="col-sm-3 control-label">Are you a US citizen, a permanent resident or a resident-alien?
				 </label>
                                <div class="col-sm-9">
					<label class="radio-inline">
					   <input type="radio" name="residency_status" value="yes">
							Yes
					</label>
					<label class="radio-inline">
                                            <input type="radio" name="residency_status" value="no">
							No
					</label>
                                  <p class="alert-info" style="font-size:0.8em;">IMPORTANT: If you are a foreign student on an F-1 Visa or other student visa, please note it in the "Additional Information" section at the bottom of the page. We are eager to work with international students on student visas of all types. Depending on your status, we can help counsel you on your pathway to an H1-B or similar visa type.</p>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">How did you hear about us?</label>
				<div class="col-sm-9">
					<select class="form-control" name="path_id">
                                            <?php foreach($data_path as $row) : ?>
                                                   <option value="<?php echo $row['path_id']; ?>"<?php if(option==$row['path_id']) { $selected="selected"; } ?>>
                                                       <?php echo $row['description']; ?> 
                                              </option>
                                            <?php endforeach; ?>
					</select>
                                    </div>
                                </div>
                        <div class="form-group">
					<label for="other_path" class="col-sm-3 control-label">Other Source (if any):</label>
                                        <div class="col-sm-9">
						<input type="text" class="form-control" name="other_path" placeholder="Specify other Source if you have: ">
			     </div>
                        </div>
			<div class="form-group">
      			<div class="col-sm-offset-3 col-sm-9">
      				<button type="submit" class="btn btn-primary" id="personal_info_submit">Save this section</button>
    			</div>
    			</div>
		</fieldset>
	</form>
	<form class="form-horizontal" role="form" method="POST" id="schedule" action="schdule_validation.php">
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
                                    <textarea class="form-control" name="other_schedule_commit" rows="6" placeholder="What are all of your unchangeable time commitments? Please include any classes you are taking, work schedules, vacations you plan to take, and important personal commitments, including both weekdays and WEEKENDS.">
                                    </textarea>
				</div>
			</div>
			<div class="form-group">
    			<div class="col-sm-offset-3 col-sm-9">
      				<button type="submit" name="button_schedule" id="button_schedule" class="btn btn-primary">Save this section</button>
    			</div>
  			</div>
		</fieldset>
	</form>

	<form class="form-horizontal" role="form" method="POST" id="technical" action="tech_validation">
		<fieldset class="col-sm-12 well">
			<legend  class="scheduler-border">Technical Experience</legend>
			<div class="form-group">
				<label for="program_id" class="col-sm-3 control-label">How much programming experience do you have?</label>
				<div class="col-sm-9">
                                        <?php foreach($data_pro as $row) : ?>
                                              <input type="radio" name="program_id" value= "<?php echo $row['program_id'];?>"><?php echo "    " . $row['description']; ?> <br>
                                        <?php endforeach ?> 
			    </div>
                        </div>    
			<div class="form-group">
				
				<label for="other_commit" class="col-sm-3 control-label">Any other commitments? Please list them out</label>
				<div class="col-sm-9">
					<textarea class="form-control" name="list_commit" rows="6" placeholder="What are all of your unchangeable time commitments? Please include any classes you are taking, work schedules, vacations you plan to take, and important personal commitments, including both weekdays and WEEKENDS."></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="work_experience" class="col-sm-3 control-label">How much work experience do you have?</label>
				<div class="col-sm-9">
                                    <?php 
                                       foreach($data_work as $row) : ?>
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
					<textarea class="form-control" name='front_end' rows="6" placeholder="Please enter your experience with front-end languages"></textarea>
				</div>
			</div>

			<div class="form-group">
				
				<label for="other_commit" class="col-sm-3 control-label">What is your experience relating to the LAMP (Linux, Apache, MySQL, PHP) application stack?</label>
				<div class="col-sm-9">
					<textarea class="form-control" name='lamp' rows="6" placeholder="Please enter your experience with LAMP Stack "></textarea>
				</div>
			</div>

			<div class="form-group">
				
				<label for="other_commit" class="col-sm-3 control-label">Explain your experience with mobile app development (Android, iOS, Windows Mobile)</label>
				<div class="col-sm-9">
					<textarea class="form-control" name='mobile' rows="6" placeholder="Please explain your experience with mobile application development"></textarea>
				</div>
			</div>

			<div class="form-group">
				
				<label for="other_commit" class="col-sm-3 control-label">What is your experience with Content Management Systems (Drupal, Joomla, WordPress, etc.)?</label>
				<div class="col-sm-9">
					<textarea class="form-control" name='content_mgmt' rows="6" placeholder="Please explain your experience with content management systems"></textarea>
				</div>
			</div>

			<div class="form-group">
				
				<label for="other_commit" class="col-sm-3 control-label">Any other Relevant Experience? Please list that out</label>
				<div class="col-sm-9">
					<textarea class="form-control" name='relative_experience' rows="6" placeholder="Please list out any other relevant experience"></textarea>
				</div>
			</div>
			<div class="form-group">
    			<div class="col-sm-offset-3 col-sm-9">
      				<button type="submit" class="btn btn-primary" name="button_tech" id="button_tech">Save this section</button>
                                <input type="hidden" name="submit" value="$apprentice_id">
    			</div>
  			</div>
		</fieldset>
	</form>
	<form class="form-horizontal" role="form" method="POST" id="support">
		<fieldset class="col-sm-12 well">
			<legend  class="scheduler-border">
				Supporting Documents
			</legend>
			<label class="alert-info">We ask for a resume, cover letter, and references from at least 2 people who can attest to your suitability to work as a software developer.
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
						<br /><p style="font-size:10px;" class="alert-info">Your cover letter should address why you are applying for the A100 Program, why you would be a good candidate, and what got you interested in startups.
						</p>
					</div>
				</div>

				<div class="form-group">
				
					<label for="references" class="col-sm-3 control-label">References:</label>
					<div class="col-sm-9">
						<textarea required class="form-control" name='references' rows="6" placeholder="(Example: Professor Jim Honeycutt, University of Northern Connecticut, honeycutt.j@unct.edu)"></textarea>
					</div>
				</div>
			<div class="form-group">
				
				<label for="other_commit" class="col-sm-3 control-label">Any other additional information that needs to be listed out</label>
				<div class="col-sm-9">
					<textarea class="form-control" name='additional_info' rows="6" placeholder="Please list out any other additoinal information pertaining to the application"></textarea>
				</div>
			</div>
			<div class="form-group">
    			<div class="col-sm-offset-3 col-sm-9">
      				<button type="submit" class="btn btn-primary" id="button_support_doc" name="button_support_doc">Save this section</button>
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
    <script src="js/bootstrap.js"></script>
    <script src="js/main.js"></script>
</body>
</html>