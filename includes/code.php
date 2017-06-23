<?php

function createThumbs($pathToImages, $pathToThumbs, $thumbWidth)
{
	// open the directory
	$dir = opendir( $pathToImages );

	// loop through it, looking for any/all JPG files:
	while (false !== ($fname = readdir( $dir ))) {
		// parse path for the extension
		$info = pathinfo($pathToImages . $fname);
		// continue only if this is a JPEG image
		if ( strtolower($info['extension']) == 'jpg' )
		{
			// echo "Creating thumbnail for {$fname} <br />";

			// load image and get image size
			$img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );
			$width = imagesx( $img );
			$height = imagesy( $img );

			// calculate thumbnail size
			$new_width = $thumbWidth;
			$new_height = floor( $height * ( $thumbWidth / $width ) );

			// create a new temporary image
			$tmp_img = imagecreatetruecolor( $new_width, $new_height );

			// copy and resize old image into new image
			imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

			// save thumbnail into a file

			//echo($pathToThumbs.$fname."<br />");

			imagejpeg( $tmp_img, "{$pathToThumbs}{$fname}" );
		}
	}
	// close the directory
	closedir( $dir );
}

function writeMediaList($dirPath){
	$counter = 0;
	$pager = 1;
	$dirf  = $dirPath;
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
}

function writeMedia($dirPath){

	$folder = $_GET["folder"];

	if($folder==''){
		$countertemp = 0;
		$dirf = $dirPath;
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
		$dirThumbs = $dirf.'thumbs/';

		if (!file_exists($dirThumbs)) {
			mkdir($dirThumbs, 0777, true);
			createThumbs($dirf,$dirThumbs,500);
		}



		foreach($dir as $file) {
			$fileName = str_replace('-', ' ', $file);
			$file = str_replace(' ', '%20', $file);
			$file_path = $dirPath.'/'.$folder.'/'.$file;

			if(@is_array(getimagesize($file_path))){
				$image = true;
			} else {
				$image = false;
			}

			if(($file!='..') && ($file!='.') && ($image == true)) {
				echo('<div style="background-size: cover; background-image: url('.$dirPath.'/'.$folder.'/thumbs/'.$file.')">');
				echo('<a rel="shadowbox[GALLERY]" class="link-gallery" href="'.$dirPath.'/'.$folder.'/'.$file.'">');
				echo('<img src="images/spacer.gif" width="100" height="100" class="spacer" />');
				echo('</a>');
				echo('</div>');
				$counter++;
			}
		}
	}

}

?>