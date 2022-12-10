<?php
// challenge see : https://adventofcode.com/2022/day/10

$input = explode("\r\n", file_get_contents(__DIR__ . '/day_10_input.txt') );
$cycle = 0;
$signals = [];
$x = 1;
foreach ($input as $line) {
	incrementSignal($signals, $cycle, $x);
	if ($line != 'noop') {
		incrementSignal($signals, $cycle, $x);
		$x += explode(' ', $line)[1];
	}
}

function incrementSignal(&$signals, &$cycle, $x)
{
	$cycle++;
	if (in_array($cycle, [20, 60, 100, 140, 180, 220])) {
		$signals[] = $cycle * $x;
	}
}

// 1st
echo 'Answer 1 : ' . array_sum($signals) . '<br />';

// 2nd
echo 'Answer 2 : <pre>';
$cycle = 0;
$x = 1;
foreach ($input as $line) {
	drawSignal($cycle, $x);
	if ($line != 'noop') {
		drawSignal($cycle, $x); 
		$x += explode(' ', $line)[1];
	}
}

function drawSignal(&$cycle, $x)
{
	//if new line
	if ($cycle % 40 == 0 && $cycle!=0) {
		echo '<br />';
	}

	//calcul sprite
	$sprite = $cycle;
	while ($sprite >= 40) {
		$sprite -= 40;
	} 

	//print pixel
	$pixel = '.';
	if (in_array($sprite, [$x-1, $x, $x+1]) ) {
		$pixel = '#';
	}
	echo $pixel;
	$cycle++;
}
echo '</pre>';