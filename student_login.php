<!DOCTYPE html>
<html>
<head>
	<title>student login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="margin: 0; padding: 0; background: url(images/quizz.jpg); background-size: cover; background-position: center; font-family: sans-serif;">
	<div class="the-form">
		<div class="login-box">
			<img src="images/student.jpg" class="login-image">
			<h1>Login</h1>
			<form action="includes/student_login_process.php" method="POST">
				<label for="username"><p>Username</p></label>
				<input type="text" name="username" id="username" placeholder="Please enter username">
				<label for="password"><p>Password</p></label>
				<input type="password" name="password" id="password" placeholder="Please enter password">
				<input type="submit" name="submit" value="Login">
				<h5>Don't have an account? <strong><a href="student_signup.php">Sign Up</a></strong></h5>
			</form>
		</div>
	</div>
</body>
</html>