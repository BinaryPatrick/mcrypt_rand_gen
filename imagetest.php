<?php include('mcrypt_rand_gen.php');
	ini_set('memory_limit', '-1');
	header('Content-Type: image/png');
	$lenght = 854;
	$im = imagecreatetruecolor($lenght, $lenght);
	$blue = imagecolorallocate($im, 0, 255, 255);
	for ($y = 0; $y < $lenght; $y++) {
	    for ($x = 0; $x < $lenght; $x++) {
	        if (mcrypt_rand_gen(0,1) == 0) {
	            imagesetpixel($im, $x, $y, $blue);
	        }
	    }
	}       
	imagepng($im);
	imagedestroy($im);
?>
