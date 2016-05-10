<?php
session_start();
//require_once 'credentials.php';

if (isset($_GET['logout'])) {
	session_destroy();
}

if(isset($_SESSION['user']))
{
    header("Location: protected.php");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Shorten Request Variables if they are set
	$username = isset($_POST['username']) ? trim($_POST['username']) : '';
	$password = isset($_POST['password']) ? trim($_POST['password']) : '';

	$valid_user = 'Brian';
	$valid_hash = '$2y$10$tvKXv57wFWSeECg2ALkh3uQE.F6z7cSjQT/A.3CzfHIVYQtp2/YFe';

	if ($username == $valid_user && password_verify($password, $valid_hash)) {
		$_SESSION['user'] = $valid_user;
		header("Location: protected.php");
    	exit;
	}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Page</title>
</head>
<body>

		<form action="#" method="POST">
			<label>Username: <input type="text" name="username"></label><br>
			<label>Password: <input type="password" name="password"></label><br>
			<input type="submit">
		</form>


</body>
</html>