<?php 
include("includes/includedFiles.php");
?>

<div class="userDetails">
	
	<div class="container borderBottom">
		<h2>EMAIL</h2>
		<input type="text" class="email" name="email" placeholder="Email address..." value="<?php $userLoggedIn->getEmail();?>">
		<span class="message"></span>
		<button class="button" onclick="updateEmail('email')">SAVE</button>
	</div>

	<div class="container">
		<h2>PASSWORD</h2>
		<input type="password" class="oldPasword" name="oldPasword" placeholder="Current password">
		<input type="password" class="newPasword1" name="newPasword1" placeholder="New password">
		<input type="password" class="newPasword2" name="newPasword2" placeholder="Confirm password">
		<span class="message"></span>
		<button class="button" onclick="updatePassword('oldPasword', 'newPasword1', 'newPasword2')">SAVE</button>
	</div>

</div>