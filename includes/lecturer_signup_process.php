<?php
	
	session_start();

	if (isset($_POST['submit'])) {
		include_once 'db_connect.php';

		$fname = mysqli_real_escape_string($connect, $_POST['fname']);
		$lname = mysqli_real_escape_string($connect, $_POST['lname']);
		$mname = mysqli_real_escape_string($connect, $_POST['mname']);
		$the_title = mysqli_real_escape_string($connect, $_POST['the_title']);
		$gender = mysqli_real_escape_string($connect, $_POST['gender']);
		$department = mysqli_real_escape_string($connect, $_POST['department']);
		$email = mysqli_real_escape_string($connect, $_POST['email']);
		$username = mysqli_real_escape_string($connect, $_POST['username']);
		$password = mysqli_real_escape_string($connect, $_POST['password']);
		$cpassword = mysqli_real_escape_string($connect, $_POST['cpassword']);

		//Error Handlers
		//Check for empty fields
		if (empty($fname) || empty($lname) || empty($the_title) || empty($gender) || empty($department) || empty($email) || empty($username) || empty($password) || empty($cpassword)) {
			header("Location: ../lecturer_signup.php?signup=empty");
			exit();
		}else{
			//Check if input characters are valid
			/*if (!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname) || !preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $id_no) || !preg_match("/^[a-zA-Z]*$/", $email) || !preg_match("/^[a-zA-Z]*$/", $username)) {
				header("Location: ../student_signup.php?signup=invalid");
				exit();
			}else{*/
				//Check if email is valid
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					header("Location: ../lecturer_signup.php?signup=email");
					exit();
				}else{
					$query = "SELECT * FROM lecturer WHERE username='$username'";
					$result = mysqli_query($connect, $query);
					$resultChecker = mysqli_num_rows($result);
					if ($resultChecker > 0) {
						header("Location: ../lecturer_signup.php?signup=username_taken");
						exit();
					}else{
						//Checking to confirm password
						if ($password != $cpassword) {
							header("Location: ../lecturer_signup.php?signup=password_inmatch");
							exit();
						}else{
							//Hashing password
							$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
							//$hashedPwd = md5(password);
							//Insert the user into the database
							$query = "INSERT INTO lecturer (first_name, last_name, middle_name, title, gender, department, email, username, password) VALUES ('$fname','$lname', '$mname', '$the_title', '$gender', '$department', '$email', '$username', '$hashedPwd');";
							mysqli_query($connect, $query);
							//Log in user
							//$_SESSION['$std_id'] = $row['lect_id'];
							$_SESSION['$title'] = $the_title;
							$_SESSION['$firstname'] = $fname;
							$_SESSION['$lastname'] = $lname;
							$_SESSION['$email'] = $email;
							$_SESSION['$username'] = $username;
							header("Location: ../lecturer_main.php");
							exit();
						}
					}
				}
			//}
		}
	}else{
		header("Location: ../lecturer_signup.php");
		exit();
	}