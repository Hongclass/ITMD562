<?php
	session_start();

	if (isset($_GET['logout'])) {
		session_destroy();
	}

	if(isset($_SESSION['user']))
	{
	    header("Location: index.php");
	    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Shorten Request Variables if they are set
	$username = isset($_POST['username']) ? trim($_POST['username']) : '';
	$password = isset($_POST['password']) ? trim($_POST['password']) : '';

	$valid_user = 'Hong';
	$valid_hash = '$2y$10$vwbFQayBG6X/uU8dMyqKO.yxC.jp1LImIzyWnOIwg1ddm1.tlwGka';

	//password:angel

	if ($username == $valid_user && password_verify($password, $valid_hash)) {
		$_SESSION['user'] = $valid_user;
		header("Location: index.php");
    	exit;
	}
}

?>

<!doctype html>
	<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <title>Notes Login</title>
	    <link rel="stylesheet" type="text/css" href="css/normalize.css">
	    <link rel="stylesheet" type="text/css" href="css/styles.css">
	    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	    <link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
	    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
	    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	</head>

	<body>
		<div id="page-wrapper">

    		<div id="content-wrapper">

        		<div id="main-content">

            		<div id="login" class="container">
                		<table>
                			<tr>
                				<td>
                					<img src="./images/post_up_note.png"  
                						alt="note" style="width:300px;height:400px;"> 
                				</td>

                				<td>
                					<form action="#" method="POST">
										<label>User Name</label><br>
										<input type="text" name="username"><br>
										<p></p>
										<label>Password</label><br>
										<input type="password" name="password"><br>
										<p></p>
										<input type="image" src="./images/login.jpg" alt="Submit" height="60" width="120">
									</form>    
                				</td>
                			</tr>
                		</table>
               
            		</dir>
        		</dir>
    		</dir>
		</dir>
	</body>
</html>