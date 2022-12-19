<?php
// challenge see : https://adventofcode.com/2022/day/14

$input = explode("\r\n", file_get_contents(__DIR__ . '/day_14_input.txt') );

require_once __DIR__.'/day_14_map.php';

// 1st
$map = new Map();

//add rock to map
foreach ($input as $line) {
	$instruction = explode(' -> ', $line);
	for ($i=1; $i < count($instruction); $i++) { 
		list($startColumn, $startLine) = explode(',', $instruction[$i-1]);
		list($endColumn, $endLine) = explode(',', $instruction[$i]);
		for ($line=min($startLine, $endLine); $line <= max($endLine, $startLine); $line++) { 
			for ($column=min($startColumn, $endColumn); $column <= max($endColumn, $startColumn); $column++) { 
				$map->addNode($line, $column, 'rock');
			}
		}
	}
}
echo 'Answer 1 : ' . $map->runPartOne() . '<br />';
// echo $map->displayMap();

// 2nd
$map = new Map();

//add rock to map
$maxLine = 0;
foreach ($input as $line) {
	$instruction = explode(' -> ', $line);
	for ($i=1; $i < count($instruction); $i++) { 
		list($startColumn, $startLine) = explode(',', $instruction[$i-1]);
		list($endColumn, $endLine) = explode(',', $instruction[$i]);
		for ($line=min($startLine, $endLine); $line <= max($endLine, $startLine); $line++) { 
			for ($column=min($startColumn, $endColumn); $column <= max($endColumn, $startColumn); $column++) { 
				$map->addNode($line, $column, 'rock');
			}
		}

		//save max line for setting floor latter
		if (max($endLine, $startLine) > $maxLine) {
			$maxLine = max($endLine, $startLine);
		}
	}	
}

//set the floor level
$map->floor = $maxLine + 2;
echo 'Answer 2 : ' . $map->runPartTwo() . '<br />';
// echo $map->displayMap();