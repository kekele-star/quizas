<?php  
	# session_start();
	include 'includes/db_connect.php';
	if(isset($_POST['submit'])){
		// Get POST variables
		$question_number = mysqli_real_escape_string($connect, $_POST['question_number']);
		$question = mysqli_real_escape_string($connect, $_POST['question']);
		
		// Choices Array
		$choice = array();
		$choice[1] = mysqli_real_escape_string($connect, $_POST['choice1']);
		$choice[2] = mysqli_real_escape_string($connect, $_POST['choice2']);
		$choice[3] = mysqli_real_escape_string($connect, $_POST['choice3']);
		$choice[4] = mysqli_real_escape_string($connect, $_POST['choice4']);
		$choice[5] = mysqli_real_escape_string($connect, $_POST['choice5']);

		// Getting the correct choice number
		$correct_choice_number = $_POST['correct_choice_number'];

		//echo $choice1;
		//echo $choice2;
		//echo $choice3;
		//echo $choice4;
		//echo $choice5;

			/*echo $question_number.'<br>';
			echo $question.'<br>';
			foreach($choice as $i => $value){ // $i is the choice's id or position and $value is the choice's string or text
			echo $i.'<br>';
			echo $value.'<br>';
			}
			//die();*/

		// Checking whether question inputbox is empty
			$insert_row = '';
			try {
				if ($question != '') {
					# Question Query
					$query = "INSERT INTO `question`(question_no, question) VALUES('$question_number', '$question')";
				
					# Run Query
					$insert_row = mysqli_query($connect, $query);
				}else{
					throw new Exception("Please enter the question", 1);
					//$msg = 'Please enter the question';
				}
			} catch (Exception $e) {
				$error_msg = $e->getMessage();
			}

		
		
		/*if($insert_row){
			echo "Executed";
		}else{
			//ini_set('display error', 1);
			//error_reporting(E_ALL ^ E_NOTICE);
			die(mysqli_error($connect));
		}
		echo $insert_row;
		echo 2;
		die();*/
		/*class myExceptions extends Exception{}
		try {
			if ($insert_row) {
				# code...
			}
		} catch (myExceptions $e) {
			echo 'Caught an exception: ', $e->getMessage(), "\n";
			die();
		}*/

		//Validate Insertion. ie, if insertion of question is successful
		try {
			if($insert_row){
				// Inserting the choices
				foreach($choice as $i => $value){ // $i is the choice's id or position and $value is the choice's string or text
					// checking whether the value is not empty b4 inserting
					if($value != ''){
						// Checking whether this choice is the correct answer
						if($correct_choice_number == $i){
							$answer = 1;
						}else{
							$answer = 0;
						}

						// Choice Query
						$query = "INSERT INTO `choice`(question_no, answer, choice) VALUES('$question_number', '$answer', '$value')";
			
						# Run Query
						$insert_row = mysqli_query($connect, $query);

						//Validate Insertion. ie, if insertion of choice is successful
						if($insert_row){
							continue;
						}else{
							die(mysqli_error($connect)); #die('Error : ('.$mysqli->errno . ') '. $mysqli->error);
						}
					}
				}
				$success_msg ='Question '.$question_number.' has been added';
				//header("Location: quiz_admin.php");
				//exit();
			}else{
				//echo "Not working";
				//die(mysqli_error($connect)); //die('Error : ('.$mysqli->errno . ') '. $mysqli->error);
				throw new Exception("Sorry this question number ".$question_number." has already been added", 1);
			}
		} catch (Exception $e) {
			if (!isset($error_msg)) {
				$error_msg = $e->getMessage();
			}
		}
		
	}

	# Get Tatal Number of Questions
	$query = "SELECT * FROM question";
	# Get result
	$result = mysqli_query($connect, $query);
	$total_no_of_questions = mysqli_num_rows($result);
	$next = $total_no_of_questions + 1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>quiz_admin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color: #ccc;">
	<?php include 'includes/header.php'; ?>
	<main class="quiz-admin-main" style="background-color: #ccc; font-family: arial; font-size: 15px; line-height: 1.6em;">
		<div class="heading">
			<h1>Quizer</h1>
		</div>
		<section class="quiz-container">
			<div class="questions">
				<h2>Add a Question</h2>
				<?php 
					if (isset($success_msg)) {
						echo '<p>'.$success_msg.'</p>';
					}
					if(isset($error_msg)){
						echo '<p id="error_msg">'.$error_msg.'</p>';
					}
				?>
				<form class="quiz-admin-form" method="POST" action="quiz_admin.php">
					<p>
						<label id="my-label">Question Number: </label>
						<input type="number" name="question_number" value="<?php echo $next; ?>">
					</p>
					<p>
						<label id="my-label">Question: </label>
						<input type="text" name="question">
					</p>
					<p>
						<label id="my-label">Choice No. 1: </label>
						<input type="text" name="choice1">
					</p>
					<p>
						<label id="my-label">Choice No. 2: </label>
						<input type="text" name="choice2">
					</p>
					<p>
						<label id="my-label">Choice No. 3: </label>
						<input type="text" name="choice3">
					</p>
					<p>
						<label id="my-label">Choice No. 4: </label>
						<input type="text" name="choice4">
					</p>
					<p>
						<label id="my-label">Choice No. 5: </label>
						<input type="text" name="choice5">
					</p>
					<p>
						<label id="my-label">Correct Choice No.: </label>
						<input type="number" name="correct_choice_number">
					</p>
					<p>
						<input type="submit" name="submit" value="Add">
						<input type="submit" name="finish" value="Finish">
					</p>
				</form>
			</div>
		</section>
	</main>
	<?php include 'includes/footer.php'; ?>
</body>
</html>