<?php
require_once 'Note.php';
require_once 'SQLiteNoteRepository.php';
$noteRepo = new \hzhan121\as3\SQLiteNoteRepository();
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update Note</title>
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
                    <h1>Edit Note</h1>
                </header>

                <center>
                    <form method="post" action="edit.php">
                        <input type="hidden" name="noteId" value="<?php print $_POST['id']; ?>">

                        <p>
                        <label>Subject
                            <input type="text" name="subject" id="subject"
                                value="<?php print $note->getSubject(); ?>">
                            </label><br>
                        </p>

                        <p>
                        <label>Author
                            <input type="text" name="author" id="author"
                                   value="<?php print $note->getAuthor(); ?>">
                        </label><br>
                        </p>

                        <p>
                        <label>Note
                                <textarea name = "content" row="6" cols="35" id="content"> 
                                    <?php print $note->getContent();?>
                                </textarea>
                        </label><br>
                        </p>

                        <input type="image" src="./images/save-button.png" alt="Submit">
                    </form>
                </center>

            <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['noteId'])): ?>

            <?php
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
                $noteAuthor = '';
                $noteContent = '';

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

            <?php if ($formIsValid): ?>
                <?php
                //Process valid data and save song update
                $aNote = $noteRepo->getNoteById($_POST['noteId']);
                $aNote->setSubject($noteSubject);
                $aNote->setAuthor($noteAuthor);
                $aNote->setContent($noteContent);
                $aNote->setCharacterCount($noteCount);
                $aNote->setCreateTime($noteTime);
                $noteRepo->saveNote($aNote);
                ?>

                <header id="header">
                    <div id="logo1"> <img src="./images/post_up_note.png"  
                        alt="note" style="width:100px;height:100px;"> 
                    </div>
                <h1>Note Update</h1>
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
                <h1>Edit Note</h1>
                </header>

                <center>
                    <p><span class="error">* required field.</span></p>

                    <form method="post" action="edit.php">
                        <input type="hidden" name="noteId" value="<?php print $_POST['noteId']; ?>">
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
            <?php endif;?>

            <?php else: ?>
                <header id="header">
                    <div id="logo1"> <img src="./images/post_up_note.png"  
                        alt="note" style="width:100px;height:100px;"> 
                    </div>
                    <h1>No Note to Edit</h1>
                </header>

                <center>
               <p><a href="index.php"><img src="./images/home_button.gif" height="50" width="128" alt="Home Page"></a></p>
               </center>
        </div>
    </div>
</div>

</body>
</html>
<?php endif;?>
