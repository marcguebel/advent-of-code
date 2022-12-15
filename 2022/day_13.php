<?php
// challenge see : https://adventofcode.com/2022/day/13

$input = explode("\r\n", file_get_contents(__DIR__ . '/day_13_input.txt') );
echo '<pre>';
// 1st
$index = 0;
$countRightOrder = 0;
for ($i=0; $i < count($input); $i++) { 
	$index++;

	$left = json_decode($input[$i]);
	$i++;
	$right = json_decode($input[$i]);
	$i++;


	$isEnd = false;
	$ind = 0;

	$copyLeft = $left;
	$copyRight = $right;
	$tempLeft = $left;
	$tempRight = $right;
	while (!$isEnd) {
		if (!isset($copyLeft[$ind]) && isset($copyRight[$ind])) {
			$countRightOrder += $index;
			$isEnd = true;
		} elseif (isset($copyLeft[$ind]) && !isset($copyRight[$ind])) {
			$isEnd = true;
		} elseif (!is_array($copyLeft[$ind]) && !is_array($copyRight[$ind]) ) {
			echo 'compare '.$copyLeft[$ind].' vs '.$copyRight[$ind].'<br />';
			if ($copyLeft[$ind] > $copyRight[$ind]) {
				$isEnd = true;
			} elseif ($copyLeft[$ind] < $copyRight[$ind]) {
				$countRightOrder += $index;
				$isEnd = true;
			} else {
				$ind++;
				$copyLeft = $tempLeft;
				$copyRight = $tempRight;
			}
		} elseif(is_array($copyLeft[$ind]) && is_array($copyRight[$ind]) ) {
			echo 'compare ['.implode(',', $copyLeft[$ind]).'] vs ['.implode(',', $copyRight[$ind]).']<br />';
			if($index==8){
				print_r($copyLeft[$ind]);
			}
			$tempLeft = $copyLeft;
			$tempRight = $copyRight;
			$copyLeft = $copyLeft[$ind];
			$copyRight = $copyRight[$ind];
			$ind = 0;
		} elseif(is_array($copyLeft[$ind]) && !is_array($copyRight[$ind]) ) {
			$tempLeft = $copyLeft[$ind];
			$tempRight = $copyRight[$ind];
			$copyRight = [$copyRight[$ind]];
			$copyLeft = $copyLeft[$ind];
			$ind = 0;
		} elseif(!is_array($copyLeft[$ind]) && is_array($copyRight[$ind]) ) {
			$tempLeft = $copyLeft[$ind];
			$tempRight = $copyRight[$ind];
			$copyLeft = [$copyLeft[$ind]];
			$copyRight = $copyRight[$ind];
			$ind = 0;
		} 
	}
}
// echo 'Answer 1 : ' . $path . '<br />';

// 2nd
// echo 'Answer 2 : ' . $shortPath . '<br />';