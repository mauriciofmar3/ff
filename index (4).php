#!/usr/bin/php
<?php


$url = $_GET["url"];
#$chapter = $_GET["chapter"];




echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>

<head>
<script src='//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>maumaumau</title>
</head>


<body>
<div id='input-div'>
	<input type='checkbox' id='check' />
	<input type='text' id='address' value='" . $url . "' />	
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
<style>
	p {
		font-size: 28px;
	}
</style>

<script>
	function loadEditorScript() {
		var s = document.createElement('script');
		s.type = 'text/javascript';
		s.src = 'editor.js';
		$('head').append(s);
	}
	function changeFont(value) {
		$('p').css('font-size', $('#font')[0].value+'px');
	}
	function start() {
		$('#story').html('');
		//load(parseInt($('#chapter')[0].value));
		
		
		var chapters;
		$.get('chapters.php?url=" . $url . "', function(chapters){
		    loadChapters(chapters);
		    console.log('CHAPTERS '  + chapters);
		});
	}
	function loadChapters(chapters) {
		for(var x = parseInt($('#chapter')[0].value); x <= parseInt(chapters); ++x) {
			div = document.createElement('div');
			div.id = 'chapter' + x;
			$('#story').append(div);
			s = 'chapter.php?url=' + $('#address')[0].value + '&chapter=' + x;
			$('#chapter'+ x).load(s + ' #storytext', function() {
				$('p').on('click', function () {
					var check = $('#check')[0].checked;
					if(check)
						this.remove();
				});
			});
		}
	}	
	
	function load(c) {
		console.log(s);
		s = 'chapter.php?url=' + $('#address')[0].value + '&chapter=' + c;
		$('#status').html('LOADING CHAPTER ' + c);
		append(s,c);
	}
	function append(s, c) {
		div = document.createElement('div');
		$(div).load(s + ' #storytext', function() {
			if(div.innerHTML == ''){
				$('#status').html('');
				return;
			}
			$('#story').append(div.innerHTML);
			load(c+1);
		});
	}
	$(function() { 
		if($(window).width() > 1000)
			start(); 
		else
			start2();
			
	});
	
	
	function start2() {
		$('#story').html('');
		load2(parseInt($('#chapter')[0].value));
	}
	function load2(c) {
		s = 'chapter.php?url=' + $('#address')[0].value + '&chapter=' + c;
		console.log(s);
		$('#status').html('LOADING CHAPTER ' + c);
		append2(s,c);
	}
	function append2(s, c) {
		div = document.createElement('div');
		$(div).load(s + ' #storytext', function() {
			if(div.innerHTML == ''){
				$('#status').html('');
				return;
			}
			$('#story').append(div.innerHTML);
			load2(c+1);
				
		});
	}
</script>

</html>";