<?php
	
	session_start();

	if (isset($_POST['submit'])) {
		include 'db_connect.php';

		$username = mysqli_real_escape_string($connect, $_POST['username']);
		$password = mysqli_real_escape_string($connect, $_POST['password']);
		$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
		//$hashedPwd = md5(password);

		//Error Handlers
		//Check for empty fields
		if (empty($username) || empty($password)) {
			header("Location: ../student_login.php?login=empty");
			exit();
		}else{
			/*$query = "SELECT * FROM student WHERE username='$username' AND password='$hashedPwd'";
			$result = mysqli_query($connect, $query);
			$resultChecker = mysqli_num_rows($result);
			if ($resultChecker == 1) {
				//header("Location: ../student_main.php");
				echo "$resultChecker";
				echo "$password";
				echo "$hashedPwd";
				exit();*/
			$query = "SELECT * FROM student WHERE username='$username'";
			$result = mysqli_query($connect, $query);
			$resultChecker = mysqli_num_rows($result);
			if ($resultChecker < 1) {
				header("Location: ../student_login.php?login=error");
				exit();
			}else{
				if ($row = mysqli_fetch_assoc($result)) {
					//Dehashing the password
					$hashedPwdCheck = password_verify($password, $row['password']);
					if ($hashedPwdCheck == false) {
						header("Location: ../student_login.php?login=error");
						exit();
					}elseif ($hashedPwdCheck == true) {
						//Log in user
						$_SESSION['$std_id'] = $row['std_id'];
						$_SESSION['$title'] = $row['title'];
						$_SESSION['$firstname'] = $row['first_name'];
						$_SESSION['$lastname'] = $row['last_name'];
						$_SESSION['$email'] = $row['email'];
						$_SESSION['$username'] = $row['username'];
						header("Location: ../student_main.php");
						exit();
					}
				}
			}
		}
	}else{
		header("Location: ../student_login.php?login=error");
		exit();
	}