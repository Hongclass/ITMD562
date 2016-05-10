<?php
//get the lastest file uploaded in excel_uploads/
$path = "src"; 
$latest_ctime = 0;
$latest_filename = '';    
$d = dir($path);
while (false !== ($entry = $d->read())) {
$filepath = "{$path}/{$entry}";
//Check whether the entry is a file etc.:
    if(is_file($filepath) && filectime($filepath) > $latest_ctime) {
    $latest_ctime = filectime($filepath);
    $latest_filename = $entry;
    }//end if is file etc.
}//end while going over files in excel_uploads dir.
echo $latest_filename;
?>