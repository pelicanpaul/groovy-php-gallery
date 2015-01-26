<?php include 'includes/code.php';?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>My Way Cool Photo Gallery</title>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.easypaginate.js"></script>
    
	<link rel="stylesheet" type="text/css" href="js/shadowbox/shadowbox.css">
    <link rel="stylesheet" type="text/css" href="css/gallery.css">
    
    <script type="text/javascript" src="js/shadowbox/shadowbox.js"></script>
    <script type="text/javascript" src="js/gallery.js"></script>


</head>
<body>

<h1>My Way Cool Photo Gallery</h1>

<div id="wrapper">

	<div id="main-stage">
		<div id="photos">
		<?php
            writeMedia('assets');
		?>

		</div>
	</div>	
	
	<div id="wrapper-photo-list">
		<ul id="photo-list">
		<?php
            writeMediaList('assets');
		?>
		</ul>
	</div>	
    <div class="clear"></div>
</div>


</body>
</html>
