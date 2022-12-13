<?php
// challenge see : https://adventofcode.com/2022/day/12

$input = explode("\r\n", file_get_contents(__DIR__ . '/day_12_input.txt') );

//use object to implement bfs algorithm 
require __DIR__."/day_12_node.php";
require __DIR__."/day_12_graph.php";

$map = [];
foreach ($input as $line){
	$map[] = str_split($line);
}

// 1st
$graph = new graph();
$graph->displayMap = true;
$graph->map = $map;
$graph->startX = 20;
$graph->startY = 0;
$path = $graph->run();
echo 'Answer 1 : ' . $path . '<br />';

// 2nd
//answer can only be in first collumn cause of b placement
$graph = new graph();
// $graph->displayMap = true;
$graph->map = $map;
$shortPath = $path;
for ($i=1; $i < 41; $i++) { 
	$graph->startX = $i;
	$graph->startY = 0;
	$path = $graph->run();
	if ($path < $shortPath) {
		$shortPath = $path;
	}
}
echo 'Answer 2 : ' . $shortPath . '<br />';