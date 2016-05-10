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

		<?php

			function test_input($data) {
			   $data = trim($data);
			   $data = stripslashes($data);
			   $data = htmlspecialchars($data);
			   return $data;
			}
			// define variables and set to empty values
			$firstNameErr = $lastNameErr= $emailErr = "";
			$cheErr = false; // assing a value to check the error
			$firstName = $lastName = $email =  $gender = $file = $comment = "";
	
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				// check first name
				if (empty($_POST["firstName"])) {
     					$firstNameErr = "First Name is required";
     				    $cheErr = true;
   				} else {
     					$firstName = test_input($_POST["firstName"]);
     					// check if name only contains letters and whitespace
     					if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
       					$firstNameErr = "Only letters and white space allowed"; 
       				    $cheErr = true;
     					}
   			      }

   			    // check last name
   				if (empty($_POST["lastName"])) {
     					$lastNameErr = "Last Name is required";
     				    $cheErr = true;
   				} else {
     					$lastName = test_input($_POST["lastName"]);
     					// check if name only contains letters and whitespace
     					if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
       					$lastNameErr = "Only letters and white space allowed"; 
       				    $cheErr = true;
     					}
   			      }

   			    // check email
			    if (empty($_POST["email"])) {
			    	$emailErr = "Email is required";
			        $cheErr = true;
			    } else {
			    	$email = test_input($_POST["email"]);
			        // check if e-mail address is well-formed
			    	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			      		$emailErr = "Invalid email format"; 
			       	    $cheErr = true;
			     	}
			   	}

			   	// check gender
			   	if (empty($_POST["gender"])) {
     				$gender = "";
   					} else {
     					$gender = test_input($_POST["gender"]);
   				}


   				// check comments
   				if (empty($_POST["comment"])) {
     				$comment = "";
   					} else {
     					$comment = test_input($_POST["comment"]);
   				}
            }
		 ?>

		<h1>Assignment Form</h1>

		<p><span class="error">* required field.</span></p>

		<form method="POST" action="#" enctype="multipart/form-data">

			<fieldset>
				<legend><strong>My Info</strong></legend>

				<p>
					<label>First Name: <input type="text" name="firstName" 
						value="<?php echo $firstName;?>"> <span class="error">* 
						<?php echo $firstNameErr;?></span> </label>
				</p>

				<p>
					<label>Last Name: <input type="text" name="lastName" 
						value="<?php echo $lastName;?>"> <span class="error">* 
						<?php echo $lastNameErr;?></span> </label>
				</p>

	   			<p>
					<label>Email Address: <input type="email" name="email" 
						value="<?php echo $email;?>"> <span class="error">* 
						<?php echo $emailErr;?></span> </label>
				</p>	

				<p>
					<label> Gender: 
					<input type = "radio" name = "gender" 
						<?php if (isset($gender) && $gender == "Male") echo "checked";?> 
						value = "Male"> Male
					</label>
					<label>
					<input type = "radio" name = "gender" 
						<?php if (isset($gender) && $gender=="Female") echo "checked";?> 
						value = "Female"> Female 
					</label>	
				</p>	

				<p>
					<label>Student Type:<br></label>

					<input type="checkbox" name="studentType[]" value = "Undergraduate" 
						<?php if(isset($_POST['studentType']) && is_array($_POST['studentType'])
						 && in_array('Undergraduate', $_POST['studentType'])) 
						 echo 'checked="checked"';?>> Undergraduate <br>
					<input type="checkbox" name="studentType[]" value = "Graduate" 
						<?php if(isset($_POST['studentType']) && is_array($_POST['studentType'])
						 && in_array('Graduate', $_POST['studentType'])) 
						 echo 'checked="checked"';?>> Graduate <br>
					<input type="checkbox" name="studentType[]" value="Online" 
						<?php if(isset($_POST['studentType']) && is_array($_POST['studentType'])
						 && in_array('Online', $_POST['studentType'])) 
						 echo 'checked="checked"';?>> Online <br>
					<input type="checkbox" name="studentType[]" value="In Classroom" 
						<?php if(isset($_POST['studentType']) && is_array($_POST['studentType'])
						 && in_array('In Classroom', $_POST['studentType'])) 
						 echo 'checked="checked"';?>> In Classroom <br>
				</p>		
				
				<p>
					<label>Attach File:<br></label>
				</p>

				<p>
					<input type="file" name="fileToUpload">
				</p>

				<p>
					<label>Add Comments:<br></label>
				</p>	
					
				<p>
					<textarea name="comment" row="30" cols="50"> <?php echo $comment;?> </textarea>
				</p>
 			      </fieldset>
			<br>

		<input type="submit" value="Send Me" name="submit">

		</form>

		<?php
			if (!empty($firstName&&$lastName&&$email) && $cheErr == false) {
				// clean the output buffer
				ob_clean();

				echo "<h2>Input Data:</h2>";
				echo "First Name: &nbsp;";
				echo $firstName;
				echo "<br><br>";
				echo "Last Name: &nbsp;";
				echo $lastName;
				echo "<br><br>";
				echo "Email Address: &nbsp;";
				echo $email;

				echo "<br><br>";

				if(!empty($gender)){
					echo "Gender: &nbsp;";
					echo $gender;
					echo "<br><br>";
					}

				if(!empty($_POST['studentType'])){
					echo "Student Type: ";	
					// Loop to store and display values of individual checked checkbox.
					foreach($_POST['studentType'] as $selected){
						echo $selected."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					}
					echo "<br><br>";
				}

				if(empty($_FILES)=== false){
					$target_dir = "upload/";
					$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
					$uploadOk = 1;
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],
						$target_file)) {
						echo "The file ". basename( $_FILES["fileToUpload"]["name"]).
                             " has been uploaded.&nbsp;";
						echo "you can <a href=\"$target_file\">download this file</a>";
						echo "<br><br>";
						} 
					}
	 				
				if(!empty($comment)){
				    echo "Comments: &nbsp;";
					echo $comment;
					echo "<br><br>";
				}

				date_default_timezone_set('America/Chicago');
				$today=date('d M Y - h:i:s A');
				echo "Submitted: ";
				echo $today;
			}
		?>

	</body>

</html>