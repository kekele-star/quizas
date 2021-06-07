<!DOCTYPE html>
<html>
<head>
	<title>lecturer sign up</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!--<style type="text/css">
		body {
			width: 500px;
			height: 500px;
			margin: 0;
			padding: 0;
			background: url(images/quizz.jpg);
			background-size: cover;
			background-position: center;
			font-family: sans-serif;
		}
	</style>-->
</head>
<body style="margin: 0; padding: 0; background: url(images/quizz.jpg); background-size: cover; background-position: center; font-family: sans-serif;">
	<div class="the-form">
		<div class="signup-box">
			<img src="images/lecturer.jpg" class="signup-image">
			<h1>Sign Up</h1>
			<form action="includes/lecturer_signup_process.php" method="POST">
				<div id="input-box">
					<label for="fname"><p>First Name</p></label>
					<input type="text" name="fname" id="fname" placeholder="Please enter your first name">
				</div>
				<div id="input-box">
					<label for="lname"><p>Last Name</p></label>
					<input type="text" name="lname" id="lname" placeholder="Please enter your last name">
				</div>
				<div id="input-box">
					 <label for="mname"><p>Middle Name</p></label>
					 <input type="text" name="mname" id="mname" placeholder="Please enter your middle name">
				</div>
				<div id="input-box">
						<label for="the_title"><p>Title</p></label>
						<select name="the_title" id="the_title">
							<option value="Mr">Mr.</option>
							<option value="Mrs">Mrs.</option>
							<option value="Miss">Miss</option>
							<option value="Dr">Dr.</option>
							<option value="Prof">Prof.</option>
						</select>
				</div>
				<div id="input-box">
					<p>Gender</p>
					<input type="radio" name="gender" id="male" value="male"><label for="male"><p>Male</p></label>
					<input type="radio" name="gender" id="female"  value="female"><label for="female"><p>Female</p></label>	
				</div>
				<div id="input-box">
					<label for="department"><p>Department</p></label>
					<input type="text" name="department" id="department" placeholder="Please enter your department">
				</div>
				<div id="input-box">				
					<label for="email"><p>E-Mail Address</p></label>
					<input type="text" name="email" id="email" placeholder="Please enter your email">
				</div>
				<div id="input-box">
					<label for="username"><p>Username</p></label>
					<input type="text" name="username" id="username" placeholder="Please enter username">
				</div>
				<div id="input-box">
					<label for="password"><p>Password</p></label>
					<input type="password" name="password" id="password" placeholder="Please enter password">
				</div>
				<div id="input-box">
					<label for="cpassword"><p>Confirm Password</p></label>
					<input type="password" name="cpassword" id="cpassword" placeholder="Please re-enter password">
				</div>
				<input type="submit" name="submit" value="Create Account">
			</form>
		</div>
	</div>
</body>
</html>