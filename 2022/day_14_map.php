<?php 
class Map{
	public array $nodes; // element of the map (rock or sand) stocked in [line][column] format
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
			echo $line;
			for ($column=$this->minColumn; $column <= $this->maxColumn; $column++) { 
				if ($line==0 && $column==500) {
					echo '+';
				} elseif(isset($this->nodes[$line][$column])) {
					if($this->nodes[$line][$column]=='rock') {
						echo '#';
					} else {
						echo 'o';
					}
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
	public function runPartOne(): int {
		$count = 0;
		while (true){
			$line = 0;
			$column = 500;
			$canMove = true;
			while ($canMove) {
				//if fall in the void, time to stop
				if ($line > $this->maxLine){
					return $count;
				}
				
				if (isset($this->nodes[$line+1][$column]) ) {			//try down
					if (isset($this->nodes[$line+1][$column-1]) ) {		//try down left
						if (isset($this->nodes[$line+1][$column+1]) ) { //try down right
							$canMove = false;

							//sand is at is final position, add to nodes
							$this->addNode($line, $column, 'sand');
							$count++;
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