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
	$indLeft = 0;
	$indRight = 0;

	while (!$isEnd) {
		if (!isset($left[$indLeft]) && isset($right[$indRight])) {
			$countRightOrder += $index;
			$isEnd = true;
		} elseif (isset($left[$indLeft]) && !isset($right[$indRight])) {
			$isEnd = true;
		} elseif (!is_array($left[$indLeft]) && !is_array($right[$indRight]) ) {
			if ($left[$indLeft] > $right[$indRight]) {
				$isEnd = true;
			} elseif ($left[$indLeft] < $right[$indRight]) {
				$countRightOrder += $index;
				$isEnd = true;
			} else {
				$indRight++;
				$indLeft++;
			}
		} elseif(is_array($left[$indLeft]) && is_array($right[$indRight]) ) {
			if(count($left[$indLeft])==0 && count($right[$indRight])==0){
				$indLeft++;
				$indRight++;
			} else{
				$left = $left[$indLeft];
				$right = $right[$indRight];
				$indLeft = 0;
				$indRight = 0;
			}
		} elseif(is_array($left[$indLeft]) && !is_array($right[$indRight]) ) {
			$right[$indRight] = [$right[$indRight]];
		} elseif(!is_array($left[$indLeft]) && is_array($right[$indRight]) ) {
			$left[$indLeft] = [$left[$indLeft]];
		} 
	}
}
echo 'Answer 1 : ' . $countRightOrder . '<br />';

function display(array $array) 
{
	$string = '[';
	if (count($array)>0) {
		foreach ($array as $ind => $element) {
			if(is_array($element)) {
				$string .= display($element);
			} else {
				$string .= $element;
			}
			if ($ind!=count($array)-1) {
				$string .= ',';
			}
		}
	}
	return $string . ']';
}

// 2nd
$final = ['[[2]]', '[[6]]'];
for ($i=0; $i < count($input); $i++) { 
	if ($input[$i] != '') {
		$final[] = display(json_decode($input[$i]));
	}
}

rsort($final, SORT_STRING         );
print_r($final);
// echo 'Answer 2 : ' .  . '<br />';
// 117 196