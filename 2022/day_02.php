<?php
// challenge see : https://adventofcode.com/2022/day/2

$input = explode("\r\n", file_get_contents(__DIR__ . '/day_02_input.txt') );

// 1st
$score = 0;
$scores = [
	"A X" => 1 + 3,
	"A Y" => 2 + 6,
	"A Z" => 3 + 0,
	"B X" => 1 + 0,
	"B Y" => 2 + 3,
	"B Z" => 3 + 6,
	"C X" => 1 + 6,
	"C Y" => 2 + 0,
	"C Z" => 3 + 3
];
foreach ($input as $play) {
	$score += $scores[$play];
}
echo 'Answer 1 : ' . $score . '<br />';

// 2nd
$score = 0;
$scores = [
	"A X" => 3 + 0,
	"A Y" => 1 + 3,
	"A Z" => 2 + 6,
	"B X" => 1 + 0,
	"B Y" => 2 + 3,
	"B Z" => 3 + 6,
	"C X" => 2 + 0,
	"C Y" => 3 + 3,
	"C Z" => 1 + 6
];
foreach ($input as $play) {
	$score += $scores[$play];
}
echo 'Answer 2 : ' . $score;