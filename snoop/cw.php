<?php
//Snoopy.class.php를 불러옵니다
require($_SERVER['DOCUMENT_ROOT'].'/snoop/lib/Snoopy.class.php');


$params = array("foo"=>"A","bar"=>"B");
$snoopy = new Snoopy();


$snoopy = new Snoopy;
$snoopy->httpmethod = "POST";


//$snoopy->fetch('http://165.246.149.135/index.php?mid=board_vqEn86&document_srl=5832');

$snoopy->submit("http://165.246.149.135/index.php?mid=board_vqEn86&document_srl=5832", $params);
print $snoopy->results;

$text = $snoopy->results;



?>