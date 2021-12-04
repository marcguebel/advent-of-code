<?php
// challenge see : https://adventofcode.com/2021/day/4

$inputNumber = [93,35,66,15,6,51,49,67,16,77,80,8,1,57,99,92,14,9,13,23,33,11,43,50,60,96,40,25,22,39,56,18,2,7,34,68,26,90,75,41,4,95,71,30,42,5,46,55,27,98,79,12,65,73,29,28,17,48,81,32,59,63,85,91,52,21,38,31,61,83,97,62,44,70,19,69,36,47,74,58,78,24,72,0,10,88,37,87,3,45,82,76,54,84,20,94,86,53,64,89];

//inputBingo
include "4_bingo.php";

//1st && 2nd 

//clean inputBingo
$inputBingo = str_replace( [ "\n", "\r" ], ",", $inputBingo );
$inputBingo = str_replace( " ", ",", $inputBingo);
$inputBingo = str_replace( ",,,", ",", $inputBingo);
$inputBingo = str_replace( ",,", ",", $inputBingo);
$inputBingo = str_replace( ",,", ",", $inputBingo);

//convert inputBingo 
$explode = explode(',', $inputBingo);
$lines = array_chunk($explode, 5);
$grids = array_chunk($lines, 5);

//save index for each bingo
$gridBingo = [];

//for each number
foreach( $inputNumber as $value ) {

	//for each grids
	foreach( $grids as $indexGrid => $grid ) {

		//for each lines of each grids
		foreach ( $grid as $indexLines => $lines ) {

			//for each values of each lines
			foreach ( $lines as $indexNumber => $number ) {

				//if value == number, save info + check bingo
				if( $value == $number){

					//save = replace value by null
					$grids[ $indexGrid ][ $indexLines ][ $indexNumber ] = null;

					//if bingo
					if( $bingo = checkBingo( $grids[ $indexGrid ] ) ) {

						//if ever had a bingo for this grid
						if( ! isset( $gridBingo[ $indexGrid ] ) ) {

							//save info in $gridBingo.
							$gridBingo[ $indexGrid ] = "ok";

							//display result
							$somme = sum( $bingo );
							echo "Bingo !! Grid : " . $indexGrid . " | Somme : " . $somme . " | Last number : " . $value . " | Résultat : " . ( $somme * $value ) . "<br /><br />";
						}

					}
				}
			}
		}
	}
}

//return grid if bingo else no return
function checkBingo( $grid ) {

	//check bingo horizontal
	foreach( $grid as $lines ){

		$bingoHorizontal = true;

		foreach ( $lines as $value ) {
			if( $value != null )
				$bingoHorizontal = false;
		}

		if($bingoHorizontal)
			return $grid;
	}

	//chech bingo vertical
	for( $i=0; $i < 5; $i++ ) { 

		$bingoVertical = true;

		for( $j=0; $j < 5; $j++ ) { 
			if( $grid[ $j ][ $i ] != null )
				$bingoVertical = false;
		}

		if($bingoVertical)
			return $grid;
	}
}

//get the sum of the grid
function sum( $grid ) {

	$sum = 0;

	foreach( $grid as $lines ){
		foreach ( $lines as $value ) {
			$sum += $value;
		}
	}

	return $sum;
}