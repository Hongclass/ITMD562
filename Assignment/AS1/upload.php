<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>Assignment form</title>
		<style>
			body {
				background-color: #ccc;
				margin: 20px 20px;
				padding: 5px 20px;}
			.error {
				color: #FF0000;}
		</style>
	</head>

	<body>	
<form method="POST" action="#" enctype="multipart/form-data">
<p>
					<label>Attach File:<br>
					</label>
				</p>

				<p>
					<input type="file" name="fileToUpload" id="fileToUpload">
				</p>

	<input type="submit" value="Send Me" name="submit">

		</form>
	</body>

</html>

		<?php

			if(empty($_FILES)=== false){
			$target_dir = "src/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$fileType = pathinfo($target_file,PATHINFO_EXTENSION);

			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],
			$target_file)) {
				echo "The file has been uploaded.";
				echo "You can <a href=\"$target_file\">download this file</a>";
				} else {
				echo "Sorry, there was an error uploading your file.";
				}
			}
	?>