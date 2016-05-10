<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form method="post" action="#">
		<input type="text" name="foo">
		<!--<input type="hidden" name="subm" value="anything">-->
		<input type="submit">
	</form>

	<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		echo htmlspecialchars($_POST['foo']);
	}
	// if (isset($_POST['subm'])) {
	// 	echo $_POST['foo'];
	// }
	?>
</body>
</html>