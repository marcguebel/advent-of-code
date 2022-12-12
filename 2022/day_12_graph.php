<?php

class Graph
{
	public array $map = [];
	public array $nodeToDo = [];
	public array $nodeEnd = [];
	public $nodeObjectif;
	public $currentNode;
	public int $startX;
	public int $startY;
	public bool $isEnd = false;
	public $count = 0;

	public function run()
	{
		//initilise nodes
		foreach ($this->map as $x => $line) {
			foreach ($line as $y => $node) {
				$xObjectif = $this->nodeObjectif->x;
				$yObjectif = $this->nodeObjectif->y;
				$node = new Node($node, $x, $y, $xObjectif, $yObjectif);
				$this->nodeToDo[$x][$y] = $node;
			}
		}

		//load all voisins
		$this->currentNode = $this->nodeToDo[$this->startX][$this->startY];
		$this->currentNode->letter = 'a';
		$this->nodeEnd[$this->currentNode->x][$this->currentNode->y] = $this->currentNode;
		foreach ($this->nodeToDo as $line) {
			foreach ($line as $node) {
				$node->voisins = $this->getVoisins($node);
			}
		}

		//start checking
		$this->move();
	}

	public function move(){
		$voisins = $this->currentNode->voisins;
		$key = 999;
		if (count($voisins)>0) {
			foreach ($voisins as $index => $voisin) {
				if (!$voisin->visited) {
					$key = $index;
				}
			}
		}
		if(isset($this->currentNode->voisins[$key])) {
			$next = $this->currentNode->voisins[$key];
			$next->visited=true;
			$this->count++;
			echo 'start '.$next->letter.' move to '.$next->x.' '.$next->y.'<br />';

			//set parent and update current node
			$next->parent = $this->currentNode;
			$this->currentNode = $next;

			if(ord($next->letter) != ord('Z')){
				$this->move();
			}
		} else {
			echo 'end !';
			//remonter en arriere pour trouver un voisin
		}
	}

	public function setObjectif($letter, $x, $y)
	{
		$node = new Node($letter, $x, $y);
		$node->flyDistanceToEnd = 0;
		$this->nodeObjectif = $node;
	}

	public function getVoisins($node)
	{
		$nodesVoisins = [];
		$x = $node->x;
		$y = $node->y;
		$nextLetter = [ord($node->letter), ord($node->letter) + 1];
		if (isset($this->nodeToDo[$x - 1][$y]) && in_array(ord($this->nodeToDo[$x - 1][$y]->letter), $nextLetter) ) {
			$nodesVoisins[] = $this->nodeToDo[$x - 1][$y];
		}
		if (isset($this->nodeToDo[$x + 1][$y]) && in_array(ord($this->nodeToDo[$x + 1][$y]->letter), $nextLetter) ) {
			$nodesVoisins[] = $this->nodeToDo[$x + 1][$y];
		}
		if (isset($this->nodeToDo[$x][$y - 1]) && in_array(ord($this->nodeToDo[$x][$y - 1]->letter), $nextLetter) ) {
			$nodesVoisins[] = $this->nodeToDo[$x][$y - 1];
		}
		if (isset($this->nodeToDo[$x][$y + 1]) && in_array(ord($this->nodeToDo[$x][$y + 1]->letter), $nextLetter) ) {
			$nodesVoisins[] = $this->nodeToDo[$x][$y + 1];
		}


		usort($nodesVoisins, function ($a, $b) {
    		return $a->flyDistanceToEnd - $b->flyDistanceToEnd;
		});

		return $nodesVoisins;
	}
}