<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	

	
	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			//print $_POST['firstName'];
			print htmlspecialchars($_POST['firstName']);
		} else {
			?>
			<form method="POST" action="#">
					<input type="text" name="firstName" >
					<input type="submit">
				</form>
			<?php
		}
		
	?>
</body>
</html>