<?php
	if (isset($_GET['name'])) {
		$name = $_GET['name'];
		$txt = 'Welcome ' . $name;
	} else {
		$txt = 'Welcome Guest';
	}

	date_default_timezone_set('America/Chicago');
	$today=date('l F j, Y - h:i:s a');
	$epochSeconds = time();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Assignment 1</title>
	<style>
		body {
			background-color: #ccc;
			margin: 20px 20px;
			padding: 5px 20px;}
	</style>
	</head>

	<body>
		<h1><?php print $txt; ?></h1>
		<h2>ITMD 562 Assignment 1</h2>
		<h3>Student Name: Hong Zhang</h3>
		<p>Please click <a href="form.php">the link</a> and fill in the form of student information.</p>
		<p>Page Loaded: <?php echo $today; ?> | <?php echo $epochSeconds; ?> seconds</p>
	</body>
</html>