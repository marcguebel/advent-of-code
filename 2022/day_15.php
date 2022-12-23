<?php
// challenge see : https://adventofcode.com/2022/day/15
$input = explode("\r\n", file_get_contents(__DIR__ . '/day_15_input.txt') );

// 1st
$targetLine = 10;
$ranges = [];
$beacons = [];
foreach ($input as $line) {
	$dataExplode = explode('=', $line);
	$sensorColumn = explode(',', $dataExplode[1])[0];
	$sensorLine = explode(':', $dataExplode[2])[0];
	$beaconColumn = explode(',', $dataExplode[3])[0];
	$beaconLine = explode(':', $dataExplode[4])[0];

	$range = abs($sensorColumn - $beaconColumn) + abs($sensorLine - $beaconLine);

	//if reach the target line
	if ($sensorLine < $targetLine && ($sensorLine + $range >= $targetLine)) {
		$count = $range - ($targetLine - $sensorLine);
		$ranges[] = ['start' => $sensorColumn - $count, 'end' => $sensorColumn + $count];
	} elseif ($sensorLine > $targetLine && ($sensorLine - $range <= $targetLine)) {
		$count = $targetLine - ($sensorLine - $range);
		$ranges[] = ['start' => $sensorColumn - $count, 'end' => $sensorColumn + $count];
	}
	
	//save beacons column on target line
	if($beaconLine == $targetLine && !in_array($beaconColumn, $beacons)){
		$beacons[] = $beaconColumn;
	}
}

sort($ranges);

//merge range 
$rangesMerge = [];
$current = null;
foreach($ranges as $index => &$range) {
	if ($current == null) {
		$current = $range;
	} elseif($range['start'] <= $current['end']) {
		if($range['end'] > $current['end']){
			$current['end'] = $range['end'];
		} 
		unset($ranges[$index]);
	} else {
		$rangesMerge[] = $current;
		$current = null;
	}
}
$rangesMerge[] = $current;

//outpout result with beacon positon deduction
foreach($rangesMerge as $range) {
	$countBeacon = 0;
	foreach ($beacons as $beacon) {
		if ($range['start'] <= $beacon && $range['end'] >= $beacon) {
			$countBeacon++;
		}
	}
	echo 'Answer 1 : '.(($range['end'] - $range['start'] +1 ) - $countBeacon) . '<br />';
}

// 2nd
for ($i=0; $i < 4000000; $i++) { 
	$targetLine = $i;
	$ranges = [];
	$beacons = [];
	foreach ($input as $line) {
		$dataExplode = explode('=', $line);
		$sensorColumn = explode(',', $dataExplode[1])[0];
		$sensorLine = explode(':', $dataExplode[2])[0];
		$beaconColumn = explode(',', $dataExplode[3])[0];
		$beaconLine = explode(':', $dataExplode[4])[0];

		$range = abs($sensorColumn - $beaconColumn) + abs($sensorLine - $beaconLine);

		//if reach the target line
		if ($sensorLine <= $targetLine && ($sensorLine + $range > $targetLine)) {
			$count = $range - ($targetLine - $sensorLine);
			$ranges[] = ['start' => $sensorColumn - $count, 'end' => $sensorColumn + $count];
		} elseif ($sensorLine >= $targetLine && ($sensorLine - $range < $targetLine)) {
			$count = $targetLine - ($sensorLine - $range);
			$ranges[] = ['start' => $sensorColumn - $count, 'end' => $sensorColumn + $count];
		}
		
		//save beacons column on target line
		if($beaconLine == $targetLine && !in_array($beaconColumn, $beacons)){
			$beacons[] = $beaconColumn;
		}
	}

	sort($ranges);

	//merge range 
	$rangesMerge = [];
	$current = $ranges[0];
	foreach($ranges as $index => &$range) {
		if (!isset($current['end'])) {
			$current['end'] = $range['end'];
		} elseif($range['start'] <= $current['end']+1) {
			if($range['end'] > $current['end']){
				$current['end'] = $range['end'];
			} 
			unset($ranges[$index]);
		} else {
			$rangesMerge[] = $current;
			$current['start'] = $range['start'];
			$current['end'] = null;
		}
	}
	$rangesMerge[] = $current;

	if(count($rangesMerge)>1){
		echo 'Answer 2 : ' . (($rangesMerge[0]['end']+1) * 4000000) + $i . '<br />';
		exit;
	}	
}