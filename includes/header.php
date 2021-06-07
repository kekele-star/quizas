<?php 
	if (!isset($_SESSION)) {
		session_start();
	}
?>
<header>
	<nav>
		<div class="header-wrapper">
			<a href="index.php"><h1>Home</h1></a>
			<!--<ul>
				<li><a href="index.php">Home</a></li>
			</ul>-->
			<div class="profile">
				<?php 
					if (isset($_SESSION['$std_id'])) {
						# code...
						#Had wanted to write a log out code here
						// That would have been echo 'html codes here';
					}
				 ?>
				<h3><a href="includes/logout.php">Logout</a></h3>
			</div>
		</div>
	</nav>
</header>