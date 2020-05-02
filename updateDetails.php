<?php
    include ("assets/src/includes/includedFiles.php");
?>

<div class="userDetails">
	<div class="container borderBottom">
		<h2>Email</h2>
		<input type="text" class="email" name="email" placeholder="Email Address..." value="<?php echo $userLoggedIn->getEmail() ?>">
		<span class="message"></span>
		<button class="button" onclick="updateEmail('email')">SAVE</button>
	</div>
	<div class="container">
		<h2>Password</h2>
		<input type="password" class="oldpassword" name="oldpassword" placeholder="Current Password" value="">
		<input type="password" class="newPassword1" name="newPassword1" placeholder="New Password" value="">
		<input type="password" class="newPassword2" name="newPassword2" placeholder="Confirm Password" value="">
		<span class="message"></span>
		<button class="button" onclick="updatePassword('oldpassword','newPassword1','newPassword2')">SAVE</button>
	</div>
</div>