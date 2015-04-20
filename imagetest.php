<?php if (!isset($_GET['num'])) { ?>
	<form method="get">
		<input type="number" name="num" placeholder="Picture Size" required>
		<button type="submit">Submit</button>
	</form>
<?php } else {
	include('function.php');
	ini_set('memory_limit', '-1');
	header('Content-Type: image/png');
	$length = $_GET['num'];
	$im = imagecreatetruecolor($length, $length);
	$blue = imagecolorallocate($im, 0, 255, 255);
	for ($y = 0; $y < $length; $y++) {
		for ($x = 0; $x < $length; $x++) {
			if (mcrypt_rand_gen(0,1) == 0) {
				imagesetpixel($im, $x, $y, $blue);
			}
		}
	}
	imagepng($im);
	imagedestroy($im);
} ?>
