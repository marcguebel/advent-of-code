<?php 
class Map{
	public array $nodes; // element of the map (rock or sand) stocked in [line][column] format
	public int $minLine = 999;
	public int $maxLine = 0;
	public int $minColumn = 999;
	public int $maxColumn = 0;
	public int $floor; // for part 2

	/**
	 * Add element
	 * @param 	int 	$line 		line position
	 * @param 	int 	$column 	column position
	 * @param 	string 	$type 		enum type (rock or sand)
	 */
	public function addNode(int $line, int $column, string $type):void {
		if ($line<$this->minLine) {
			$this->minLine = $line;
		}
		if ($line>$this->maxLine) {
			$this->maxLine = $line;
		}
		if ($column<$this->minColumn) {
			$this->minColumn = $column;
		}
		if ($column>$this->maxColumn) {
			$this->maxColumn = $column;
		}
		$this->nodes[$line][$column] = $type; 
	}

	/**
	 * Render the current map
	 */
	public function displayMap(): void {
		echo '<pre>';
		for ($line=0; $line <= $this->maxLine; $line++) { 
			for ($column=$this->minColumn; $column <= $this->maxColumn; $column++) { 
				if(isset($this->nodes[$line][$column])) {
					echo $this->nodes[$line][$column];
				} else {
					echo '.';
				}
			}
			echo '<br />';
		}
		echo '</pre>';
	}

	/**
	 * For part 1
	 */
	public function addSignal() {
		foreach ($this->nodes as $line => $lineNode) {
			foreach ($lineNode as $column => $node) {
				if ($node == 'S') {
					$this->runBfs($line, $column);
				}
			}
		}
	}

	public function runBfs($line, $column) {
		$q = new SplQueue();

		//enqueue current node mark it as visited
    	$q->enqueue($line . ';' . $column);
    	$visited = [$line . ';' . $column];

    	$limit = null;

    	while ($q->count() > 0) {
	        list($bfsLine, $bfsColumn) = explode(';', $q->dequeue());

	        # We've found what we want
	        if($limit != null && (max($bfsLine, $line) - min($bfsLine, $line) + max($bfsColumn, $column) - min($bfsColumn, $column)) > $limit){
	        	return true;
	        }

	        if (isset($this->nodes[(int)$bfsLine][(int)$bfsColumn]) && $this->nodes[$bfsLine][$bfsColumn] == 'B') {
	            $limit = (max($bfsLine, $line) - min($bfsLine, $line) + max($bfsColumn, $column) - min($bfsColumn, $column));
	        } elseif (!isset($this->nodes[(int)$bfsLine][(int)$bfsColumn])) {
	        	$this->addNode($bfsLine, $bfsColumn, '#');
	        }

	        $neighbours = [
	        	$bfsLine-1 . ';' . $bfsColumn,
	        	$bfsLine+1 . ';' . $bfsColumn,
	        	$bfsLine . ';' . $bfsColumn-1,
	        	$bfsLine . ';' . $bfsColumn+1
	        ];

	        foreach ($neighbours as $neighbour) {
	            if (!in_array($neighbour, $visited)) {
	                $visited[] = $neighbour;
	                $q->enqueue($neighbour);
	            }
	        };
	    }
	    return false;
	}

	/**
	 * For part 2
	 */
	public function runPartTwo(): int {
		$count = 0;
		while (true){
			$line = 0;
			$column = 500;
			$canMove = true;
			while ($canMove) {

				//if reach the floor
				$isFloor = ($line+1 == $this->floor);

				if(isset($this->nodes[$line+1][$column]) || $isFloor) { 			//try down
					if(isset($this->nodes[$line+1][$column-1]) || $isFloor) {		//try down left
						if(isset($this->nodes[$line+1][$column+1]) || $isFloor) { 	//try down right
							$canMove = false;

							//sand is at is final position, add to nodes
							$this->addNode($line, $column, 'sand');
							$count++;

							//if reach the spawner, time to stop
							if ($line==0 && $column==500) {
								return $count;
							}
						} else {
							$line++;
							$column++;
						}
					} else {
						$line++;
						$column--;
					}
				} else {
					$line++;
				}
			}
		}
	}
}