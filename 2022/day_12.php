<?php
// challenge see : https://adventofcode.com/2022/day/12

$input = explode("\r\n", file_get_contents(__DIR__ . '/day_12_input.txt') );

require __DIR__."/day_12_node.php";
require __DIR__."/day_12_graph.php";
echo '<pre>';



$map = [];
foreach ($input as $line){
	$map[] = str_split($line);
}
$graph = new graph();
$graph->map=$map;
$graph->setObjectif('E', 2, 5);
$graph->startX=0;
$graph->startY=0;
// $graph->setObjectif('E', 20, 139);
// $graph->startX=0;
// $graph->startY=20;
$graph->run();

print_r($graph->count);



// 1st

// echo 'Answer 1 : ' . ($res[count($res)-1]) *  ($res[count($res) -2]). '<br />';

// 2nd

// echo 'Answer 2 : ' . ($res[count($res)-1]) * ($res[count($res) -2]). '<br />';