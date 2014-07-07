

<!--
Created by Paul Lyons
thepaullyons at gmail.com
This code is not guaranteed in anyway, except to create limited joy based on the photos in the various assets folders.
If you need any help, just email me at the link above.
November 2012
 -->



<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>My Galleries</title>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.easypaginate.js"></script>
    
	<link rel="stylesheet" type="text/css" href="js/shadowbox/shadowbox.css">
    <link rel="stylesheet" type="text/css" href="css/photos.css">
    
    <script type="text/javascript" src="js/shadowbox/shadowbox.js"></script>
    <script type="text/javascript">
		Shadowbox.init({
			overlayOpacity: 0.65
		});
    </script> 
    
	<script type="text/javascript">
	function getParameterByName(name){
	  name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
	  var regexS = "[\\?&]" + name + "=([^&#]*)";
	  var regex = new RegExp(regexS);
	  var results = regex.exec(window.location.search);
	  if(results == null)
		return "1";
	  else
		return decodeURIComponent(results[1].replace(/\+/g, " "));
	}
	
	$(document).ready(function(){
		$('ul#photo-list').easyPaginate({
			step: 20,
			delay: 0,
			page: getParameterByName('page')
		});
		
	});    
    
    </script>

</head>
<body>

<h1>My Galleries</h1>

<div id="wrapper">

	<div id="main-stage">
		<div id="photos">
		<?php

		$folder = $_GET["folder"];
		
		if($folder==''){
			$countertemp = 0;
			$dirf = 'assets';
			$dir = scandir($dirf,1);
			foreach($dir as $file) {
				if ($countertemp == 0){
				$folder = $file;
				}
				$countertemp++;	
			}	
		}
		if($folder!=''){
			$counter = 0;
			$dirf    = 'assets/'.$folder.'/';
			$dir = scandir($dirf);
			foreach($dir as $file) {
				$fileName = str_replace('-', ' ', $file);
				$file = str_replace(' ', '%20', $file);
	
			   if(($file!='..') && ($file!='.')) {
					echo('<div style="background-size: cover; background-image: url(assets/'.$folder.'/'.$file.')">');
					echo('<a rel="shadowbox[GALLERY]" href="assets/'.$folder.'/'.$file.'">');
					echo('<img src="images/spacer.gif" width="100" height="100" />');
					echo('</a>');
					echo('</div>');
				  $counter++;
			   }
			}
		}
		?>

		</div>
	</div>	
	
	<div id="wrapper-photo-list">
		<ul id="photo-list">
		<?php
		$counter = 0;
		$pager = 1;
		$dirf  = 'assets';
		$dir = scandir($dirf, 1);
		foreach($dir as $file) {
			$fileName = str_replace('-', ' ', $file);
			$fileName = str_replace('.mp4', '', $fileName);

		   if(($file!='..') && ($file!='.')) {
				echo('<li>');
				echo('<a href="?folder='.$file .'&page='.$pager.'">');
				echo($fileName);
				echo('</a></li>');
			    $counter++;
			    if($counter == 20){
				  $pager = $pager + 1; 
				  $counter = 0;
			    }
		   }
		}
		?>
		</ul>
	</div>	
<br clear="all" />
</div>
<br /><br />

</body>
</html>
