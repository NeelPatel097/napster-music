<?php

function sanitizeFormPassword($inputText) {
	$inputText = strip_tags($inputText);
	return $inputText;
}

function sanitizeFormUsername($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ","",$inputText);
	return $inputText;
}

function sanitizeFormString($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ","",$inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}


if(isset($_POST['registerButton'])) {
	//Register button was pressed
	$Username=sanitizeFormUsername($_POST['Username']);
	$Firstname=sanitizeFormString($_POST['Firstname']);
	$Lastname=sanitizeFormString($_POST['Lastname']);
	$Email=sanitizeFormString($_POST['Email']);
	$Email2=sanitizeFormString($_POST['Email2']);
	$password = sanitizeFormPassword($_POST['Password']);
	$password2 = sanitizeFormPassword($_POST['Password2']);

	$wasSuccesful = $account->register($Username, $Firstname, $Lastname, $Email, $Email2, $password, $password2);

	if($wasSuccesful == true) {
		$_SESSION['userLoggedIn'] = $username;
		header("Location: index.php");	
	}

}


?>