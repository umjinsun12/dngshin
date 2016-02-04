<html>
<head>
<title>level1</title>
</head>
<body>
<center>
<br><br><br><br><br><br>
<form method=get action=level5.php>
<input type=text name=id value='guest'>
<br>
<input type=password name=pw value='guest'>
<br>
<input type=submit value='login'>
</form>

<?php
if($_GET[id] && $_GET[pw])
{
	$connect=@mysql_connect("localhost", "root", "1234") or die("mysq_connect error");
	@mysql_select_db("problem", $connect) or die("mysql_select_db error");

	$q=@mysql_query("select * from level1 where id='$_GET[id]' and pw='$_GET[pw]'");

	while($d=@mysql_fetch_array($q))
	{
		echo("$d[no] - $d[id] - $d[pw]<br>");
	}
}
else
{
	echo("Find current database name.<br>");
}
?>

</center>
</body>
</html>
