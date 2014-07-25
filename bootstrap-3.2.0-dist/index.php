<!DOCTYPE html>
<?php
//include 'https.php';
session_start();
?>
<?php
// Turn off all error reporting
error_reporting(0);
?>
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
	<div class="container-fluid">
	</div>
	<h1 class="col-md-12">
		A100 Apprentice Application Form
	</h1>
	

		<form class="form-horizontal" role="form" action="personal_validation.php" method="POST" id="personal">
			<div>
				<?php
				if (isset($_SESSION['personal'])) {
					$first_name = $_SESSION['data']['first_name'];
					$last_name = $_SESSION['data']['last_name'];
					$email_address = $_SESSION['data']['email_address'];
                    $password = $_SESSION['data']['password'];
					$university_name = $_SESSION['data']['university_name'];
					$major_name = $_SESSION['data']['major_name'];
					$graduation_date = $_SESSION['data']['graduation_date'];
					$cohort = $_SESSION['data']['cohort'];
					$address = $_SESSION['data']['address'];
					$city = $_SESSION['data']['city'];
					$state = $_SESSION['data']['state'];
					$postal_code = $_SESSION['data']['postal_code'];
					$mobile_phone = $_SESSION['data']['mobile_phone'];
					$linkedin = $_SESSION['data']['linkedin'];
					$online_portfolio = $_SESSION['data']['online_portfolio'];
					$age = $_SESSION['data']['age'];
                    $work_authorization = $_SESSION['data']['work_authorization'];
					$path_to_a100 = $_SESSION['data']['path_to_a100'];
					$other = $_SESSION['data']['other'];
					$hours = $_SESSION['data']['hours'];
					$commitments = $_SESSION['data']['commitments'];

				}
				?>

				<?php
				if (isset($_SESSION['personal']['done'])) {
					echo '<font color="green">' . $_SESSION['personal']['done'] . '</font>';
				}
				?>
				
			</div>
			<fieldset class="col-sm-12 well">
				<legend  class="scheduler-border">
					Personal Details
				</legend>

				<div class="form-group">

					<label for="first_name" class="col-sm-2 control-label">First Name</label>
					<div class="col-sm-4">
						<input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter First Name" value="<?php echo $first_name="" ?>">
						<?php
						if (isset($_SESSION['personal']['first_name'])) {
							echo '<font color="red">' . $_SESSION['personal']['first_name'] . '</font>' ;
						}
						?>
					</div>
					<label for="last_name" class="col-sm-2 control-label">Last Name</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name"  value="<?php echo $last_name="" ?>">
						<?php
						if (isset($_SESSION['personal']['last_name'])) {
							echo '<font color="red">' . $_SESSION['personal']['last_name'] . '</font>' ;
						}
						?>
					</div>
				</div>


				<div class="form-group">
					<label for="email_address" class="col-sm-1 control-label">Email Address</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="email_address" name="email_address" placeholder="Email Address" value="<?php echo $email_address="" ?>">
						<?php
						if (isset($_SESSION['personal']['email_address'])) {
							echo '<font color="red">' . $_SESSION['personal']['email_address'] . '</font>' ;
						}
						?>
					</div>

					<label for="password" class="col-sm-1 control-label">Password</label>
					<div class="col-sm-3">
						<input type="password" class="form-control" id="password" name="password" placeholder="6 characters minimum" value="<?php echo $password="" ?>">
						<?php
						if (isset($_SESSION['personal']['password'])) {
							echo '<font color="red">' . $_SESSION['personal']['password'] . '</font>' ;
						}
						?>
					</div>

					<label for="mobile_phone" class="col-sm-1 control-label">Mobile Phone</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="mobile_phone" name="mobile_phone" placeholder="(XXX)XXX-XXXX" value="<?php echo $mobile_phone="" ?>">
						<?php
						if (isset($_SESSION['personal']['mobile_phone'])) {
							echo '<font color="red">' . $_SESSION['personal']['mobile_phone'] . '</font>' ;
						}
						?>
					</div>				


				</div>


				<div class="form-group">

					<label for="cohort" class="col-sm-3 control-label">Which Cohort are you applying for?  (NEW: Select Cohort 3.5 to apply for our Hartford-area cohort. If there's enough demand, we'll open a second site in the Hartford area).</label>
					<div class="col-sm-9">
						<!--<input type="text" class="form-control" id="cohort" placeholder="Choose the Cohort">-->
						<select class="form-control" name="cohort" id="cohort" value="<?php echo $cohort="" ?>">
							
							<option value="1" selected>Cohort 2: Spring (Summer Internships)</option>
							<option value="2">Cohort 3: Summer (Late Summer and Early Fall Internships)</option>
							<option value="3">NEW: Cohort 3.5: Hartford-area trainings (Internships in Fall)</option>
							<option value="4">Cohort 4: Fall (Internships in late Fall and early Winter)</option>
						</select>
						The training period will last ~2 months and you will be expected to meet at least twice per week. You will be eligible for paid internships with our Partner Companies immediately afterward. (NOTE: Cohort 2 is already in progress for the 2014 year)
						<?php
						if (isset($_SESSION['personal']['cohort'])) {
							echo '<font color="red">' . $_SESSION['personal']['cohort'] . '</font>' ;
						}
						?>
					</div>
				</div>
				<div class="form-group">

					<label for="address" class="col-sm-3 control-label">Address</label>
					<div class="col-sm-9">
						<textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address here" value="<?php echo $address="" ?>"></textarea>
						<?php
						if (isset($_SESSION['personal']['address'])) {
							echo '<font color="red">' . $_SESSION['personal']['address'] . '</font>' ;
						}
						?>
					</div>
				</div>
				<div class="form-group">

					<label for="city" class="col-sm-1 control-label">City</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="city" name="city" placeholder="Name of city" value="<?php echo $city="" ?>">
						<?php
						if (isset($_SESSION['personal']['city'])) {
							echo '<font color="red">' . $_SESSION['personal']['city'] . '</font>' ;
						}
						?>
					</div>
					<label for="state" class="col-sm-1 control-label">State</label>
					<div class="col-sm-3">
						<!--<textarea class="form-control" id="address" rows="3" placeholder="Enter your address here"></textarea>-->
						<select class="form-control" id="state" name="state" value="<?php echo $state="" ?>">
							<option>Alabama</option>
							<option>Alaska</option>
							<option>Arizona</option>
							<option>Arkansas</option>
							<option>California</option>
							<option>Colorado</option>
							<option selected>Connecticut</option>
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

						<?php
						if (isset($_SESSION['personal']['state'])) {
							echo '<font color="red">' . $_SESSION['personal']['state'] . '</font>' ;
						}
						?>
					</div>
					<label for="postal_code" class="col-sm-2 control-label">Postal Code</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Postal Code" value="<?php echo $postal_code="" ?>">
						<?php
						if (isset($_SESSION['personal']['postal_code'])) {
							echo '<font color="red">' . $_SESSION['personal']['postal_code'] . '</font>' ;
						}
						?>
					</div>

				</div>

				<div class="form-group">

					<label for="university" class="col-sm-3 control-label">What is the name of your university?</label>
					<div class="col-sm-9">
						<!--<input type="text" class="form-control" id="university_name" name="university_name" placeholder="Enter University Name"  value="<?php echo $university_name="" ?>">-->
						<select class="form-control" name="university_name" id="cohort" value="<?php echo $university_name="" ?>">
						
							<option value="1" selected>Yale University</option>
							<option value="2">University of Connecticut</option>
							<option value="3">Wesleyan University</option>
							<option value="4">Trinity University</option>
							<option value="5">Central Connecticut University</option>
							<option value="6">Connecticut College</option>
							<option value="7">Fairfield College</option>
							<option value="8">University of Hartford</option>
							<option value="9">University of Connecticut Health Center</option>
							<option value="10">University of Bridgeport</option>
							<option value="11">Mitchell College</option>
							<option value="12">Southern Connecticut State University</option>
							<option value="13">University of New Haven</option>
							<option value="14">United States Coast Guard University</option>
							<option value="15">Sacred Heart University</option>
							<option value="16">Western Connecticut State University</option>
							<option value="17">Eastern Connecticut State University</option>
							<option value="18">Post University</option>
							<option value="19">Albertus Magnus College</option>
							<option value="20">University of Saint Joseph</option>
							<option value="21">Charter Oak State University</option>
							<option value="22">Goodwin College</option>
							<option value="23">Lincoln College of New England</option>
							<option value="24">Holy Apostles College and Seminary</option>
							<option value="25">University of Saint Joseph</option>

						</select>
						<?php
						if (isset($_SESSION['personal']['university_name'])) {
							echo '<font color="red">' . $_SESSION['personal']['university_name'] . '</font>' ;
						}
						?>
					</div>
				</div>
				<div class="form-group">

					<label for="major" class="col-sm-3 control-label">What is your Major?</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="major_name" name="major_name" placeholder="Enter your major"  value="<?php echo $major_name="" ?>">
						<?php
						if (isset($_SESSION['personal']['major_name'])) {
							echo '<font color="red">' . $_SESSION['personal']['major_name'] . '</font>' ;
						}
						?>
					</div>
				</div>
				<div class="form-group">

					<label for="graduation_date" class="col-sm-3 control-label">What is your graduation date?</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="graduation_date" name="graduation_date" placeholder="YYYY-MM-DD" value="<?php echo $graduation_date="" ?>">
						<?php
						if (isset($_SESSION['personal']['graduation_date'])) {
							echo '<font color="red">' . $_SESSION['personal']['graduation_date'] . '</font>' ;
						}
						?>
					</div>
				</div>

				<div class="form-group">

					<label for="linkedin" class="col-sm-3 control-label">LinkedIn URL</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Enter your LinkedIn profile URL" value="<?php echo $linkedin="" ?>">
						<?php
						if (isset($_SESSION['personal']['linkedin'])) {
							echo '<font color="red">' . $_SESSION['personal']['linkedin'] . '</font>' ;
						}
						?>
					</div>
				</div>
				<div class="form-group">

					<label for="online_portfolio" class="col-sm-3 control-label">Link to Online Portfolio of your work (e.g., GitHub, Bitbucket, Gitorious) or personal Website</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="online_portfolio" name="online_portfolio" placeholder="Enter your Online Portfolio URL" value="<?php echo $online_portfolio="" ?>">
						<?php
						if (isset($_SESSION['personal']['online_portfolio'])) {
							echo '<font color="red">' . $_SESSION['personal']['online_portfolio'] . '</font>' ;
						}
						?>
					</div>
				</div>
				<div class="form-group">

					<label for="age" class="col-sm-3 control-label">Are you 18 or older?</label>
					<div class="col-sm-9 btn-group" data-toggle="buttons">
						<label class="btn btn-default active">
							<input type="radio" class="form-control" id="age" name="age" value="yes">
							Yes
							</input>
						</label>
						<label class="btn btn-default">
							<input type="radio" class="form-control" id="age" name="age" value="no">
							No
							</input>
						</label>
					</div>
					<?php
					if (isset($_SESSION['personal']['age'])) {
					echo '<font color="red">' . $_SESSION['personal']['age'] . '</font>' ;
					}
					?>
				</div>
				<div class="form-group">

					<label for="citizenship" class="col-sm-3 control-label">
						I certify that I am a U.S. citizen, permanent resident, or a foreign national with authorization to work in the United States.
					</label>

					<div class="col-sm-9 btn-group" data-toggle="buttons">
						<label class="btn btn-default active">
							<input type="radio" class="form-control" id="work_authorization" name="work_authorization" value="yes">
							Yes
							</input>
						</label>
						<label class="btn btn-default">
							<input type="radio" class="form-control" id="work_authorization" name="work_authorization" value="no">
								No
							</input>
						</label>
					</div>
					IMPORTANT: If you are a foreign student on an F-1 Visa or other student visa, please note it in the "Additional Information" section at the bottom of the page. We are eager to work with international students on student visas of all types. Depending on your status, we can help counsel you on your pathway to an H1-B or similar visa type.
					<?php
					if (isset($_SESSION['personal']['work_authorization'])) {
					echo '<font color="red">' . $_SESSION['personal']['work_authorization'] . '</font>' ;
					}
					?>

				</div>

				<div class="form-group">
					<label for="hear_us" class="col-sm-3 control-label">
						How did you hear about us?
					</label>
					<div class="col-sm-9 control-group">
				
						<label class="checkbox"><input type="checkbox" class="form-control checkbox" name="path_to_a100[]" value="1">A100 Promo Video from Vimeo</label><br />
						<label class="checkbox"><input type="checkbox" class="form-control checkbox" name="path_to_a100[]" value="2">A100 Program Manager</label><br />
						<label class="checkbox"><input type="checkbox" class="form-control checkbox" name="path_to_a100[]" value="3">Career Fair</label><br />
						<label class="checkbox"><input type="checkbox" class="form-control checkbox" name="path_to_a100[]" value="4">Information Session</label><br />
						<label class="checkbox"><input type="checkbox" class="form-control checkbox" name="path_to_a100[]" value="5">Radio/TV Ad</label><br />
						<label class="checkbox"><input type="checkbox" class="form-control checkbox" name="path_to_a100[]" value="6">Search Engine</label><br />
						<label class="checkbox"><input type="checkbox" class="form-control checkbox" name="path_to_a100[]" value="7">On-Campus Flyer</label><br />
						<label class="checkbox"><input type="checkbox" class="form-control checkbox" name="path_to_a100[]" value="8">Fellow Student</label><br />
						<label class="checkbox"><input type="checkbox" class="form-control checkbox" name="path_to_a100[]" value="9">Professor/Teacher at my University</label><br />
						<label class="checkbox"><input type="checkbox" class="form-control checkbox" name="path_to_a100[]" value="10">Member of the Independent Software Team</label><br />
						<?php
						if (isset($_SESSION['personal']['path_to_a100'])) {
						echo '<font color="red">' . $_SESSION['personal']['path_to_a100'] . '</font>' ;
						}
						?>
					
						<label>
							Other Source (if any):
						</label>
						<input type="text" class="form-control" name="other" id="other" placeholder="Any other Source" value="<?php echo $other="" ?>">

						<?php
						if (isset($_SESSION['personal']['other'])) {
						echo '<font color="red">' . $_SESSION['personal']['other'] . '</font>' ;
						}
						?>
					</div>
				</div>
			
				<div class="form-group">
					<div class="col-sm-12">
						<div style="text-align:center;">
							<button type="submit" name="save" class="btn btn-primary">Save</button>
						</div>
						<br / >
					</div>
				</div>
				
			</fieldset>
		
			<fieldset class="col-sm-12 well">
				<legend  class="scheduler-border">
					Schedule
				</legend>
				<div class="form-group">
				
					<label for="hours" class="col-sm-3 control-label">How many hours per week will you be able to dedicate to the A100 program and homework?</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="hours" name="hours" placeholder="Enter number of hours available per week">
						<?php
						if (isset($_SESSION['personal']['hours'])) {
							echo '<font color="red">' . $_SESSION['personal']['hours'] . '</font>' ;
						}
						?>
					</div>
				</div>
				<div class="form-group">
				
					<label for="other_commit" class="col-sm-3 control-label">Any other Commitments? Please list them out</label>
					<div class="col-sm-9">
						<textarea class="form-control" id="commitments" name="commitments" rows="6" placeholder="What are all of your unchangeable time commitments? Please include any classes you are taking, work schedules, vacations you plan to take, and important personal commitments, including both weekdays and WEEKENDS."></textarea>
						<?php
						if (isset($_SESSION['personal']['commitments'])) {
							echo '<font color="red">' . $_SESSION['personal']['commitments'] . '</font>' ;
						}
						?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						<div style="text-align:center;">
							<button type="submit" name="save" class="btn btn-primary">Save</button>
						</div>
						<br / >
					</div>
				</div>
			</fieldset>
			<fieldset class="col-sm-12 well">
				<legend  class="scheduler-border">
					Technical Experience
				</legend>
				<div class="form-group">
					<label for="programming_experience" class="col-sm-3 control-label">How much programming experience do you have?</label>
					<div class="col-sm-9">
						<input type="radio" name="programming_experience" value="1" checked="checked">  None<br>
						<input type="radio" name="programming_experience" value="2">  I have taken ≥3 courses that use the same programming language<br>
						<input type="radio" name="programming_experience" value="3">  I have built several projects on my own time, not for school<br>
						<input type="radio" name="programming_experience" value="4">  I have little formal training in programming, but have taught myself the essentials and have worked on personal projects<br>
					</div>
					<?php
						if (isset($_SESSION['personal']['programming_experience'])) {
							echo '<font color="red">' . $_SESSION['personal']['programming_experience'] . '</font>' ;
						}
					?>
				</div>

				<div class="form-group">
					<label for="work_experience" class="col-sm-3 control-label">How much work experience do you have?</label>
					<div class="col-sm-9">
						<input type="radio" name="work_experience" value="1" checked="checked">  None<br>
						<input type="radio" name="work_experience" value="2">  At least one full-time job in an office setting.<br>
						<input type="radio" name="work_experience" value="3">  At least one part-time job in an office setting.<br>
						<input type="radio" name="work_experience" value="4">  At least one part-time job of any other kind (retail, Starbucks, construction, etc.)<br>
					</div>
					<?php
						if (isset($_SESSION['personal']['work_experience'])) {
							echo '<font color="red">' . $_SESSION['personal']['work_experience'] . '</font>' ;
						}
					?>
				</div>
				<div class="form-group">
					<label for="job_title" class="col-sm-3 control-label">What was your last job title (or current, if you are still working there), and where?</label>
					<div class="col-sm-9">
						<input type="text" name="job_title" class="form-control" placeholder="Enter your current or past job title">
						<?php
						if (isset($_SESSION['personal']['job_title'])) {
							echo '<font color="red">' . $_SESSION['personal']['job_title'] . '</font>' ;
						}
						?>
					</div>
				</div>

				<div class="form-group">

					<label for="front_end" class="col-sm-3 control-label">Explain your experience with front-end languages (HTML/CSS/JavaScript)</label>
					<div class="col-sm-9">
						<textarea class="form-control" id="front_end" name="front_end" rows="6" placeholder="Please enter your experience with front-end languages"></textarea>
						<?php
						if (isset($_SESSION['personal']['front_end'])) {
							echo '<font color="red">' . $_SESSION['personal']['front_end'] . '</font>' ;
						}
						?>
					</div>
				</div>

				<div class="form-group">

					<label for="other_commit" class="col-sm-3 control-label">What is your experience relating to the LAMP (Linux, Apache, MySQL, PHP) application stack?</label>
					<div class="col-sm-9">
						<textarea class="form-control" name="app_stack" id="app_stack" rows="6" placeholder="Please enter your experience with LAMP Stack "></textarea>
						<?php
						if (isset($_SESSION['personal']['app_stack'])) {
							echo '<font color="red">' . $_SESSION['personal']['app_stack'] . '</font>' ;
						}
						?>
					</div>
				</div>

				<div class="form-group">

					<label for="other_commit" class="col-sm-3 control-label">Explain your experience with mobile app development (Android, iOS, Windows Mobile)</label>
					<div class="col-sm-9">
						<textarea class="form-control" id="mobile_app" name="mobile_app" rows="6" placeholder="Please explain your experience with mobile application development"></textarea>
					<?php
						if (isset($_SESSION['personal']['mobile_app'])) {
							echo '<font color="red">' . $_SESSION['personal']['mobile_app'] . '</font>' ;
						}
					?>

					</div>
				</div>

				<div class="form-group">

					<label for="other_commit" class="col-sm-3 control-label">What is your experience with Content Management Systems (Drupal, Joomla, WordPress, etc.)?</label>
					<div class="col-sm-9">
						<textarea class="form-control" id="cms" name="cms" rows="6" placeholder="Please explain your experience with content management systems"></textarea>
						<?php
						if (isset($_SESSION['personal']['cms'])) {
							echo '<font color="red">' . $_SESSION['personal']['cms'] . '</font>' ;
						}
						?>
					</div>
				</div>

				<div class="form-group">

					<label for="other_commit" class="col-sm-3 control-label">Other Relevant Experience? </label>
					<div class="col-sm-9">
						<textarea class="form-control" id="other_rel" name="other_rel" rows="6" placeholder="Please list out any other relevant experience"></textarea>
						<?php
						if (isset($_SESSION['personal']['other_rel'])) {
							echo '<font color="red">' . $_SESSION['personal']['other_rel'] . '</font>' ;
						}
						?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						<div style="text-align:center;">
							<button type="submit" name="save" class="btn btn-primary">Save</button>
						</div>
						<br / >
					</div>
				</div>
			</fieldset>
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
						<span class="btn btn-primary btn-file">
						<span class="fileupload-new">Select file</span>
						<span class="fileupload-exists">Change</span>         
						<input type="file" name="resume"/></span>
						<span class="fileupload-preview"></span>
						<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
						<br>
						<br /><p style="font-size:10px;">We prefer PDF, ODF, or DOC.
						</p>
						<?php
						if (isset($_SESSION['personal']['resume'])) {
							echo '<font color="red">' . $_SESSION['personal']['resume'] . '</font>' ;
						}
						?>
					</div>

				</div>
				<div class="form-group">
					<label for="cover_letter" class="col-sm-5 control-label">Upload a cover letter (250 words maximum) with this filename format: "Firstname Lastname Cover Letter"</label>
					<div class="col-sm-7 fileupload fileupload-new" data-provides="fileupload" id="cover_letter">
						<span class="btn btn-primary btn-file">
						<span class="fileupload-new">Select file</span>
						<span class="fileupload-exists">Change</span>         
						<input type="file" name="cover_letter"/></span>
						<span class="fileupload-preview"></span>
						<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a><br>
						<br /><p style="font-size:10px;">Your cover letter should address why you are applying for the A100 Program, why you would be a good candidate, and what got you interested in startups.</p>
						<?php
						if (isset($_SESSION['personal']['cover_letter'])) {
							echo '<font color="red">' . $_SESSION['personal']['cover_letter'] . '</font>' ;
						}
						?>
					</div>
				</div>

				<div class="form-group">

					<label for="references" class="col-sm-3 control-label">References:</label>
					<div class="col-sm-9">
						<textarea class="form-control" name="references_field" rows="6" placeholder="(Example: Professor Jim Honeycutt, University of Northern Connecticut, honeycutt.j@unct.edu)"></textarea>
						<?php
						if (isset($_SESSION['personal']['references_field'])) {
							echo '<font color="red">' . $_SESSION['personal']['references_field'] . '</font>' ;
						}
						?>
					</div>
				</div>

				<div class="form-group">

					<label for="other_commit" class="col-sm-3 control-label">Additional Information</label>
					<div class="col-sm-9">
						<textarea class="form-control" name="additional_info" rows="6" placeholder="Please list out any other additoinal information pertaining to the application"></textarea>
						<?php
						if (isset($_SESSION['personal']['additional_info'])) {
							echo '<font color="red">' . $_SESSION['personal']['additional_info'] . '</font>' ;
						}
						?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						<div style="text-align:center;">
							<button type="submit" name="save" class="btn btn-primary">Save</button>
							<?php unset($_SESSION['personal']); ?>
						</div>
						<br / >
					</div>

					<div class="col-sm-12">
						<div style="text-align:center;">
							<button type="submit" name="submit" class="btn btn-primary">Submit the Form</button>
							<?php unset($_SESSION['personal']); ?>
						</div>
					</div>
				</div>
				
			</fieldset>
			
		</form>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>