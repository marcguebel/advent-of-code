<?php
// challenge see : https://adventofcode.com/2022/day/6

$input = file_get_contents(__DIR__ . '/day_06_input.txt');

// 1st
$count = 0;
$isMarker = false;
while ($isMarker === false) {
	if (strlen(count_chars(substr($input, $count, 4), 3) ) == 4) {
		$isMarker = true;
	}
	$count++;
}
echo 'Answer 1 : ' . $count . '<br />';

// 2nd
$count = 0;
$isMarker = false;
while ($isMarker === false) {
	if (strlen(count_chars(substr($input, $count, 14), 3) ) == 14) {
		$isMarker = true;
	}
	$count++;
}
echo 'Answer 2 : ' . $count;