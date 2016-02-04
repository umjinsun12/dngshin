<html>
<head>
<title>level2</title>
</head>
<body>
<center>
<br><br><br><br><br><br>
<form method=get action=level2.php>
<input type=text name=id value='hidden'>
<br>
<input type=password name=pw>
<br>
<input type=submit value='login'>
</form>

<?php
if($_GET[id] && $_GET[pw])
{
	$connect=@mysql_connect("localhost", "root", "1234") or die("mysq_connect error");
	@mysql_select_db("problem", $connect) or die("mysql_select_db error");

	$q=@mysql_fetch_array(mysql_query("select id from level1 where id='$_GET[id]' and pw='$_GET[pw]'"));

	if($q[id])
	{
		echo("Login success!<br>");
	}
	else
	{
		echo("Login fail...<br>");
	}
	
}
else
{
	echo("Find hidden's password<br>");
}
?>

</center>
</body>
</html>
