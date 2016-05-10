<?php

ob_start();

$title = 'my doc';

ob_start();
for($i=0; $i<10; $i++){
	echo "I is " . $i;
}
$loopcontents = ob_get_contents();
ob_end_clean();


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php print $title;?></title>
</head>
<body>
	<?php print $loopcontents;?>
</body>
</html>

<?php

if (true) {
	ob_end_flush();
} else {
	header('');
}

?>