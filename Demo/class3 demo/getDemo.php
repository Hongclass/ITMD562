<?php
if (isset($_GET['name'])) {
	$name = $_GET['name'];
	$txt = 'Hello ' . $name;
} else {
	$txt = 'Hello World';
}


?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>GET Demo</title>
</head>
<body>
	<h1>GET Demo</h1>
	<h2><?php print $txt; ?></h2>
</body>
</html>