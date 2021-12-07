<?php
// challenge see : https://adventofcode.com/2021/day/6

$input = "2,1,2,1,5,1,5,1,2,2,1,1,5,1,4,4,4,3,1,2,2,3,4,1,1,5,1,1,4,2,5,5,5,1,1,4,5,4,1,1,4,2,1,4,1,2,2,5,1,1,5,1,1,3,4,4,1,2,3,1,5,5,4,1,4,1,2,1,5,1,1,1,3,4,1,1,5,1,5,1,1,5,1,1,4,3,2,4,1,4,1,5,3,3,1,5,1,3,1,1,4,1,4,5,2,3,1,1,1,1,3,1,2,1,5,1,1,5,1,1,1,1,4,1,4,3,1,5,1,1,5,4,4,2,1,4,5,1,1,3,3,1,1,4,2,5,5,2,4,1,4,5,4,5,3,1,4,1,5,2,4,5,3,1,3,2,4,5,4,4,1,5,1,5,1,2,2,1,4,1,1,4,2,2,2,4,1,1,5,3,1,1,5,4,4,1,5,1,3,1,3,2,2,1,1,4,1,4,1,2,2,1,1,3,5,1,2,1,3,1,4,5,1,3,4,1,1,1,1,4,3,3,4,5,1,1,1,1,1,2,4,5,3,4,2,1,1,1,3,3,1,4,1,1,4,2,1,5,1,1,2,3,4,2,5,1,1,1,5,1,1,4,1,2,4,1,1,2,4,3,4,2,3,1,1,2,1,5,4,2,3,5,1,2,3,1,2,2,1,4";

//1st && 2nd

//format input
$data = explode(",", $input);

//initialise empty array 
$res = [
	8=>0,
	7=>0,
	6=>0,
	5=>0,
	4=>0,
	3=>0,
	2=>0,
	1=>0,
	0=>0,
];

//set array with intial value
foreach ( $data as $fish ) {
	$res[ $fish ] += 1;
}

//for each day, actualise array 
for ( $i=0; $i < 256; $i++ ) { 

	//for saving old value
	$oldValue = 0;
	foreach( $res as $day => $count ){

		//if its day 0, move count to 6 and duplicate count for 8
		if( $day == 0 ){
			$res[ 8 ] = $res[ 0 ];
			$res[ 6 ] += $res[ 0 ];		
		}

		//set current count and save old value for next day
		$oldValueForNextDay = $res[ $day ];
		$res[ $day ] = $oldValue;
		$oldValue = $oldValueForNextDay;
	}

	//display 1st answer
	if( $i == 79 )
		echo "First answer : " . sum( $res ) . "<br />";
}

//2nd answer
echo "Second answer : " . sum( $res ) . "<br />";

//return the sum of array 
function sum( $res ) {
	$count = 0;
	foreach( $res as $sum ){
		$count += $sum;
	}
	return $count;
}