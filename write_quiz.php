<?php  
	session_start();
	$_SESSION['score'] = 0;
	include 'includes/db_connect.php';
	# Get Tatal Number of Questions
	$query = "SELECT * FROM question";
	# Get result
	$result = mysqli_query($connect, $query);
	$total_no_of_questions = mysqli_num_rows($result);
	$_SESSION['total_no_of_questions'] = $total_no_of_questions
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
			<div class="questions-later">
				<h2>Test your knowledge through quizing</h2>
				<p>This is a multiple choice set of questions</p>
				<ul>
					<li><strong>Number of questions: </strong><?php echo "$total_no_of_questions"; ?></li>
					<li><strong>Type of quiz: </strong>Multiple Choice Questions</li>
					<li><strong>Estimated Time: </strong><?php echo "$total_no_of_questions" * .5; ?> Minutes</li>
				</ul>
				<a href="question.php?n=1" class="start">Start Quiz</a>
			</div>
		</section>
	</main>
	<?php include 'includes/footer.php'; ?>
</body>
</html>