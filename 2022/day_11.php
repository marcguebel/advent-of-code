<?php
// challenge see : https://adventofcode.com/2022/day/11

$input = explode("\r\n", file_get_contents(__DIR__ . '/day_11_input.txt') );

//format input
$monkeys = [];
$monkey = ['countInspect' => 0];
foreach ($input as $line) {
	if (str_contains($line, 'Starting items') ) {
		$monkey['items'] = [];
		$items = explode(',', explode(':', $line)[1]);
		foreach($items as $item) {
			$monkey['items'][] = intval(trim($item));
		}
	} elseif (str_contains($line, 'Operation') ) {
		$monkey['operation'] = explode('=', $line)[1];
	} elseif (str_contains($line, 'Test') ) {
		$monkey['test'] = (int) filter_var($line, FILTER_SANITIZE_NUMBER_INT);
	} elseif (str_contains($line, 'true') ) {
		$monkey['true'] = (int) filter_var($line, FILTER_SANITIZE_NUMBER_INT);
	} elseif (str_contains($line, 'false') ) {
		$monkey['false'] = (int) filter_var($line, FILTER_SANITIZE_NUMBER_INT);
		$monkeys[] = $monkey;
		$monkey = ['countInspect' => 0];
	} 
}

// 1st
$cpMonkeys = $monkeys;	//use a copy for part 2
for ($turn=0; $turn < 20; $turn++) { 
	foreach ($cpMonkeys as $ind => &$monkey) {
		foreach ($monkey['items'] as $item) {
			$int = (int) filter_var($monkey['operation'], FILTER_SANITIZE_NUMBER_INT); 
			if ($int == 0) {
				$item = (int) floor(($item * $item) / 3);
			} elseif (str_contains($monkey['operation'], '+') ) {
				$item = (int) floor(($item + $int) / 3);
			} elseif (str_contains($monkey['operation'], '*') ) {
				$item = (int) floor(($item * $int) / 3);
			}

			$monkeyToAdd = ($item % $monkey['test'] == 0 ? $monkey['true'] : $monkey['false'] );
			$cpMonkeys[$monkeyToAdd]['items'][] = $item;
		}
		$monkey['countInspect'] += count($monkey['items']);
		$monkey['items'] = [];
	}
}
$res = array_column($cpMonkeys, 'countInspect');
sort($res);
echo 'Answer 1 : ' . ($res[count($res)-1]) *  ($res[count($res) -2]). '<br />';

// 2nd
// use https://www.calculatorsoup.com/calculators/math/lcm.php to determinate the least commun multiple for my input (11,19,5,3,13,17,7,2)
CONST LCM = 9699690; 
for ($turn=0; $turn < 10000; $turn++) { 
	foreach ($monkeys as $ind => &$monkey) {
		foreach ($monkey['items'] as $item) {
			$int = (int) filter_var($monkey['operation'], FILTER_SANITIZE_NUMBER_INT); 
			if ($int == 0) {
				$item = (int) floor($item * $item) % LCM;
			} elseif (str_contains($monkey['operation'], '+') ) {
				$item = (int) floor($item + $int) % LCM;
			} elseif (str_contains($monkey['operation'], '*') ) {
				$item = (int) floor($item * $int) % LCM;
			}
			$monkeyToAdd = ($item % $monkey['test'] == 0 ? $monkey['true'] : $monkey['false'] );
			$monkeys[$monkeyToAdd]['items'][] = $item;
		}
		$monkey['countInspect'] += count($monkey['items']);
		$monkey['items'] = [];
	}
}
$res = array_column($monkeys, 'countInspect');
sort($res);
echo 'Answer 2 : ' . ($res[count($res)-1]) * ($res[count($res) -2]). '<br />';