<!DOCTYPE html>
<html>
<head>
	<title>quizas</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="margin: 0; padding: 0; background: url(images/classroom.jpg); background-size: cover; background-position: center; font-family: sans-serif; /*width: 100px; height: 200px;*/">
	<div class="welcome-msg">
		<p>Welcome to the Electronic Quizzer</p>
	</div>
	<div class="enter-system">
		<div id="lecturer-enter">
			<div id="lecturer-image"><a href="lecturer_login.php"><img src="images/lecturer-start.jpg"></a></div>
			<div id="lecturer-button"><form><input class="enter-button" type="button" name="lecturer-button" value="Lecturer" onclick="window.location.href='lecturer_login.php'"/></form></div>
		</div>
		<div id="student-enter">
			<div id="student-image"><a href="student_login.php"><img src="images/student-start.jpg"></a></div>
			<div id="student-button"><form><input class="enter-button" type="button" name="lecturer-button" value="Student" onclick="window.location.href='student_login.php'"/></form></div>			
		</div>
	</div>
</body>
</html>