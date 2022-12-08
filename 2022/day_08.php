<?php
// challenge see : https://adventofcode.com/2022/day/8

$input = explode("\r\n", file_get_contents(__DIR__ . '/day_08_input.txt') );

//format input
foreach ($input as $key => $line) {
	$input[$key] = str_split($line);
}

// 1st
$res = 0;
foreach ($input as $x => $lineTrees) {
	if (!in_array($x, [array_key_first($input), array_key_last($input)]) ) {
		foreach ($lineTrees as $y => $tree) {
			if (!in_array($y, [array_key_first($lineTrees), array_key_last($lineTrees)]) && (
					canSeeTrees($tree, $x, $y, $input, 'bottom') || 
					canSeeTrees($tree, $x, $y, $input, 'left') || 
					canSeeTrees($tree, $x, $y, $input, 'top') || 
					canSeeTrees($tree, $x, $y, $input, 'right') ) 
				) {
				$res++;
			}
		}
	}
}

function canSeeTrees(string $tree, int $x, int $y, array $input, string $direction) 
{
	while (true) {
		if ($direction == 'bottom') {
			$y++;
		} elseif ($direction == 'left') {
			$x--;
		} elseif ($direction == 'top') {
			$y--;
		} elseif ($direction == 'right') {
			$x++;
		}
		if($x < 0 || $x > (count($input[0]) -1) || $y < 0 || $y > (count($input) -1) ) {
			return true;
		} elseif ($tree <= $input[$x][$y]) {
			return false;
		}
	}
}
echo 'Answer 1 : ' . $res + (count($input[0]) * 2) + (count($input) * 2 - 4) . '<br />';

// 2nd
$max = 0;
foreach ($input as $x => $lineTrees) {
	foreach ($lineTrees as $y => $tree) {
		$sumBottom = getSum($tree, $x, $y, $input, 'bottom');
		$sumLeft = getSum($tree, $x, $y, $input, 'left');
		$sumTop = getSum($tree, $x, $y, $input, 'top');
		$sumRight = getSum($tree, $x, $y, $input, 'right');
		if ($sumBottom * $sumLeft * $sumTop * $sumRight > $max) {
			$max = $sumBottom * $sumLeft * $sumTop * $sumRight;
		}
	}
}

function getSum(string $tree, int $x, int $y, array $input, string $direction) 
{
	$sum = 1;
	while (true) {
		if ($direction == 'bottom') {
			$y++;
		} elseif ($direction == 'left') {
			$x--;
		} elseif ($direction == 'top') {
			$y--;
		} elseif ($direction == 'right') {
			$x++;
		}
		if ($x <= 0 || $x > (count($input[0]) -2) || $y <= 0 || $y > (count($input) -2) || $tree <= $input[$x][$y] ) {
			return $sum;
		} 
		$sum++;
	}
}
echo 'Answer 2 : ' . $max . '<br />';