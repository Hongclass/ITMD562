<?php
	date_default_timezone_set('America/Chicago');
	$date = date('l F n, Y - g:i:s a | U');
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AS 1 Sample Index</title>
</head>
<body>
<?php
if(!empty($_GET['name']) && (strlen($_GET['name']) > 0)) {
	print '<h1>Welcome' . htmlspecialchars($_GET['name']) . '</h1>';
} else {
	print '<h1>Welcome Guest!</h1>';
}
?>

<p><a href="form.php">AS1 Form</a></p>
<p>Page Loaded: <?php print$date; ?></p>
</body>
</html>