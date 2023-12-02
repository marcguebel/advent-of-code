<?php
echo "<pre>";
// challenge see : https://adventofcode.com/2023/day/2

$input = explode("\r\n", file_get_contents(__DIR__ . '/day_02_input.txt') );

// 1st
$max = ["blue" => 14, "red" => 12, "green" => 13];
$gameValid = 0;
foreach ($input as $line) {
    list($game, $round)=explode(': ', $line);
    $isValid = true;
    foreach (explode('; ', $round) as $oneRound) {
        foreach (explode(', ', $oneRound) as $oneTirage) {
            list($number, $color) = explode(' ', $oneTirage);
            if((int)$number > $max[$color]){
                $isValid = false;
                break 2;
            }
        }
    }
    if($isValid) {
        $gameValid += (int)explode(' ', $game)[1];
    }
}
echo 'Answer 1 : ' . $gameValid . '<br />';

// 2nd
$total = 0;
foreach ($input as $line) {
    $max = ["blue" => 0, "red" => 0, "green" => 0];
    $round = explode(': ', $line)[1];
    foreach (explode('; ', $round) as $oneRound) {
        foreach (explode(', ', $oneRound) as $oneTirage) {
            list($number, $color) = explode(' ', $oneTirage);
            if((int)$number > $max[$color]){
                $max[$color] = (int)$number;
            }
        }
    }
    $total += $max['blue'] * $max['red'] * $max['green'];
}
echo 'Answer 2 : ' . $total . '<br />';