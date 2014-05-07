<?php

$url = $_GET["url"];
#$chapter = $_GET["chapter"];

$headHTML = <<< EOF
	<head>
		<script src='//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
		<script src='scraper.js'></script>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<title>maumaumau</title>
	</head>
EOF;

$bodyHTML = <<< EOF
	<body>
	<div id='input-div'>
		<input type='checkbox' id='check' />
		<input type='text' id='address' value='" $url "' />	
		<input type='button' onclick='javascript:if($(window).width()> 1000)
				start(); 
			else
				start2();' value='load' />
		<h4>Starting on chapter</h4>
		<input type='text' id='chapter' value='1' />
		<input type='text' id='font' value='28' />
		<input type='button' onclick='changeFont()' value='font' />
	</div>
	
	<br />
	<div id='status'></div>
	<div id='story'></div>
	</body>
EOF;



echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>";
echo $headHTML; 
echo $bodyHTML;


echo "</html>";