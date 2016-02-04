<html>
<head>
<title>level3</title>
</head>
<body>
<center>
<br><br><br><br><br><br>
<form method=post enctype="multipart/form-data" action=level3.php>
<input type=file name=file>
<input type=submit>
<br>
</form>

<?php
if($_FILES[file])
{
	$upload_dir="/var/www/test/upload/";
	$file_name=$_FILES[file][name];
	$file_data=$_FILES[file][tmp_name];

	if(move_uploaded_file($_FILES[file][tmp_name], $upload_dir.$file_name))
	{
		echo("./upload/".$file_name);
		echo(" upload success!<br>");
	}
	else
	{
		echo("File upload fail...<br>");
	}
}
else
{
	echo("Find secret file<br>");
	@fclose($f);
}
?>

</center>
</body>
</html>
