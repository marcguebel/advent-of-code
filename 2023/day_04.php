<?php
// challenge see : https://adventofcode.com/2023/day/4

$input = explode("\n", file_get_contents(__DIR__ . '/day_04_input.txt'));

// 1st
$total = 0;
foreach ($input as $line) {
    $line = explode(' |', explode(': ', $line)[1]);
    $point = null;
    foreach (explode(' ', trim(str_replace('  ', ' ', $line[1]))) as $winingNumber) {
        if (in_array($winingNumber, explode(' ', $line[0]))) {
            if ($point == null) {
                $point = 1;
            } else {
                $point = $point * 2;
            }
        }
    }
    $total += $point;  
}
echo 'Answer 1 : ' . $total . '<br />';

// 2nd
$instance = [];
foreach ($input as $ind => $line) {
    $line = explode(' |', explode(': ', $line)[1]);
    if (!isset($instance[$ind+1])) {
        $instance[$ind+1] = 1;
    } else {
        $instance[$ind+1]++;
    }
    $newInd = $ind+1;
    foreach (explode(' ', trim(str_replace('  ', ' ', $line[1]))) as $winingNumber) {
        if (in_array($winingNumber, explode(' ', $line[0]))) {
            $newInd++;
            if (!isset($instance[$newInd])) {
                $instance[$newInd] = $instance[$ind+1];
            } else {
                $instance[$newInd]+=$instance[$ind+1];
            }
            
        }
    }
}
echo 'Answer 2 : ' . array_sum($instance) . '<br />';