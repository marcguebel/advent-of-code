<?php
// challenge see : https://adventofcode.com/2022/day/5

$input = explode("\r\n", file_get_contents(__DIR__ . '/day_05_input.txt') );

// format input 
$initialStacks = [];
$linesOfStacks = array_reverse(array_slice($input, 0, 8) );
foreach ($linesOfStacks as $line) {
	$currentStack = 1;
	$offset = 1;
	while ($offset < strlen($line) ) {
		if (substr($line, $offset, 1) != " ") {
			$initialStacks[$currentStack][] = substr($line, $offset, 1);
		}
		$offset += 4;
		$currentStack ++;
	}
}
$moves=array_slice($input, 10);

// 1st
//use a copy for part 2
$stacks = $initialStacks;
foreach ($moves as $move) {

	//get the data 
	preg_match_all('!\d+!', $move, $intInMove);
	list($quantity, $from, $to) = $intInMove[0];

	//move
	for ($i = 0; $i < $quantity; $i++) { 
		$stacks[$to][] = end($stacks[$from]);
		array_pop($stacks[$from]);
	}
}

//outpout result
$outpout = "";
foreach ($stacks as $stack) {
	$outpout .= end($stack);
}
echo 'Answer 1 : ' . $outpout . '<br />';

// 2nd
//reset stacks
$stacks = $initialStacks;
foreach ($moves as $move) {

	//get the data 
	preg_match_all('!\d+!', $move, $intInMove);
	list($quantity, $from, $to) = $intInMove[0];

	//move
	$toMove = array_slice($stacks[$from], -$quantity, $quantity);	//get the part to move
	$stacks[$to] = array_merge($stacks[$to], $toMove);				//add destination
	$stacks[$from] = array_slice($stacks[$from], 0, -$quantity);	//remove from source
}

//outpout result
$outpout = "";
foreach ($stacks as $stack) {
	$outpout .= end($stack);
}
echo 'Answer 2 : ' . $outpout;