<!DOCTYPE HTML PUBLIC> 
<html>
<head>
	<title>PHP form check box example</title>
</head>

<body>

<?php
	if(isset($_POST['formSubmit'])) 
    {
		$aDoor = $_POST['formDoor'];
		
		if(empty($aDoor)) 
        {
			echo("<p>You didn't select any buildings.</p>\n");
		} 
        else 
        {
            $N = count($aDoor);

			echo("<p>You selected $N door(s): ");
			for($i=0; $i < $N; $i++)
			{
				echo($aDoor[$i] . " ");
			}
			echo("</p>");
		}
        

        //and so on
	}
    
    function IsChecked($chkname,$value)
    {
        if(!empty($_POST[$chkname]))
        {
            foreach($_POST[$chkname] as $chkval)
            {
                if($chkval == $value)
                {
                    return true;
                }
            }
        }
        return false;
    }
?>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
	<p>
		Which buildings do you want access to?<br/>
		<input type="checkbox" name="formDoor[]" value="A" />Acorn Building<br />
		<input type="checkbox" name="formDoor[]" value="B" />Brown Hall<br />
		<input type="checkbox" name="formDoor[]" value="C" />Carnegie Complex<br />
		<input type="checkbox" name="formDoor[]" value="D" />Drake Commons<br />
		<input type="checkbox" name="formDoor[]" value="E" />Elliot House
	</p>
	<input type="submit" name="formSubmit" value="Submit" />
</form>

</body>
</html>