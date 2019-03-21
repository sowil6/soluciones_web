<?php
include('./modelo/serverLogin.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
<!---->	<link rel="stylesheet" type="text/css" href="./Styles/cssLogin.css"></head>
<body>

	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="">

		<?php include('./includes/errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			No tienes una cuenta? <a href="registro">Registrese Aquí</a>
		</p>
	</form>


</body>
</html>