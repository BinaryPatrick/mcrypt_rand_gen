<?php function mcrypt_rand_gen($min, $max) {

	# Generate random numbers using MCRYPT initialization vectors. Function requires minimum value and maximum value.

	$range = ($max - $min) + 1;
	$mod = 2;
	while ($range > $mod ) {
		$mod *= 2;
	} $mod = log($mod, 2);
	do {
		$dec = (ord((mcrypt_create_iv(1, MCRYPT_DEV_URANDOM)))) % pow(2, $mod);
		$bin = sprintf("%08d",base_convert($dec, 10, 2));
		$binCollect[] = $bin;
		$mod -= 8;
	} while ($mod > 0);
	krsort($binCollect);
	$bin = implode('', $binCollect);
	$dec = base_convert($bin, 2, 10);
	$dec += $min;
	if ($dec > $max) {
		$dec = genY($min, $max);
	}
	return $dec;
} ?>
