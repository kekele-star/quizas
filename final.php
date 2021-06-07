<?php session_start(); ?>
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
				<h2>You're Done!</h2>
				<p>Congrats! You have completed the test</p>
				<p>Total Score: <?php echo $_SESSION['score'] ?></p>
				<a href="write_quiz.php" class="take-quiz-again">Take Quiz Again</a>
			</div>
		</section>
	</main>
	<?php include 'includes/footer.php'; ?>
</body>
</html>