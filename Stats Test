<?php error_reporting(E_ALL); set_time_limit(500); $timein = time(); include('mcrypt_rand_gen.php');
function stdDev($array) {
	$sumXi = 0; $sum = array_sum($array); $count = count($array); $average = $sum / $count;
	foreach ($array as $key => $value) {
		$sumXi += pow(($value - $average), 2);
	}
	$variance = $sumXi * (1 / $count);
	$stdDev = sqrt($variance);
	return $stdDev;
} // End Function
function average($array) {
	$average = array_sum($array) / count($array);
	return $average;
} // End Function
function mode($array) {
	$values = array_count_values($array); 
	return array_search(max($values), $values);
} // End Function

$tall = 500; $long = 1015; $wide = 12; // Array test specifications
for ($x = 0; $x < $tall; $x++) { // Build Triple Test Array
	unset($testArr);
	for ($i = 0; $i < $long; $i++) {
		$tmpVal = mcrypt_rand_gen(1,$wide);
		if (isset($testArr[$tmpVal])) {
			$testArr[$tmpVal]++;
		} else {
			$testArr[$tmpVal] = 1;
		}
	}
	ksort($testArr);
	$mainArr[] = $testArr;
} 
// compile Stats from each round
foreach ($mainArr as $key => $testArr) {
	$stdDev[] = stdDev($testArr);
	$average = array_sum($testArr) / count($testArr);
	$mode[] = max($testArr); $modeKey[] = array_keys($testArr, $mode[$key])[0];
	$min[] = min($testArr); $minKey[] = array_keys($testArr, $min[$key])[0];
}
// derive Stats from each round
$avstdDev = average($stdDev); 
$avmode = mode($modeKey);
$avmodeval = average($mode);
$avmin = mode($minKey);
$avminval = average($min);
?>
<html>
	<head>
		<style type="text/css">
			html, body { font-family: consolas; font-size: 16px; margin: 0; padding: 0; }
			pre { line-height: 8px; font-size: 1em; }
			div { margin: 0; padding: 5px; }
			td { width: 50%; margin: 0; padding: 3px; }
			td:nth-child(odd) { text-align: right; }
			#starter { background: #000; color: #00FF00; }
			.canvas { display: <?php if ($tall > 10) {echo 'none'; } else { echo 'block'; } ?>; }
		</style>
	</head>
	<body>
		<div>
			runtime: <?php echo time() - $timein; ?> seconds
		</div>
		<div id="starter">
			<div style="float: left; width: 10%; font-size: 80px;">
				&mu;&Sigma;
			</div>
			<div style="float: left; width: 50%;">
				N: <?php echo count($mainArr); ?><br>
				&mu;&#963;: <?php echo $avstdDev; ?><br>
				&nbsp;&mu;: <?php echo $average; ?><br>
				Mo: <?php echo sprintf("%03d",$avmode); ?> @ <?php echo $avmodeval; ?> or +<?php echo sprintf("%.2f%%", (($avmodeval - $average) / $avstdDev)); ?><br>
				Lt: <?php echo sprintf("%03d",$avmin); ?> @ <?php echo $avminval; ?> or <?php echo sprintf("%.2f%%", (($avminval - $average) / $avstdDev)); ?>
			</div>
			<div style="clear:both; height: 1px;">&nbsp;</div>
		</div>
		<hr />
		<!-- individual results loop -->
		<?php foreach ($mainArr as $id => $testArr) { ?>
			<?php $stdDev = stdDev($testArr); $count = count($testArr); $sum = array_sum($testArr) ?>
			<?php $average = array_sum($testArr) / $count; $max = max($testArr); ?>
			<?php $maxKey = array_keys($testArr, $max)[0]; $min = min($testArr); ?>
			<?php $minKey = array_keys($testArr, $min)[0]; $range = $max - $min; ?>
			<div style="width: 18%; float: left; padding: 5px; border: 2px solid #000000; margin: 5px; border-radius: 5px;">
				<table style="margin: 0; padding: 0;">
					<tr><td>N:</td><td><?php echo $long ?></td></tr>
					<tr><td>&#963;:</td><td><?php echo $stdDev; ?></td></tr>
					<tr><td>&mu;:</td><td><?php echo $average; ?></td>
					<tr><td>mode:</td><td><?php echo sprintf("%03d",$maxKey) ?> @ <?php echo $max; ?></td></tr>
					<tr><td>least:</td><td><?php echo sprintf("%03d",$minKey); ?> @ <?php echo $min; ?></td></tr>
					<tr><td>range:</td><td><?php echo $range; ?></td></tr>
				</table>
				<?php foreach ($testArr as $key => $value) { ?>
					<pre><?php echo sprintf("%4d",$key); ?>: <?php echo sprintf("%5d",round($value, 0)); ?> or <?php echo sprintf("%02.2f%%",100*($value / $sum)) ?></pre>
				<?php } ?>
			</div>
		<?php } ?>
	</body>
</html>
