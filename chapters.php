<?php

$url = $_GET["url"];
$chapter = 1;
if($story[0][0] == null){
	preg_match_all('/[0-9]+/',$url,$story);
	$story = $story[0][0];
}
else 
{
	$story = substr($story[0][0],1,-1);
}
$ff = file_get_contents("https://www.fanfiction.net/s/" . $story . "/" . $chapter);


$pos1 = strpos($ff, "Chapters: ");

if($pos1 === false) {
	echo "1";
} else {
	$pos2 = $pos1+10;
	while($ff[$pos2] >= '0' && $ff[$pos2] <= '9') {
		$pos2++;
	}
	$str = substr($ff, $pos1+10, $pos2-($pos1+10));
	echo $str;
}


