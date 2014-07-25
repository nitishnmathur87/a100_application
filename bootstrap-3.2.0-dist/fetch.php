<?php 
$email_address = $_POST['email_address'];
$password = $_POST['password'];
$salt = crypt($password, $email_address);
$cryptpass = hash('sha256', $salt);

$stmt = $link->prepare('SELECT * FROM apprentice INNER JOIN supporting_materials 
	ON apprentice.support_id = supporting_materials.support_id 
	INNER JOIN technical_experience ON apprentice.tech_id = technical_experience.tech_id 
	INNER JOIN path_link ON apprentice.apprentice_id=path_link.apprentice_id 
	WHERE apprentice.email_address=:email_address AND apprentice.password=:password');
$stmt->bindValue(':email_address', $email_address, PDO::PARAM_STR);
$stmt->bindValue(':password', $cryptpass, PDO::PARAM_STR);
$stmt->execute();
$result= $stmt->fetchAll(PDO::FETCH_ASSOC);

$new_stmt = $link->prepare('SELECT * FROM technical_experience INNER JOIN application_stack 
	ON technical_experience.app_stack_id = application_stack.app_stack_id 
	INNER JOIN front_end_language ON technical_experience.front_end_id = front_end_language.front_end_id 
	INNER JOIN content_management_system ON technical_experience.content_mgmt_id = content_management_system.content_mgmt_id 
	INNER JOIN mobile_app_develop ON technical_experience.mobile_app_id = mobile_app_develop.mobile_app_id 
	WHERE apprentice.email_address=:email_address AND apprentice.password=:password 
	AND apprentice.tech_id = technical_experience.tech_id' );
$new_stmt->bindValue(':email_address', $email_address, PDO::PARAM_STR);
$new_stmt->bindValue(':password', $cryptpass, PDO::PARAM_STR);
$new_stmt->execute();
$new_result= $new_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

