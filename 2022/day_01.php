<?php
// challenge see : https://adventofcode.com/2022/day/1

$input = explode("\r\n", file_get_contents(__DIR__ . '/day_01_input.txt') );

// 1st
$max = 0;
$current_sum = 0;
foreach ($input as $line) {
	if ($line != '') {
		$current_sum += (int) $line;
	} else {
		if ($current_sum > $max)
			$max = $current_sum;
		$current_sum = 0;
	}
}
echo 'Answer 1 : ' . $max . '<br />';

// 2nd
$sums = [0];
foreach ($input as $line) {
	if ($line == '') {
		$sums[] = 0;
	} else {
		$sums[sizeof($sums) -1] += $line;
	}
}
sort($sums);
echo 'Answer 2 : ' . ($sums[ sizeof($sums) -3 ] + $sums[ sizeof($sums) -2 ] + max($sums) );