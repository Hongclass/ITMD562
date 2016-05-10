<?php
require_once 'SQLiteNoteRepository.php';
require_once 'Note.php';
$noteRepo = new \hzhan121\as3\SQLiteNoteRepository();

//Shortend Get variable names if set
$noteId = isset($_GET['id']) ? $_GET['id'] : '';
$note = $noteRepo->getNoteById($noteId);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Note</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>

<body>
    <div id="page-wrapper">
        <div id="content-wrapper">
            <div id="main-content">

                <?php if ($note): ?>
                        <header id="header">
                            <div id="logo1"> <img src="./images/post_up_note.png"  
                                alt="note" style="width:100px;height:100px;"> 
                            </div>
                            <h1>Show Note</h1>
                        </header>

                    <div id="home_table" class="container">
                        <table>
                            <tr>
                                <td class="data">Subject:</th>
                                <td class="data"><?php print $note->getSubject(); ?></th>
                            </tr>
                            <tr>
                                <td class="data">Author:</th>
                                <td class="data"><?php print $note->getAuthor(); ?></th>
                            </tr>
                            <tr>
                                <td class="data">Note:</th>
                                <td class="data"><?php print $note->getContent(); ?></th>
                            </tr>     
                            <tr>
                                <td class="data">Total Characters:</th>
                                <td class="data"><?php print $note->getCharacterCount(); ?></th>
                            </tr>     
                            <tr>
                                <td class="data">Created or Last Revise Time:</th>
                                <td class="data"><?php print $note->getCreateTime(); ?></th>
                            </tr>        
                        </table>
                    </dir>

                    <p>
                        <form action="edit.php" method="POST">
                            <input type="hidden" name="id" value="<?php print $note->getId();?>">
                            <input type="image" src="./images/edit-button.png" alt="Submit">
                        </form>
                    </p>

                    <p>
                        <form action="delete.php" method="POST">
                            <input type="hidden" name="id" value="<?php print $note->getId();?>">
                            <input type="image" src="./images/delete-button.png" alt="Submit">
                        </form>
                    </p>

                <?php else: ?>
                    <header id="header">
                        <div id="logo1"> <img src="./images/post_up_note.png"  
                                alt="note" style="width:100px;height:100px;"> 
                        </div>
                        <h1>No Note Found</h1>
                    </header>
                    <center>
                        <p><a href="index.php"><img src="./images/home_button.gif" 
                            height="50" width="128" alt="Home Page"></a></p>
                    </center>
                <?php endif;?>

            </div>
        </div>
    </div>
</body>
</html>

