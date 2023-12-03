<?php
echo "<pre>";
// challenge see : https://adventofcode.com/2023/day/3

$input = explode("\r\n", file_get_contents(__DIR__ . '/day_03_input.txt') );

//format 
$matrice=[];
foreach ($input as $x => $line) {
    $matrice[] = str_split($line);
}

// 1st
$sum = 0;
foreach ($matrice as $x => $line) {
    $number = null;
    $numberStart = null;
    $numberEnd = null;
    foreach ($line as $y => $carac){
        if(ctype_digit($carac)) {
            if($number == null){
                $number = $carac;
                $numberStart = $y;
                $numberEnd = $y;
            } else {
                $numberEnd = $y;
                $number.= $carac;
            }
        } elseif($number) {
            if(isValid($x, $numberStart, $numberEnd, $matrice)) {
                $sum += (int)$number;
            } 
            $number = null;
            $numberStart = null;
            $numberEnd = null;
        }  
    }
    if($number) {
        if(isValid($x, $numberStart, $numberEnd, $matrice)) {
            $sum += (int)$number;
        }  
    }
}

function isValid($startX, $numberStart, $numberEnd, $matrice){
    for ($y=$numberStart; $y <= $numberEnd; $y++) { 
        for ($x=$startX-1; $x <= $startX+1; $x++) { 
            if(isset($matrice[$x][$y-1]) && $matrice[$x][$y-1] !== "." && !ctype_digit($matrice[$x][$y-1])) {
                return true;
            }
            if(isset($matrice[$x][$y]) && $matrice[$x][$y] !== "." && !ctype_digit($matrice[$x][$y])) {
                return true;
            }
            if(isset($matrice[$x][$y+1]) && $matrice[$x][$y+1] !== "." && !ctype_digit($matrice[$x][$y+1])) {
                return true;
            }
        }
    }
    return false;
}
echo 'Answer 1 : ' . $sum . '<br />';

// 2nd
$total = 0;
foreach ($matrice as $startX => $line) {
    foreach ($line as $startY => $carac) {
        if($carac == "*"){
            $n1 = null;
            $n2 = null;
            for ($x=$startX-1; $x <= $startX+1; $x++) { 
                for ($y=$startY-1; $y <= $startY+1; $y++) { 
                    if(isset($matrice[$x][$y]) && ctype_digit($matrice[$x][$y])) {
                        if($n1 == null) {
                            $n1 = getNumber($matrice[$x], $y);
                        } else { 
                            $n2 = getNumber($matrice[$x], $y);
                        }
                    }
                }
            }
            if($n1 != null && $n2 != null){
                $total += (int)$n1 * (int)$n2;
            }
        }
    }
}

function getNumber(&$line, $y) {
    $number = null;
    if(isset($line[$y-1]) && ctype_digit($line[$y-1])) {
        if(isset($line[$y-2]) && ctype_digit($line[$y-2])){
            $number = $line[$y-2].$line[$y-1].$line[$y];
            $line[$y-2] = ".";
            $line[$y-1] = ".";
            $line[$y] = ".";
        } else {
            $number = $line[$y-1].$line[$y].(isset($line[$y+1]) && ctype_digit($line[$y+1]) ? $line[$y+1] : '');
            $line[$y-1] = ".";
            $line[$y] = ".";
            if(isset($line[$y+1]) && ctype_digit($line[$y+1])){
                $line[$y+1] = ".";
            }
        }
    } else {
        $number = $line[$y].(isset($line[$y+1]) && ctype_digit($line[$y+1]) ? $line[$y+1] : '').(isset($line[$y+2]) && ctype_digit($line[$y+2]) ? $line[$y+2] : '');
        $line[$y] = ".";
        if(isset($line[$y+1]) && ctype_digit($line[$y+1])){
            $line[$y+1] = ".";
        }
        if(isset($line[$y+2]) && ctype_digit($line[$y+2])){
            $line[$y+2] = ".";
        }
    }
    return $number;
}
echo 'Answer 2 : ' . $total . '<br />';