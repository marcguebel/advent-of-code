<?php
// challenge see : https://adventofcode.com/2022/day/7

$input = explode("\r\n", file_get_contents(__DIR__ . '/day_07_input.txt'));

// 1st
//contain all the possible directory path
$paths = [
 	"/" => 0
];

//contain the current path 
$currentPath = [
	"/"
];

foreach ($input as $line) {
	$lineExplode = explode(" ", $line);
	$pathAsKey = implode(";", $currentPath);

	if ($lineExplode[1] == "cd") {
		//update current path in $currentPath, remove last, add or restart from "/"
		if ($lineExplode[2] == "..") {
			array_pop($currentPath);
		} elseif ($lineExplode[2] == "/") {
			$currentPath = [
				"/"
			];
		} else {
			$currentPath[] = $lineExplode[2];
		}
	} elseif ($lineExplode[0] == "dir") {
		// add new path to $paths
		$paths[$pathAsKey . ';' . $lineExplode[1]] = 0;
	} elseif (filter_var($lineExplode[0], FILTER_VALIDATE_INT) ) {
		// increment all parent path in $paths
		if (isset($paths[$pathAsKey]) ) {
			$copyPath = $currentPath;
			$hasParent = true;
			while ($hasParent == true) {
				$paths[$pathAsKey] += $lineExplode[0];
				array_pop($copyPath);
				$pathAsKey = implode(";", $copyPath);
				if (!isset($paths[$pathAsKey]) ) {
					$hasParent = false;
				} 
			}
		}
	}
}

//get outpout result
$outpout = 0;
foreach ($paths as $path) {
	if($path < 100000)
		$outpout += $path;
}
echo 'Answer 1 : ' . $outpout . '<br />';

// 2nd
//contain the path that can be use 
$pathsFilter = [];
foreach ($paths as $path) {
	if ($path > 30000000 - (70000000 - $paths["/"]) ) {
		$pathsFilter[] = $path;
	}
}
echo 'Answer 2 : ' . min($pathsFilter) . '<br />';