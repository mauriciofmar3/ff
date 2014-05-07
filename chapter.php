<?php

$url = $_GET["url"];
$chapter = $_GET["chapter"];
if($story[0][0] == null){
	preg_match_all('/[0-9]+/', $url, $story);
	$story = $story[0][0];
}
else 
{
	$story = substr($story[0][0], 1, -1);
}
$ff = file_get_contents("https://www.fanfiction.net/s/" . $story . "/" . $chapter);
echo $ff;