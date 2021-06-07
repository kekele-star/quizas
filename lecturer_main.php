<!DOCTYPE html>
<html>
<head>
	<title>lecturer logged in</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color: #ccc;">
	<?php include 'includes/header.php'; ?>
	<section class="lecturer-main-container">
		<div class="lecturer-main-wrapper">
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
				<input type="button" name="quiz" value="Coduct Quiz" onclick="window.location.href='quiz_admin.php'">
				<!--<button name="quiz">Coduct Quiz</button>-->
				<input type="button" name="accessment" value="Accessment" onclick="window.location.href='student_accessment.php'">
				<!--<button name="accessment">Students Accessment</button>-->
			</form>
		</div>
	</section>
	<?php include 'includes/footer.php'; ?>
</body>
</html>