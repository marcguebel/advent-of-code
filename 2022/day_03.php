<?php
// challenge see : https://adventofcode.com/2022/day/3

$input = explode("\r\n", file_get_contents(__DIR__ . '/day_03_input.txt') );

// 1st
$score = 0;
foreach ($input as $bag) {

	//cut the two half 
	$firstHalf = str_split(substr($bag, 0, strlen($bag)/2) );
	$secondHalf = str_split(substr($bag, strlen($bag)/2) );

	//get the doubons
	$doublons = array_unique(array_intersect($firstHalf, $secondHalf) );

	//increment score
	foreach ($doublons as $doublon) {
		$delta = (ctype_upper($doublon) ? ord('A') - 27 : ord('a') - 1);
		$score += ord($doublon) - $delta;
	}
}
echo 'Answer 1 : ' . $score . '<br />';

// 2nd
$score = 0;
for ($i=0; $i < count($input); $i++) { 

	//get the 3 part
	$firstElf = str_split($input[ $i ]);
	$secondElf = str_split($input[ $i+1 ]);
	$thirdElf = str_split($input[ $i+2 ]);

	//get the doublons
	$doublons = array_unique(array_intersect($firstElf, $secondElf, $thirdElf) );

	//increment score
	foreach ($doublons as $doublon) {
		$delta = (ctype_upper($doublon) ? ord('A') - 27 : ord('a') - 1);
		$score += ord($doublon) - $delta;
	}

	//increment $i
	$i += 2;
}

echo 'Answer 2 : ' . $score;