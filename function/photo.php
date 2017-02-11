<?php 
	header ("Content-type: image/jpeg");
	if(isset($_GET['url'])){
		$pic = $_GET['url'];

		$image = imagecreatefromjpeg('../'.$pic);
		$x = imagesx($image);
		$y = imagesy($image);
		$s = imagecreatetruecolor(273, 182);
		imagecopyresampled($s, $image, 0, 0, 0, 0, 273, 182,$x, $y);
		
		imagejpeg($s);
	}