
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

    $dir = "src/";
    $filename = $dir . $latest_filename;
    $filename = realpath($filename);

    $file_extension = strtolower(substr(strrchr($filename,"."),1));

    switch ($file_extension) {
        case "pdf": $ctype="application/pdf"; break;
        case "exe": $ctype="application/octet-stream"; break;
        case "zip": $ctype="application/zip"; break;
        case "doc": $ctype="application/msword"; break;
        case "xls": $ctype="application/vnd.ms-excel"; break;
        case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
        case "gif": $ctype="image/gif"; break;
        case "png": $ctype="image/png"; break;
        case "jpe": case "jpeg":
        case "jpg": $ctype="image/jpg"; break;
   //   default: $ctype="application/force-download";
    }

    if (!file_exists($filename)) {
        die("NO FILE HERE");
    }

    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false);
    header("Content-Type: $ctype");
    header("Content-Disposition: attachment; filename=\"".basename($filename)."\";");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".@filesize($filename));
            
    set_time_limit(0);
    @readfile("$filename") or die("File not found.");
?>
