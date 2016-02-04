<html>
<head>
<title>level7</title>
</head>
<body>
<center>
<br><br><br><br><br><br>
<form method=get action=level7.php>
<input type=text name=id value='guest'>
<br>
<input type=submit value='submit'>
</form>

<?php
if($_GET[id])
{
	if($_GET[id]=='admin')
	{
		echo("You are not admin!\n");
	}
	else
	{
		$fp=fopen('./log.php', 'a+');
		fwrite($fp, $_SERVER['REMOTE_ADDR']);
		fwrite($fp, " : ");
		fwrite($fp, $_GET[id]);
		fwrite($fp, "<br>");
		fclose($fp);
	}
}
else
{
	echo("Insert admin into log file.<br>");
}
?>

</center>
</body>
</html>
