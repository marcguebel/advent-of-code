<?php 

require "8_input.php";

//format input
$lines = explode("\r", $input);

//1st
$answer1 = 0;
foreach ( $lines as $line ) {
	//only get the number after the | 
	$part = explode( "|", $line );
	$numbers = explode( " ", $part[1] );

	//for each value, check if length = 2 or 4 or 3 or 7
	foreach( $numbers as $number ) {
		if(  in_array( strlen( trim ( $number ) ) , [2, 4, 3, 7] ) )
			$answer1++;
	}
}
echo "first answer : " . $answer1 . "<br />";

//2nd
$lineDecodes = [];
foreach ( $lines as $line ) {
	//only get the number after the | 
	$part = explode( "|", $line );
	$patterns = explode( " ", trim( $part[0] ) );
	$numbers = explode( " ", trim ( $part[1] ) );

	//while contain the representation of each number
	$formatNumbers=[];

	//get the precedent value for 1 4 7 & 8
	foreach ( $patterns as $ind => $pattern ) {
		switch (strlen( $pattern ) ) {
			case 2:
				$formatNumbers[ 1 ] = $pattern;
				unset( $patterns[ $ind ] );
				break;
			case 4:
				$formatNumbers[ 4 ] = $pattern;
				unset( $patterns[ $ind ] );
				break;
			case 3:
				$formatNumbers[ 7 ] = $pattern;
				unset( $patterns[ $ind ] );
				break;
			case 7:
				$formatNumbers[ 8 ] = $pattern;
				unset( $patterns[ $ind ] );
				break;
		}
	}

	// 6 & 3
	foreach ( $patterns as $ind => $pattern ) {	
		//split the value for 1, so we can check 
		$caracs = str_split( $formatNumbers[ 1 ] );
		$explode = str_split($pattern);

		//for value 6
		if( strlen( $pattern ) == 6 ) {
			if( !in_array( $caracs[ 0 ], $explode ) || !in_array( $caracs[ 1 ], $explode ) ){
				$formatNumbers[ 6 ] = $pattern;
				unset( $patterns[ $ind ] );
			}
		}
		//for value 3 
		elseif( strlen( $pattern ) == 5 ) {
			if( in_array( $caracs[ 0 ], $explode ) && in_array( $caracs[1], $explode ) ){
				$formatNumbers[ 3 ] = $pattern;
				unset( $patterns[ $ind ] );
			}
		}
	}

	// 9, 0, 2 & 5
	foreach ( $patterns as $ind => $pattern ) {	
		// for 0 & 9
		if( strlen( $pattern ) == 6 ){
			$caracs = str_split( $formatNumbers[ 4 ] );
			$explode = str_split( $pattern );

			// for 0
			if( !in_array( $caracs[ 0 ], $explode ) || !in_array( $caracs[ 1 ], $explode ) || !in_array( $caracs[ 2 ], $explode ) || !in_array( $caracs[ 3 ], $explode ) ){
				$formatNumbers[ 0 ] = $pattern;
				unset( $patterns[ $ind ] );
			}
			// for 9
			else{
				$formatNumbers[ 9 ] = $pattern;
				unset( $patterns[ $ind ]);
			}
		}
		// for 5 & 2
		elseif( strlen( $pattern ) == 5 ){
			$caracs = str_split( $pattern );
			$explode = str_split( $formatNumbers[6]);

			// for 5
			if( in_array( $caracs[ 0 ], $explode ) && in_array( $caracs[ 1 ], $explode ) && in_array( $caracs[ 2 ], $explode ) && in_array( $caracs[ 3 ], $explode ) && in_array( $caracs[ 4 ], $explode ) ){
				$formatNumbers[ 5 ] = $pattern;
				unset( $patterns[ $ind ] );
			}
			// for 2
			else{
				$formatNumbers[ 2 ] = $pattern;
				unset( $patterns[ $ind ]);
			}
		}
	}

	//sort key alphabetic and inverse key and value 
	foreach( $formatNumbers as $key => $value ) {
		$explode = str_split($value);
		sort( $explode );
		$formatNumbers[ $key ] = implode( "", $explode );
	}
	$formatNumbers = array_flip( $formatNumbers );

	//concatain the result and save it to $lineDecodes
	$res = null;
	foreach( $numbers as $number ) {
		$explode = str_split($number);
		sort( $explode );
		$value = implode( "", $explode );
		$res .= $formatNumbers [$value ];
	}
	$lineDecodes[]=$res;
}

//sum array for get the second resut
$sum = 0;
foreach( $lineDecodes as $number ) {
	$sum += ( int )$number;
}

echo "second answer : " . $sum . "<br />";