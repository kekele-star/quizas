<?php  
	session_start();
	include 'includes/db_connect.php';
	//Set question number
	$number = (int) $_GET['n'];

	/*
		# Get Tatal Number of Questions
		$query = "SELECT * FROM question";
		# Get result
		$result = mysqli_query($connect, $query);
		$total_no_of_questions = mysqli_num_rows($result);
	*/

	# Get Question
	$query = "SELECT * FROM question WHERE question_no = $number";
	//$query = "SELECT * FROM question WHERE question_no = '$number'";

	// Get result
	//$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$result = mysqli_query($connect, $query); # or die(mysqli_error.__LINE__);
	//$question = $result->fetch_assoc();
	$question = mysqli_fetch_assoc($result);

	# Get Choices
	$query = "SELECT * FROM `choice` WHERE question_no = $number";

	// Get results
	$choices = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>write quiz</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color: #ccc;">
	<?php include 'includes/header.php'; ?>	
	<main class="write-quiz-main" style="background-color: #ccc; font-family: arial; font-size: 15px; line-height: 1.6em;">
		<div class="heading">
			<h1>Quizer</h1>
		</div>
		<section class="quiz-container">
			<div class="questions">
				<div class="current">Question <?php echo $number; ?> of <?php echo $_SESSION['total_no_of_questions']; ?></div>
				<p class="question">
					<?php echo $question['question']; ?>
				</p>
				<form method="POST" action="includes/quiz_process.php">
					<ul class="choices">
						<?php while($row = mysqli_fetch_assoc($choices)): ?>
							<li><input type="radio" name="choice" value="<?php echo $row['id'] ?>"><?php echo $row['choice'] ?></li>
						<?php endwhile; ?>	
						<!--
						<li><input type="radio" name="choice" value="1">PHP</li>
						<li><input type="radio" name="choice" value="2">VB</li>
						<li><input type="radio" name="choice" value="3">HTML</li>
						<li><input type="radio" name="choice" value="4">CSS</li>
						-->
					</ul>
					<?php 
						if($number == $_SESSION['total_no_of_questions']){
							echo '<input type="submit" name="submit" value="Finish">';
						}else{
							echo '<input type="submit" name="submit" value="Next">';
						}
					?>
					<input type="hidden" name="number" value="<?php echo $number; ?>">
				</form>
			</div>
		</section>
	</main>
	<?php include 'includes/footer.php'; ?>
</body>
</html>