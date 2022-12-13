<?php
class Node
{
	public string $letter;
	public int 	  $x;
	public int 	  $y;
	public array  $neighbors;
	public bool   $visited;

	public function __construct(string $letter, int $x, int $y)
	{
		$this->letter = $letter;
		$this->x = $x;
		$this->y = $y;
		$this->visited = false;
	}	
}