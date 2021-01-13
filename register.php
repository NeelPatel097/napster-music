<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);
		
	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>

<html>
<head>
	<title>Welcome to Napster!</title>

	<link rel="stylesheet" type="text/css" href="assests/css/register.css"/>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="assests/js/register.js"></script>
</head>
<body>
	<?php

	if(isset($_POST['registerButton'])) {
		echo '<script>
				$(document).ready(function() { 
					$("#loginForm").hide();
					$("#registerForm").show();
				});
			 </script>';
	}
	else {
		echo '<script>
				$(document).ready(function() { 
					$("#loginForm").show();
					$("#registerForm").hide();
				});
			 </script>';
	}
	?>

 	<div id="background">

		<div id="loginContainer">

			 <div id="inputContainer">
			 	
				<form id="loginForm" action="register.php" method="POST">
					<h2>Login to your account</h2>
					<p>
						<?php echo $account->getError(Constants::$loginFailed); ?>
						<label for="loginUsername">Username</label>
						<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. Adamkoli" 
						value="<?php getInputValue('loginUsername') ?>"required>
					</p>
					<p>
						<label for="loginPassword">Password</label>
						<input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required>
					</p>

					<button type="submit" name="loginButton">LOG IN</button>

					<div class="hasAccountText">
						<span id="hideLogin">Don't have an account?Sign up now</span>
					</div>	
				
				</form>



				<form id="registerForm" action="register.php" method="POST">
					<h2>Create your account</h2>
					<p>
						<?php echo $account->getError(Constants::$usernameCharacters); ?>
						<?php echo $account->getError(Constants::$usernameTaken); ?>

						<label for="Username">Username</label>
						<input id="Username" name="Username" type="text" placeholder="e.g. Adamkoli" value="<?php getInputValue('Username') ?>" required>
					</p>


					<p>
						<?php echo $account->getError(Constants::$firstNameCharacters); ?>
						<label for="Firstname">First Name</label>
						<input id="Firstname" name="Firstname" type="text" placeholder="e.g. Adam" value="<?php getInputValue('Firstname') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$lastNameCharacters); ?>
						<label for="Lastname">Last Name</label>
						<input id="Lastname" name="Lastname" type="text" placeholder="e.g. Koli" value="<?php getInputValue('Lastname') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
						<?php echo $account->getError( Constants::$emailInvalid); ?>
						<?php echo $account->getError( Constants::$emailTaken); ?>
						<label for="Email">Email</label>
						<input id="Email" name="Email" type="email" placeholder="e.g. Adam@xyz.com" value="<?php getInputValue('Email') ?>" required>
					</p>

					<p>
						<label for="Email2">Confirm Email</label>
						<input id="Email2" name="Email2" type="email" placeholder="e.g. Adam@xyz.com" value="<?php getInputValue('Email2') ?>" required>
					</p>

					<p>
						<?php echo $account->getError( Constants::$passwordsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
						<?php echo $account->getError(Constants::$passwordCharacters); ?>
						<label for="Password">Password</label>
						<input id="Password" name="Password" type="password" placeholder="Your password" required>
					</p>

					<p>
						<label for="Password2">Confirm Password</label>
						<input id="Password2" name="Password2" type="password" placeholder="Confirm Your password" required>
					</p>

					<button type="submit" name="registerButton">SIGN UP</button>
				
					<div class="hasAccountText">
						<span id="hideRegister">Already have an account? Log in here.</span>
					</div>	

				
				</form>
			</div>

			<div id="loginText">
				<h1>PLAY UNLIMITED MUSIC</h1>
				<h2>Listen to loads of songs</h2>
				<ul>
					<li>Discover music you'll fall in love with</li>
					<li>Create your own playlists</li>
					<li>Follow artist to keep up to date</li>
				</ul>
			</div>

		</div>
	</div> 
		
	</body>
</html>