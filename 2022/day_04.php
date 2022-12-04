<?php
// challenge see : https://adventofcode.com/2022/day/4

$input = explode("\r\n", file_get_contents(__DIR__ . '/day_04_input.txt') );

// 1st
$score = 0;
foreach ($input as $sections) {

	//split section
	list($startFirstSection, $endFirstSection) = explode('-', explode(',', $sections)[0]);
	list($startSecondSection, $endSecondSection) = explode('-', explode(',', $sections)[1]);

	//check condition
	if ( 
		($startFirstSection <= $startSecondSection && $endFirstSection >= $endSecondSection) || 
		($startFirstSection >= $startSecondSection && $endFirstSection <= $endSecondSection) 
	) {
		$score++;
	} 
}
echo 'Answer 1 : ' . $score . '<br />';

// 2nd
$score = 0;
foreach ($input as $sections) {

	//split section
	list($startFirstSection, $endFirstSection) = explode('-', explode(',', $sections)[0]);
	list($startSecondSection, $endSecondSection) = explode('-', explode(',', $sections)[1]);

	//check condition
	if ($startFirstSection <= $endSecondSection && $endFirstSection >= $startSecondSection) {
		$score++;
	}
}
echo 'Answer 2 : ' . $score;