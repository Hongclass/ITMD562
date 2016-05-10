<?php

$file = "city.csv";

// Open the file for reading
$handle = fopen($file, "r") or die("ERROR: Cannot open the file");

// Read in the entire file
$content = fgetcsv($handle);

// Closing the file handle
fclose($handle);
   
// Display the file content 
print_r($content);
?>

