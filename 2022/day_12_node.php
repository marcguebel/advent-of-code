<?php

class Node
{
	public string $letter;
	public int $x;
	public int $y;
	public $parent = null;
	public $distanceToStart = null;
	public int $flyDistanceToEnd;
	public int $poids = 99999;
	public $voisins = null;
	public bool $visited = false;

	public function __construct($letter, $x, $y, $xObjectif=null, $yObjectif=null)
	{
		$this->letter = $letter;
		$this->x = $x;
		$this->y = $y;
		if ($xObjectif != null && $yObjectif != null) {
			$this->flyDistanceToEnd = abs($xObjectif - $x) + abs($yObjectif - $y);
		}

		// $this->flyDistanceToEnd 
	}
	
}