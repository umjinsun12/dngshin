<?php
//Snoopy.class.php를 불러옵니다
require($_SERVER['DOCUMENT_ROOT'].'/snoop/lib/Snoopy.class.php');


$snoopy = new Snoopy;

for($i=7000;$i>0;$i--)
{
$snoopy->fetch('http://165.246.149.135/index.php?mid=board_vqEn86&document_srl='.$i);


$fp = fopen($_SERVER['DOCUMENT_ROOT'].'/snoop/result/result.txt','a',true);


$resulttxt = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/snoop/result/result.txt');




preg_match_all("/<a href=\"javascript:goViewInfo(.*?)>(.*?)<\/a>/is" ,$snoopy->results,$text);



foreach ($text[2] as $key => $value) {
    if(($key%6)==0)
    {
        fwrite($fp, "\n".$value."|");        
    }
    else {
        fwrite($fp, $value."|");
    }
    
}

}
//fwrite($fp,$text[2][0]."|".$text[2][1]."|".$text[2][2]."|".$text[2][3]."|".$text[2][4]."|".$text[2][5]);

fclose($fp);

?>