<?php

$file = "data.txt";

// Open the file for reading
$handle = fopen($file, "r") or die("ERROR: Cannot open the file");

// Read in 20 bytes
$content = fread($handle,"20");

// Closing the file handle
fclose($handle);
   
// Display the file content 
echo $content;
?>

