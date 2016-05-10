<?php
require_once 'Song.php';
require_once 'SqliteSongRepository.php';

$songRepo = new \bbailey4\class6\SqliteSongRepository();
?>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['id'])): ?>
<?php
$songRepo->deleteSong($_POST['id']);
 ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Delete Song</title>
    </head>
    <body>
    <h1>Song Deleted</h1>
    <p>Should have a confirmation page!!!</p>
    <p><a href="index.php">Back to Song List</a></p>
    </body>
    </html>
<?php else: ?>
    <!doctype html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Document</title>
    </head>
    <body>
      <h1>No Song Selected for deletion</h1>
      <p><a href="index.php">Back to Song List</a></p>
    </body>
    </html>
<?php endif; ?>