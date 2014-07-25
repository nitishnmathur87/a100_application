<?php
//credentials
DEFINE('DB_USERNAME', 'root');
DEFINE('DB_PASSWORD', '');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_DATABASE', 'a100 database');

//Create connection to the Database
$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
// Check connection to the Database
if (mysqli_connect_errno()) {
echo "Failed to connect to the Database: " . mysqli_connect_error();
}


print $_POST['git'];
//$git=0;
// if(isset($_POST['git']))
// $git = 1; PDO

$name = mysqli_real_escape_string($con, $_POST['name']);
$cohort = mysqli_real_escape_string($con, $_POST['cohort']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$city = mysqli_real_escape_string($con, $_POST['city']);
$telephone = mysqli_real_escape_string($con, $_POST['telephone']);
$school = mysqli_real_escape_string($con, $_POST['school']);
$graduation = mysqli_real_escape_string($con, $_POST['graduation']);
$visa = mysqli_real_escape_string($con, $_POST['visa']);
$veteran = mysqli_real_escape_string($con, $_POST['veteran']);
$comments = mysqli_real_escape_string($con, $_POST['comments']);
$workexperience = mysqli_real_escape_string($con, $_POST['work experience']);
$unix_linux = mysqli_real_escape_string($con, $_POST['unix_linux']);
$sql = mysqli_real_escape_string($con, $_POST['sql']);
$git = mysqli_real_escape_string($con, $_POST['git']);
$wordpress = mysqli_real_escape_string($con, $_POST['wordpress']);
$drupal = mysqli_real_escape_string($con, $_POST['drupal']);
$python = mysqli_real_escape_string($con, $_POST['python']);
$svn = mysqli_real_escape_string($con, $_POST['svn']);
$objective_c = mysqli_real_escape_string($con, $_POST['objective_c']);
$ruby_rails = mysqli_real_escape_string($con, $_POST['ruby_rails']);
$c_plusplus = mysqli_real_escape_string($con, $_POST['c_plusplus']);
$dot_net = mysqli_real_escape_string($con, $_POST['dot_net']);
$php = mysqli_real_escape_string($con, $_POST['php']);
$html_css = mysqli_real_escape_string($con, $_POST['html_css']);
$java = mysqli_real_escape_string($con, $_POST['java']);
$javascript = mysqli_real_escape_string($con, $_POST['javascript']);
$interest1 = mysqli_real_escape_string($con, $_POST['interest1']);
$interest2 = mysqli_real_escape_string($con, $_POST['interest2']);
$interest3 = mysqli_real_escape_string($con, $_POST['interest3']);
$email = mysqli_real_escape_string($con, $_POST['Email']);

//$sql = "INSERT INTO apprentice (name, cohort, address, city, telephone, school, graduation, visa, veteran, comments)
//VALUES ('$name', '$cohort', '$address', '$city', '$telephone', '$school', '$graduation', '$visa', '$veteran', '$comments')";
$sql = "INSERT INTO apprentice (name, cohort, address, city, telephone, school, graduation, visa, veteran, comments, work experience, unix_linux, sql, git, wordpress, drupal, python, svn, objective_c, ruby_rails, c_plusplus, dot_net, php, html_css, java, javascript, interest1, interest2, interest3, Email)
VALUES ('$name', '$cohort', '$address', '$city', '$telephone', '$school', '$graduation', '$visa', '$veteran', '$comments', '$workexperience', '$unix_linux', '$sql', '$git', '$wordpress', '$drupal', '$python', '$svn', '$objective_c', '$ruby_rails', '$c_plusplus', '$dot_net', '$php', '$html_css', '$java', '$javascript', '$interest1', '$interest2', '$interest3', '$email')";

if (!mysqli_query($con,$sql)) {
die('Error: ' . mysqli_eror($con));
}
else {
echo "Application successfully submitted\n";
}

mysqli_close($con);

?>