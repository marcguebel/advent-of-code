<?php
// challenge see : https://adventofcode.com/2022/day/15
$start = microtime(true);

$input = explode("\r\n", file_get_contents(__DIR__ . '/day_15_input.txt') );
echo '<pre>';
require_once __DIR__.'/day_15_map.php';

// 1st
$map = new map();
foreach ($input as $line) {
	$dataExplode = explode('=', $line);
	$sensorColumn = explode(',', $dataExplode[1])[0];
	$sensorLine = explode(':', $dataExplode[2])[0];
	$beaconColumn = explode(',', $dataExplode[3])[0];
	$beaconLine = explode(':', $dataExplode[4])[0];

	$map->addNode($sensorLine, $sensorColumn, 'S');
	$map->addNode($beaconLine, $beaconColumn, 'B');
}
$map->addSignal();
// $map->displayMap();

echo microtime(true) - $start;
// var_dump($map);
// echo 'Answer 1 : ' . $map->runPartOne() . '<br />';

// 2nd

// echo 'Answer 2 : ' . $map->runPartTwo() . '<br />';