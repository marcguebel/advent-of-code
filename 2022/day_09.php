<?php
// challenge see : https://adventofcode.com/2022/day/9

$input = explode("\r\n", file_get_contents(__DIR__ . '/day_09_input.txt') );

// 1st
$posVisitedByTail = ["0;0"];

$xHead = 0;
$yHead = 0;
$xTail = 0;
$yTail = 0;
foreach ($input as $line) {
	list($direction, $count) = explode(' ', $line);
 
 	//move head
	for ($i=0; $i < $count; $i++) { 

		//update head position
		if ($direction=='R') {
			$xHead++;
		} elseif ($direction=='U') {
			$yHead--;
		} elseif ($direction=='D') {
			$yHead++;
		} elseif ($direction=='L') {
			$xHead--;
		}

		//update tail pos if needed
		if ( ($xHead-$xTail == 2 && $yHead-$yTail == 1) || ( $xHead-$xTail == 1 && $yHead-$yTail == 2) ) {
			$xTail++;
			$yTail++;
		} elseif ( ($xHead-$xTail == 2 && $yHead-$yTail == -1) || ( $xHead-$xTail == 1 && $yHead-$yTail == -2) ) {
			$xTail++;
			$yTail--;
		} elseif ( ($xHead-$xTail == -1 && $yHead-$yTail == -2) || ( $xHead-$xTail == -2 && $yHead-$yTail == -1) ) {
			$xTail--;
			$yTail--;
		} elseif ( ($xHead-$xTail == -1 && $yHead-$yTail == 2) || ( $xHead-$xTail == -2 && $yHead-$yTail == 1) ) {
			$xTail--;
			$yTail++;
		} elseif ($xHead-$xTail == 2 ) {
			$xTail++;
		} elseif ($xHead-$xTail == -2 ) {
			$xTail--;
		} elseif ($yHead-$yTail == 2 ) {
			$yTail++;
		} elseif ($yHead-$yTail == -2 ) {
			$yTail--;
		} 

		//add to array if never visited
		if (!in_array($xTail.';'.$yTail, $posVisitedByTail) ) {
			$posVisitedByTail[] = $xTail.';'.$yTail;
		}
	}
}
echo 'Answer 1 : ' . count($posVisitedByTail) . '<br />';

// 2nd
$posVisitedByTail = ["0;0"];
$snake = ["0;0","0;0","0;0","0;0","0;0","0;0","0;0","0;0","0;0","0;0"];

foreach ($input as $line) {
	list($direction, $count) = explode(' ', $line);

 	//move head
	for ($i=0; $i < $count; $i++) { 

		//update head position
		list($xHead, $yHead) = explode(';', $snake[0]);
		if ($direction=='R') {
			$xHead++;
		} elseif ($direction=='U') {
			$yHead--;
		} elseif ($direction=='D') {
			$yHead++;
		} elseif ($direction=='L') {
			$xHead--;
		}
		$snake[0] = $xHead . ';' .$yHead;

		$xLast = $xHead;
		$yLast = $yHead;

		//update rest
		for ($j=1; $j < 10; $j++) { 
			list($x, $y) = explode(';', $snake[$j]);

			$diffX = $xLast - $x;
			$diffY = $yLast - $y;
			$upAndUp = ($xLast > $x && $yLast > $y && $diffX == 2 && $diffY == 2);
			$upAndDown = ($xLast > $x && $yLast < $y && $diffX == 2 && $diffY == -2);
			$downAndDown = ($xLast < $x && $yLast < $y && $diffX == -2 && $diffY == -2);
			$downAndUp = ($xLast < $x && $yLast > $y && $diffX == -2 && $diffY == 2);

			if ( ( $diffX == 2 && $diffY == 1) || ( $diffX == 1 && $diffY == 2) || $upAndUp ) {
				$x++;
				$y++;
			} elseif ( ( $diffX == 2 && $diffY == -1) || ( $diffX == 1 && $diffY == -2) || $upAndDown ) {
				$x++;
				$y--;
			} elseif ( ( $diffX == -1 && $diffY == -2) || ( $diffX == -2 && $diffY == -1) || $downAndDown ) {
				$x--;
				$y--;
			} elseif ( ( $diffX == -1 && $diffY == 2) || ( $diffX == -2 && $diffY == 1) || $downAndUp ) {
				$x--;
				$y++;
			} elseif ($diffX == 2 ) {
				$x++;
			} elseif ($diffX == -2 ) {
				$x--;
			} elseif ($diffY == 2 ) {
				$y++;
			} elseif ($diffY == -2 ) {
				$y--;
			} else {
				break;
			}

			//update pos in array
			$snake[$j] = $x . ';' .$y;

			//if update tail and add to array if never visited
			if ($j == 9) {
				if (!in_array($snake[9], $posVisitedByTail) ) {
					$posVisitedByTail[] = $snake[9];
				}
			}
			$xLast = $x;
			$yLast = $y;
		}
	}
}
echo 'Answer 2 : ' . count($posVisitedByTail) . '<br />';