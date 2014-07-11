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
	<h1 class="col-md-12">
		A100 Apprentice Application Form
	</h1>
	<form class="form-horizontal" role="form" method="POST" id="personal">
		<fieldset class="col-sm-12 well">
			<legend  class="scheduler-border">
					Personal Details
			</legend>
			<div class="form-group">
				
				<label for="first_name" class="col-sm-2 control-label">First Name</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="first_name" placeholder="Enter First Name">
				</div>
				<label for="last_name" class="col-sm-2 control-label">Last Name</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="last_name" placeholder="Enter Last Name">
				</div>
			</div>
			<div class="form-group">
				
				<label for="university" class="col-sm-3 control-label">What is the name of your university?</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="university_name" placeholder="Enter University Name">
				</div>
			</div>
			<div class="form-group">
				
				<label for="major" class="col-sm-3 control-label">What is your Major?</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="major_name" placeholder="Enter your major">
				</div>
			</div>
			<div class="form-group">
				
				<label for="graduation_date" class="col-sm-3 control-label">What is your graduation date?</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="graduation_date" placeholder="Enter your graduation date">
				</div>
			</div>
			<div class="form-group">
				
				<label for="cohort" class="col-sm-3 control-label">Which Cohort are you applying to?</label>
				<div class="col-sm-9">
					<!--<input type="text" class="form-control" id="cohort" placeholder="Choose the Cohort">-->
					<select class="form-control" id="cohort">
						<option selected>Please chose which Cohort are you applying to</option>
  						<option>Cohort 1</option>
  						<option>Cohort 2</option>
						<option>Cohort 3</option>
 						<option>Cohort 4</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				
				<label for="address" class="col-sm-3 control-label">Address</label>
				<div class="col-sm-9">
					<textarea class="form-control" id="address" rows="3" placeholder="Enter your address here"></textarea>
				</div>
			</div>
			<div class="form-group">
				
				<label for="city" class="col-sm-1 control-label">City</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="city" placeholder="Name of city">
				</div>
				<label for="state" class="col-sm-1 control-label">State</label>
				<div class="col-sm-3">
					<!--<textarea class="form-control" id="address" rows="3" placeholder="Enter your address here"></textarea>-->
					<select class="form-control" id="state">
						<option selected>State</option>
  						<option>Alabama</option>
  						<option>Alaska</option>
  						<option>Arizona</option>
  						<option>Arkansas</option>
  						<option>California</option>
  						<option>Colorado</option>
  						<option>Connecticut</option>
  						<option>Delaware</option>
  						<option>Florida</option>
  						<option>Georgia</option>
  						<option>Hawaii</option>
  						<option>Idaho</option>
  						<option>Illinois</option>
  						<option>Indiana</option>
  						<option>Iowa</option>
  						<option>Kansas</option>
  						<option>Kentucky</option>
  						<option>Louisiana</option>
  						<option>Maine</option>
  						<option>Maryland</option>
  						<option>Massachusetts</option>
  						<option>Michigan</option>
  						<option>Minnesota</option>
  						<option>Mississippi</option>
  						<option>Missouri</option>
  						<option>Montana</option>
  						<option>Nebraska</option>
  						<option>Nevada</option>
  						<option>New Hampshire</option>
  						<option>New Jersey</option>
  						<option>New Mexico</option>
  						<option>New York</option>
  						<option>North Carolina</option>
  						<option>North Dakota</option>
  						<option>Ohio</option>
  						<option>Oklahoma</option>
  						<option>Oregon</option>
  						<option>Pennsylvania</option>
  						<option>Rhode Island</option>
  						<option>South Carolina</option>
  						<option>South Dakota</option>
  						<option>Tennessee</option>
  						<option>Texas</option>
  						<option>Utah</option>
  						<option>Vermont</option>
  						<option>Virginia</option>
  						<option>Washington</option>
  						<option>West Virginia</option>
  						<option>Wisconsin</option>
  						<option>Wyoming</option>
					</select>
				</div>
				<label for="postal_code" class="col-sm-2 control-label">Postal Code</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="postal_code" placeholder="Postal Code">
				</div>
			
			</div>
			<div class="form-group">
				
				<label for="linkedin" class="col-sm-3 control-label">LinkedIn URL</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="linkedin" placeholder="Enter your LinkedIn profile URL">
				</div>
			</div>
			<div class="form-group">
				
				<label for="online_portfolio" class="col-sm-3 control-label">Online Portfolio URL</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="online_portfolio" placeholder="Enter your Online Portfolio URL">
				</div>
			</div>
			<div class="form-group">
				
				<label for="age_older" class="col-sm-3 control-label">Are you 18 or older?</label>
				<div class="col-sm-9 btn-group" data-toggle="buttons">
					<label class="btn btn-default active">
						<input type="radio" class="form-control" id="age_older_yes" value="yes">
							Yes
						</input>
					</label>
					<label class="btn btn-default">
						<input type="radio" class="form-control" id="age_older_no" value="no">
							No
						</input>
					</label>
				</div>
			</div>
			<div class="form-group">
				
				<label for="citizenship" class="col-sm-3 control-label">Are you a US citizen, a permanent resisdent or a resident-alien?</label>
				<div class="col-sm-9 btn-group" data-toggle="buttons">
					<label class="btn btn-default active">
						<input type="radio" class="form-control" id="citizenship_yes" value="yes">
							Yes
						</input>
					</label>
					<label class="btn btn-default">
						<input type="radio" class="form-control" id="citizenship_no" value="no">
							No
						</input>
					</label>
				</div>
			</div>

			<div class="form-group">
				<label for="hear_us" class="col-sm-3 control-label">How did you hear about us?</label>
				<div class="col-sm-9">
					<!--<textarea class="form-control" id="address" rows="3" placeholder="Enter your address here"></textarea>-->
					<select class="form-control" id="hear_us" name="path" multiple>
						<option selected>Please select how did you get to know about the A100 program?</option>
						<option>A100 Promo Video from Vimeo</option>
						<option>A100 Program Manager</option>
						<option>Career Fair</option>
						<option>Information Session</option>
						<option>Radio/TV Ad</option>
						<option>Search Engine</option>
						<option>On-Campus Flyer</option>
						<option>Fellow Student</option>
						<option>Professor/Teacher at my University/School</option>
						<option>Member of the Independent Software Team</option>
						
						
					</select>	
					<label>Other Source (if any):</label>
							<input type="text" class="form-control" id="hear_us_other" placeholder="Any other Source">
				</div>
			</div>
			
			<div class="form-group">
      			<div class="col-sm-offset-3 col-sm-9">
      				<button type="submit" class="btn btn-primary">Save</button>
      				<button type="submit" class="btn btn-primary">Cancel</button>
    			</div>
    			</div>
  			</div>
		</fieldset>
	</form>
	<form class="form-horizontal" role="form" action="schedule_validation.php" method="POST" id="schedule">
		<div>
			<?php
						if (isset($_SESSION['schedule'])) {
                                $hours = $_SESSION['data']['hours'];
                                $commitments = $_SESSION['data']['commitments'];
                            }
                            ?>
                            <?php
                            if (isset($_SESSION['schedule']['done'])) {
                                echo '<font color="green">' . $_SESSION['schedule']['done'] . '</font>';
                            }
                  ?>
			
			
			<fieldset class="col-sm-12 well">
			<legend  class="scheduler-border">
					Schedule
			</legend>
			<div class="form-group">
				
				<label for="hours" class="col-sm-3 control-label">How many hours per week will you be able to dedicate to the A100 program and homework?</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="hours" name="hours" placeholder="Enter number of hours available per week">
				</div>
			</div>
			<div class="form-group">
				
				<label for="other_commit" class="col-sm-3 control-label">Any other Commitments? Please list them out</label>
				<div class="col-sm-9">
					<textarea class="form-control" id="address" name="commitments" rows="6" placeholder="What are all of your unchangeable time commitments? Please include any classes you are taking, work schedules, vacations you plan to take, and important personal commitments, including both weekdays and WEEKENDS."></textarea>
				</div>
			</div>
			<div class="form-group">
    			<div class="col-sm-offset-3 col-sm-9">
      				<button type="submit" class="btn btn-primary">Save</button>
      				<button type="submit" class="btn btn-primary">Cancel</button>
    			</div>
  			</div>
		</fieldset>
	</form>

	<form class="form-horizontal" role="form" method="POST" id="technical">
		<fieldset class="col-sm-12 well">
			<legend  class="scheduler-border">
					Technical Experience
			</legend>
			<div class="form-group">
				<label for="programming_experience" class="col-sm-3 control-label">How much programming experience do you have?</label>
				<div class="col-sm-9">
					<input type="radio" name="programming_experience" value="0">  None<br>
					<input type="radio" name="programming_experience" value="1">  I have taken ≥3 courses that use the same programming language<br>
					<input type="radio" name="programming_experience" value="2">  I have built several projects on my own time, not for school<br>
					<input type="radio" name="programming_experience" value="3">  I have little formal training in programming, but have taught myself the essentials and have worked on personal projects<br>
				</div>
			</div>
			<div class="form-group">
				
				<label for="other_commit" class="col-sm-3 control-label">Any other Commitments? Please list them out</label>
				<div class="col-sm-9">
					<textarea class="form-control" id="address" rows="6" placeholder="What are all of your unchangeable time commitments? Please include any classes you are taking, work schedules, vacations you plan to take, and important personal commitments, including both weekdays and WEEKENDS."></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="work_experience" class="col-sm-3 control-label">How much work experience do you have?</label>
				<div class="col-sm-9">
					<input type="radio" name="work_experience" value="0">  None<br>
					<input type="radio" name="work_experience" value="1">  At least one full-time job in an office setting.<br>
					<input type="radio" name="work_experience" value="2">  At least one part-time job in an office setting.<br>
					<input type="radio" name="work_experience" value="3">  At least one part-time job of any other kind (retail, Starbucks, construction, etc.)<br>
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
      				<button type="submit" class="btn btn-primary">Cancel</button>
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
      				<button type="submit" class="btn btn-primary">Cancel</button>
    			</div>
  			</div>
  		</fieldset>
  	</form>
  	<div class="form-group">
    	<div style="text-align:center;">
      			<button type="submit" class="btn btn-primary">Submit the Form</button><br /><br />
		</div>
 	</div>



<!--

		<fieldset class="scheduler-border col-md-12">
			<legend  class="scheduler-border">
				Personal Details
			</legend>
			<div class="control-group">
				<label for="first_name" class="control-label input-label">
					First Name:
				</label>
				<div>
					<input type="text" id="first_name">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label input-label">
					Email:
				</label> 
				<div>
					<input type="text">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label input-label"> 
					Date of birth: 
				</label>
				<div>
					<input type="text">
				</div>
			</div>		
			<div class="control-group">
				<input type="Submit" value="Save">
			</div>
		</fieldset>
	</form>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>