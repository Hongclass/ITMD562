<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
if (($handle = fopen("users.csv", "r")) !== FALSE) {
    echo '<table>';
    while (($data = fgetcsv($handle)) !== FALSE) {
        $num = count($data);
        echo '<tr>';
        for ($c=0; $c < $num; $c++) {
            echo '<td>' . $data[$c] . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    fclose($handle);
}
?>
</body>
</html>
