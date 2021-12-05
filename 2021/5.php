<?php
// challenge see : https://adventofcode.com/2021/day/5

//input
include "5_input.php";

//format input
$input = explode( "\n", $input );
$input = str_replace( " ", "", $input );

//1st && 2nd
$matrice1 = [];	//answer for part 1
$matrice2 = [];	//answer for part 2

foreach ( $input as $value ) {
	//clean and get coord
	$coord = explode( "->", $value);
	$startCoord = array_map('intval', explode(",", $coord[0]));
	$endCoord = array_map('intval', explode(",", $coord[1]));

	//if its vertical or horizontal
	if( $startCoord[ 0 ] == $endCoord[ 0 ] || $startCoord[ 1 ] == $endCoord[ 1 ] ) {
		for ( $abscisse = min( $startCoord[ 0 ], $endCoord[ 0 ] ); $abscisse <= max( $startCoord[ 0 ], $endCoord[ 0 ] ); $abscisse++) { 
			for ( $ordonee = min( $startCoord[ 1 ], $endCoord[ 1 ] ); $ordonee <= max( $startCoord[ 1 ], $endCoord[ 1 ] ); $ordonee++) { 
				placeInMatrice($matrice1, $abscisse, $ordonee); 
				placeInMatrice($matrice2, $abscisse, $ordonee);
			}
		}
	}
	else{
		//depend on the direction of the diagonal 
		if( $startCoord[ 0 ] < $endCoord [ 0 ] && $startCoord[ 1 ] < $endCoord [ 1 ] ){
			for ($abscisse = $startCoord[ 0 ]; $abscisse <= $endCoord[ 0 ]; $abscisse++) { 
				for ($ordonee = $startCoord[ 1 ]; $ordonee <= $endCoord[ 1 ]; $ordonee++) { 
					placeInMatrice($matrice2, $abscisse, $ordonee);
					$abscisse++;
				}
			}
		}
		elseif( $startCoord[ 0 ] < $endCoord [ 0 ] && $startCoord[ 1 ] > $endCoord [ 1 ] ){
			for ($abscisse = $startCoord[ 0 ]; $abscisse <= $endCoord[ 0 ]; $abscisse++) { 
				for ($ordonee = $startCoord[ 1 ]; $ordonee >= $endCoord[ 1 ]; $ordonee--) { 
					placeInMatrice($matrice2, $abscisse, $ordonee);
					$abscisse++;
				}
			}
		}
		elseif( $startCoord[ 0 ] > $endCoord [ 0 ] && $startCoord[ 1 ] < $endCoord [ 1 ] ){
			for ($abscisse = $startCoord[ 0 ]; $abscisse >= $endCoord[ 0 ]; $abscisse--) { 
				for ($ordonee = $startCoord[ 1 ]; $ordonee <= $endCoord[ 1 ]; $ordonee++) { 
					placeInMatrice($matrice2, $abscisse, $ordonee);
					$abscisse--;
				}
			}
		}
		elseif( $startCoord[ 0 ] > $endCoord [ 0 ] && $startCoord[ 1 ] > $endCoord [ 1 ] ){
			for ($abscisse = $startCoord[ 0 ]; $abscisse >= $endCoord[ 0 ]; $abscisse--) { 
				for ($ordonee = $startCoord[ 1 ]; $ordonee >= $endCoord[ 1 ]; $ordonee--) { 
					placeInMatrice($matrice2, $abscisse, $ordonee);
					$abscisse--;
				}
			}
		}
	}
}

//increment value in matrice
function placeInMatrice(&$matrice, $abscisse, $ordonee){
	if( ! isset( $matrice[ $abscisse ][ $ordonee ] ) )
		$matrice[ $abscisse ][ $ordonee ] = 1;
	else
		$matrice[ $abscisse ][ $ordonee ] += 1;
}

//outoup result
function result($matrice){
	$count=0;
	foreach( $matrice as $lines ) {
		foreach( $lines as $value ) {
			if( $value > 1 ){
				$count++;
			}
		}
	}
	return $count;
}

echo "first answer : " . result($matrice1) . "<br />";
echo "second answer : " . result($matrice2);