<?php
// challenge see : https://adventofcode.com/2023/day/1

$input = explode("\r\n", file_get_contents(__DIR__ . '/day_01_input.txt') );

// 1st
$sum = 0;
foreach ($input as $line) {
    $int = preg_replace("/[^0-9]/", '', $line);
    $sum += (int)(substr($int, 0, 1) . substr($int, -1, 1));
}
echo 'Answer 1 : ' . $sum . '<br />';

// 2nd
$sum = 0;
foreach ($input as $line) {
    $numberAsString = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine"];
    $posFirst = false;
    $posLast = false;
    $first = '';
    $last = '';
    $pos = 0;
    foreach ($numberAsString as $number) {
        while (($pos = strpos($line, $number, $pos)) !== false){
            $pos = $pos + strlen($number);
            if ($pos !== false && ($posFirst === false || $pos < $posFirst)) {
                $posFirst = $pos;
                $first = str_replace($numberAsString, [1, 2, 3, 4, 5, 6, 7, 8, 9, 1, 2, 3, 4, 5, 6, 7, 8, 9], $number);
            }
            if ($pos !== false && ($posLast === false || $pos > $posLast)) {
                $posLast = $pos;
                $last = str_replace($numberAsString, [1, 2, 3, 4, 5, 6, 7, 8, 9, 1, 2, 3, 4, 5, 6, 7, 8, 9], $number);
            }
        }
    }
    $sum += ((int)$first . $last);
}
echo 'Answer 2 : ' . $sum . '<br />';