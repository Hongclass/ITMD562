<?php
require_once 'Note.php';
require_once 'SQLiteNoteRepository.php';
$noteRepo = new \hzhan121\as3\SQLiteNoteRepository();
?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Delete Note</title>
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

                <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['id'])): ?>

                <?php
                 // Came from show page based on id parameter
                $note = $noteRepo->getNoteById($_POST['id']);
                ?>

                <header id="header">
                    <div id="logo1"> <img src="./images/post_up_note.png"  
                        alt="note" style="width:100px;height:100px;"> 
                    </div>
                    <h1>Delete Note</h1>
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

                        <P>Are you sure to delete? </P>
                    </dir>

                <center>
                    <form method="post" action="delete.php">
                        <input type="hidden" name="noteId" value="<?php print $_POST['id']; ?>">
                        <input type="image" src="./images/delete-button.png" alt="Submit">
                        <p><a href="index.php"><img src="./images/home_button.gif" height="50" width="128" alt="Home Page"></a></p>
                        </form>
                </center>

            <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['noteId'])): ?>
                <header id="header">
                    <div id="logo1"> <img src="./images/post_up_note.png"  
                        alt="note" style="width:100px;height:100px;"> 
                    </div>
                    <h1>Note Deleted</h1>
                </header>

                <center>
                    <?php
                        $noteRepo->deleteNote($_POST['noteId']);
                    ?>
                    <p><a href="index.php"><img src="./images/home_button.gif" height="50" width="128" alt="Home Page"></a></p>
                </center>

            <?php else: ?>
                <header id="header">
                    <div id="logo1"> <img src="./images/post_up_note.png"  
                        alt="note" style="width:100px;height:100px;"> 
                    </div>
                    <h1>No Note to Delete</h1>
                </header>

                <center>
                   <p><a href="index.php"><img src="./images/home_button.gif" height="50" width="128" alt="Home Page"></a></p>
                </center>
            <?php endif;?>

            </div>
        </div>
    </div>
    </body>
    </html>
