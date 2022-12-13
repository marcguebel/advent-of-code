<?php
class Graph
{
	public array $map;
	public array $nodes;
	public node  $currentNode;
	public int   $startX;
	public int   $startY;
	public bool  $displayMap = false;

	/**
	 * Implement basic BFS algorithme
	 * @return 	int | false  count for short path to end or fase if no way found
	 */
	public function run(): int | bool
	{
		//initialise all nodes
		foreach ($this->map as $x => $line) {
			foreach ($line as $y => $node) {
				$node = new Node($node, $x, $y);
				$this->nodes[$x][$y] = $node;
			}
		}

		//set current node
		$this->currentNode = $this->nodes[$this->startX][$this->startY];
		$this->currentNode->letter = 'a';

		//load all neighbors
		foreach ($this->nodes as $x => $line) {
			foreach ($line as $y => $node) {
				$node->neighbors = $this->getNeighbors($node);
			}
		}

		//start checking
		$path = $this->start();

		//can display path on map
		if($this->displayMap && $path){
			$this->renderMap($path);
		}
		
		if($path)
			return count($path)-3;
		else
			return false;
	}

	/**
	 * Basic BFS algorithme
	 * @return 	int | false  count for short path to end or fase if no way found
	 */
	public function start(): array | bool
	{
		$q = new SplQueue();

		//enqueue current node mark it as visited
    	$q->enqueue([$this->currentNode]);
    	$this->currentNode->visited = true;

    	while ($q->count() > 0) {
    		$path = $q->dequeue();
    		$node = $path[sizeof($path) - 1];

    		//end
    		if ($node->letter == "E") {
    			return $path;
    		}

    		//every neighbors
    		foreach ($node->neighbors as $neighbors) {
    			if (!$neighbors->visited) {
	                $neighbors->visited = true;

                	# Build new path appending the neighbour then and enqueue it
	                $new_path = $path;
	                $new_path[] = $neighbors;

                	$q->enqueue($new_path);
                }
            }
    	}

    	//no path found
    	return false;
	}

	/**
	 * return nodes neighbors for node $node
	 *
	 * @param 	node 	$node 	node to test
	 * @return  array 			nodes neighbors
	 */
	public function getNeighbors(node $node): array
	{
		$nodesNeighbors = [];
		if ($this->canMoveTo($node->x-1, $node->y, $node) ) {
			$nodesNeighbors[] = $this->nodes[$node->x-1][$node->y];
		}
		if ($this->canMoveTo($node->x+1, $node->y, $node) ) {
			$nodesNeighbors[] = $this->nodes[$node->x + 1][$node->y];
		}
		if ($this->canMoveTo($node->x, $node->y-1, $node) ) {
			$nodesNeighbors[] = $this->nodes[$node->x][$node->y - 1];
		}
		if ($this->canMoveTo($node->x, $node->y+1, $node) ) {
			$nodesNeighbors[] = $this->nodes[$node->x][$node->y + 1];
		}

		return $nodesNeighbors;
	}

	/**
	 * check if the node $node can move to $nodes[$x][$y]
	 *
	 * @param 	int 	$x 		position x to test
	 * @param 	int 	$y 		position y to test
	 * @param 	node 	$node 	object node
	 */
	public function canMoveTo(int $x, int $y, node $node): bool
	{
		//must exist
		if(!isset($this->nodes[$x][$y]))
			return false;

		//can if its z to E
		if(ord($this->nodes[$x][$y]->letter) == 69 && ord($node->letter) == 122)
			return true;

		//can basic condition
		if(ord($node->letter)+1 > ord($this->nodes[$x][$y]->letter)-1 && ord($this->nodes[$x][$y]->letter) != 69)
			return true;

		return false;
	}

	/**
	 * Display map with path in gray background
	 *
	 * @param 	array 	$path path from start to end
	 */
	public function renderMap(array $path): void
	{
		//format 
		$outpout=[];
		foreach($path as $node){
			$outpout[$node->x][$node->y]=$node->letter;
		}

		//render
		echo "<pre>";
		foreach($this->map as $x => $line){
			foreach ($line as $y => $letter) {
				$style = (isset($outpout[$x][$y]) ? 'background: gray;' : null);
				echo '<span style="'.$style.'">'.$letter.'</span>';
			}
			echo '<br />';
		}
		echo "</pre>";
	}
}