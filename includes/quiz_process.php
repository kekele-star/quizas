<?php  
	include 'db_connect.php';
	session_start();
	#Check to see if score is set
	if (!isset($_SESSION['score'])) {
		$_SESSION['score'] = 0;
	}

	if (isset($_POST['submit'])) {
		# echo "Have been submitted";
		$number = $_POST['number'];
		if (isset($_POST['choice'])) {
			$selected_choice = $_POST['choice'];
		}else{
			$selected_choice = 0;
		}
		$next = $number + 1;

		# Get Correct Choice
		$query = "SELECT * FROM `choice` WHERE question_no = $number AND answer = 1";
		# Get result
		$result = mysqli_query($connect, $query);
		# Get that row
		$row = mysqli_fetch_assoc($result);
		# Set Correct Choice
		$correct_choice = $row['id'];

		//Comparism or Scoring
		if ($selected_choice == $correct_choice) {
			# Answer is correct
			$_SESSION['score']++;
		}

		// Checking if current question is the last question 
			/*
				# Get Tatal Number of Questions
				$query = "SELECT * FROM question";
				# Get result
				$result = mysqli_query($connect, $query);
				$total_no_of_questions = mysqli_num_rows($result);
			*/
		//if ($number == $total_no_questions) {
		if ($number == $_SESSION['total_no_of_questions']) {
			//$_POST['number'] = "Finish";
			header("Location: ../final.php");
			exit();
		}else{
			header("Location: ../question.php?n=".$next);
			exit();
		}
	}
?>