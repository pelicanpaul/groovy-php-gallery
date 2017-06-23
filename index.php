<?php include 'includes/code.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Way Cool Photo Gallery</title>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.easypaginate.js"></script>

	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="js/shadowbox/shadowbox.css">
    <link rel="stylesheet" type="text/css" href="css/gallery.css">
    
    <script type="text/javascript" src="js/shadowbox/shadowbox.js"></script>
    <script type="text/javascript" src="js/gallery.js"></script>


</head>
<body>

<h1>Photo Gallery</h1>

<div id="wrapper">
	<div class="container">

		<div class="row">
			<div class="col-md-9 col-sm-12 col-xs-12">

				<div id="photos">
					<?php
					writeMedia( 'assets' );
					?>
				</div>

			</div>

			<div class="col-md-3 col-sm-12 col-xs-12">
				<div id="wrapper-photo-list">
					<ul id="photo-list">
						<?php
						writeMediaList( 'assets' );
						?>
					</ul>
				</div>
			</div>
		</div>

	</div>
</div>

</body>
</html>
