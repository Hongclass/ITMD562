<?php
session_start();
if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit;
}

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Protected Page</title>
</head>
<body>
	<h1>This is my protected Page</h1>
	<h3>Hello <?php echo $_SESSION['user']; ?></h3>
	<a href="login.php?logout=yes">logout</a>
</body>
</html>