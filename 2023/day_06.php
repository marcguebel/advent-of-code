<?php
// challenge see : https://adventofcode.com/2023/day/6

$input = explode("\n", file_get_contents(__DIR__ . '/day_06_input.txt'));

//format
preg_match_all('!\d+!', $input[0], $times);
preg_match_all('!\d+!', $input[1], $distances);

// 1st
$score = 1;
foreach ($times[0] as $key => $time) {
    $countWin = 0;
    for ($speed=0; $speed <= (int)$time; $speed++) { 
        if ($speed * ((int)$time - $speed) > (int)$distances[0][$key]) {
            $countWin++;
        }
    }
    $score = $score * $countWin;
}
echo 'Answer 1 : ' . $score . '<br />';


// 2nd
$score = 1;
$time = implode("", $times[0]);
$distance = implode("", $distances[0]);
$countWin = 0;
for ($speed=0; $speed <= (int)$time; $speed++) { 
    if ($speed * ((int)$time - $speed) > (int)$distances[0][$key]) {
        $countWin++;
    }
}
$score = $score * $countWin;
echo 'Answer 2 : ' . $score . '<br />';