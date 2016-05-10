<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit;
}

require_once 'SQLiteNoteRepository.php';
require_once 'Note.php';

$noteRepo = new \hzhan121\as3\SQLiteNoteRepository();

$noteList = $noteRepo->getAllNotes();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NoteList</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="page-wrapper">
    <header id="header">
            <div id="logo1"> <img src="./images/post_up_note.png"  
                alt="note" style="width:100px;height:100px;"> 
            </div>
            <h1> <?php echo $_SESSION['user']; ?>'s Notes</h1>
    </header>

    <div id="content-wrapper">
        <div id="main-content">
            <div id="home_table" class="container">
                <table>
                    <tr>
                        <th class="table_head">Subject</th>
                        <th class="table_head">Created or Last Revise Time</th>
                        <th class="table_head">Total Charaters</th>
                    </tr>

                    <?php
                    foreach($noteList as $note) {
                        print '<tr>';
                        print '<td class="data"><a href="show.php?id=' . $note->getId() . '">'. $note->getSubject() .'</a></td>';
                        print '<td class="data">' . $note->getCreateTime() . '</td>';
                        print '<td class="data">' . $note->getCharacterCount(). '</td>';
                        
                        $noteId = $note->getId();
                        $note = $noteRepo->getNoteById($noteId);
                    ?>

                    <td class="data">
                    <form action="edit.php" method="POST">
                                    <input type="hidden" name="id" value="<?php print $note->getId();?>">
                                    <input type="image" src="./images/edit-button.png" alt="Submit">
                                </form> 
                    </td>

                    <td class="data">   
                                <form action="delete.php" method="POST">
                                    <input type="hidden" name="id" value="<?php print $note->getId();?>">
                                    <input type="image" src="./images/delete-button.png" alt="Submit">
                                </form>
                    </td>

                    </tr>;

                    <?PHP
                    }
                    ?>

                </table>
                
                <p><a href="create.php"><img src="./images/add.jpg" alt="Add Note" height="46" width="100"></a></p>
                <p><a href="login.php?logout=yes"><img src="./images/logout.png" alt="Log Out" height="46" width="100"></a></p>

            </dir>
        </dir>
    </dir>
</dir>
</body>
</html>
