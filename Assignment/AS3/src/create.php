<?php

require_once 'Note.php';
require_once 'SQLiteNoteRepository.php';

function test_input($inputData) {
    $inputData = trim($inputData);
    $inputData = stripslashes($inputData);
    $inputData = htmlspecialchars($inputData);
    return $inputData;
}

//Validate form fields
$formIsValid = true;
$subjectErr = '';
$authorErr = '';
$noteSubject = '';
$noteAuthor ='';
$noteContent ='';

// set the vale for time
date_default_timezone_set('America/Chicago');
$noteTime = date('Y-m-d H:i:s');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // check subject
    if (empty($_POST["subject"])){
        $formIsValid = false;
        $subjectErr = "Subject is required!";
    } else {
        $noteSubject = test_input($_POST["subject"]);
    }
    // check author
    if (empty($_POST["author"])){
        $formIsValid = false;
        $authorErr = "Author is required!";
    } else {
        $noteAuthor = test_input($_POST["author"]);
    }

    // check content
    if (empty($_POST["content"])) {
        $noteContent = " ";
    } else {
        $noteContent = test_input($_POST["content"]);
    }
}
// assign value to characters count
$noteCount = strlen($noteContent);
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add New Note</title>
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

            <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
                <?php if ($formIsValid): ?>
                    <?php
                    $noteRepo = new \hzhan121\as3\SQLiteNoteRepository();
                    $note = new \hzhan121\as3\Note();
                    $note->setSubject($noteSubject);
                    $note->setAuthor($noteAuthor);
                    $note->setContent($noteContent);
                    $note->setCharacterCount($noteCount);
                    $note->setCreateTime($noteTime);
                    $noteRepo->saveNote($note);
                    ?>

                <header id="header">
                    <div id="logo1"> <img src="./images/post_up_note.png"  
                            alt="note" style="width:100px;height:100px;"> 
                    </div>
                    <h1>New Note Created</h1>
                </header>

                    <center>
                        <div id="home_table" class="container">
                            <table>
                                <tr>
                                    <td class="data">Subject:</th>
                                    <td class="data"><?php print $noteSubject; ?></th>
                                </tr>
                                <tr>
                                    <td class="data">Author:</th>
                                    <td class="data"><?php print $noteAuthor; ?></th>
                                </tr>
                                <tr>
                                    <td class="data">Note:</th>
                                    <td class="data"><?php print $noteContent; ?></th>
                                </tr>     
                                <tr>
                                    <td class="data">Total Characters:</th>
                                    <td class="data"><?php print $noteCount; ?></th>
                                </tr>     
                                <tr>
                                    <td class="data">Created or Last Revise Time:</th>
                                    <td class="data"><?php print $noteTime; ?></th>
                                </tr>        
                            </table>
                            <p><a href="index.php"><img src="./images/home_button.gif" height="50" width="128" alt="Home Page"></a></p>
                        </dir>
                    </center>

                <?php else: ?>
                    <header id="header">
                        <div id="logo1"> <img src="./images/post_up_note.png"  
                            alt="note" style="width:100px;height:100px;"> 
                        </div>
                        <h1>Create Note</h1>
                    </header>

                    <center>
                        <p><span class="error">* required field.</span></p>

                        <form method="post" action="create.php">
                            <p>
                            <label>Subject <span class="error">*
                                <input type="text" name="subject" id="subject"
                                       value="<?php echo $noteSubject; ?>">
                                <span class="error">*
                                    <?php echo $subjectErr;?></span>
                            </label><br>
                            </p>

                            <p>
                            <label>Author <span class="error">*
                                <input type="text" name="author" id="author"
                                       value="<?php echo $noteAuthor; ?>">
                                <span class="error">*
                                    <?php echo $authorErr;?></span>
                            </label><br>
                            </p>

                            <p>
                            <label>Note
                                <textarea name = "content"  row="6" cols="35" id="content">
                                <?php print $noteContent;?></textarea>
                            </label><br>
                            </p>

                            <input type="image" src="./images/save-button.png" alt="Submit">
                        </form>
                    </center>
                <?php endif; ?>

            <?php else: ?>
                <header id="header">
                    <div id="logo1"> <img src="./images/post_up_note.png"  
                        alt="note" style="width:100px;height:100px;"> 
                    </div>
                    <h1>Create Note</h1>
                </header>

                <center>
                    <p><span class="error">* required field.</span></p>

                    <form method="post" action="create.php">
                        <p>
                        <label>Subject <span class="error">*
                            <input type="text" name="subject" id="subject"
                                   value="<?php print $noteSubject; ?>">
                        </label><br>
                        </p>

                        <p>
                        <label>Author <span class="error">*
                            <input type="text" name="author" id="author"
                                   value="<?php print $noteAuthor; ?>">
                        </label><br>
                        </p>

                        <p>
                        <label>Note 
                                <textarea name = "content"  row="6" cols="35" id="content">
                                    <?php print $noteContent;?>
                                </textarea>
                        </label><br>
                        </p>

                        <input type="image" src="./images/save-button.png" alt="Submit">
                    </form>
                </center>
            <?php endif; ?>
            </div>
        </div>
    </div>

    </body>
</html>
