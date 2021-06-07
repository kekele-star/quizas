<!DOCTYPE html>
<html>
<head>
	<title>student logged in</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color: #ccc;">
	<?php include 'includes/header.php'; ?>
	<section class="student-main-container">
		<div class="student-main-wrapper">
			<!--<h2>Home</h2>-->
			<h2>You'r welcome, 
				<?php 
					echo "<strong>".$_SESSION['$title']."<span>. </span>".$_SESSION['$lastname']."</strong>";
					//<div><h3>Welcome <?php echo '<strong>'.$_SESSION['username'].'</strong>'; </h3></div>
			 	?>
			</h2>
		</div>
		<div class="initial-main-buttons">
			<form>
				<input type="button" name="quiz" value="Write Quiz" onclick="window.location.href='write_quiz.php'">
				<!--<button name="quiz" onclick="window.location.href='write_quiz.php'">Write Quiz</button>-->
			</form>
		</div>
	</section>
	<?php include 'includes/footer.php'; ?>
</body>
</html>