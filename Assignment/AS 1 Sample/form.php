<?php

date_default_timezone_set('America/Chicago');
$date = date('j M Y - g:i:s A');

// Shorten Request Variables if they are set
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// Check form field validation
$formValid = true;
$nameMessage = '';
$emailMessage = '';
if (empty($name)) {
	$formValid = false;
	$nameMessage = '<span style = "color: red;"> *Name is required!</span>';
}
if (empty($email)) {
	$formValid = false;
	$nameMessage = '<span style = "color: red;"> *Email is required!</span>';
}

// Handle File Upload if fields are valid
$fileUploadSuccess = false;
$resultLink = '';
if (isset($_FILES['myfile']) && $formValid) {
	$uploadDir = 'uploads/';
	if (!file_exists('uploads')) {
		mkdir('uploads', 0777, true);
	}
	$uploadDest = $uploadDir . basename($_FILES['myfile']['name']);
	$fileUploadSuccess = move_uploaded_file($_FILES['myfile']['tem_name'], $uploadDest);
	$resultLink = '<a href = "' . $uploadDest . '">' . basename($_FILES['myfile']['name']) . '</a>';
}

?>

<!doctype html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<title>AS 1 Sample Form</title>
</head>

<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// POST request process request data
	if ($formValid) {
		// Show Results
		print '<p><strong>Submitted:</strong> ' . $date . '</p>';
		print '<p><strong>Name:</strong> ' . htmlspecialchars($name) . '</p>';
		print '<p><strong>Email:</strong> ' . htmlspecialchars($email) . '</p>';
		if (!empty($message)) {
			print '<p><strong>Message:</strong> ' . nl2br(htmlspecialchars($message)) . '</p>';
		}
		if ($fileUploadSuccess) {
			print '<p>' . $resultLink . '</p>';
		}
	} else {
		// Show Form again with validation messages and data
		?>

	<form action = "form.php" method = "post" enctype = "multipart/form-data">
		<p><label>Name: <input type = "text" name = "name" value = "<?php print $name; ?>"></label></p>
		<p><label>Email: <input type = "text" name = "email" value = "<?php print $email; ?>"></label></p>
		<p><label>Message: <br><textarea name = "message"><?php print $message; ?></textarea></label></p>
		<p><input type = "file" name = "myfile"></p>
		<p><input type = "submit"></p>
	</form>
	<?php
	}
} else {
	// GET request show form
	?>
	
}

</body>