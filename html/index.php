<?php
header('Content-Type: text/html; charset=UTF-8');

$db_host = "localhost";
$db_user = "root";
$db_passwd = "1234";
$db_name = "dbtest";
$conn = mysql_connect($db_host,$db_user,$db_passwd) or die("데이터베이스 연결에 실패하였습니다.");
mysql_select_db($db_name, $conn);





$idx =  $_POST['idx'];
$latitute =  $_POST['latitute'];
$longtitute =  $_POST['longtitute'];

echo "인덱스 = $idx";
echo "경도 = $latitute";
echo "위도 = $longtitute";


$sql = "INSERT INTO jinloc VALUES ($idx, $latitute, $longtitute)";
mysql_query($sql,$conn);

?>