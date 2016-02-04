<?php
$file_name="$_GET[file_name]";
$file="./upload/$file_name";
$file_size=filesize($file);

if(strstr($HTTP_USER_AGENT, "MSIE 5.5"))
{
	header("Content-Type: doesn/matter");
	header("Content-Lenght: ".file_size);
	header("Content-Disposition: filename=$file_name");
	header("Content-Transfer-Encoding: binary");
	header("Pragma: no-cache");
	header("Expires: 0");
}
else
{
	header("Content-type: file/unknown");
	header("Content-Disposition: attachment; filename=$file_name");
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: ".$file_size);
	header("Content-Description: PHP3 Generated Data");
	header("Pragma: no-cache");
	header("Expires: 0");
}

if(is_file("$file"))
{
	$fp=fopen("$file", "r");
	if(!fpassthru($fp))
	{
		fclose($fp);
	}
}
?>
