<?php
//base class with zombie/block properties and methods
class game_mode {
	var $mode;
	function __construct($mode) {
		$this->mode = $mode;
	}
	function number_of_rows {
		global $row_number;
		if($this->mode = 'hard') 
		{
			$row_number = 60;
		}
		if($this->mode = 'medium')
		{
			$row_number = 45;
		}
		if($this->mode = 'normal')
		{
			$row_number = 30;
		}
	}
	function number_of_cols {
		global $col_number;
		if($this->mode = 'hard') 
		{
			$col_number = 100;
		}
		if($this->mode = 'medium')
		{
			$col_number = 75;
		}
		if($this->mode = 'normal')
		{
			$col_number = 50;
		}
		
	}	
}
//end of game_mode class 
class block_metrics {
	var $metrics;
	function __construct() {
		$this->metrics = $metrics;
	}
	function create_metrics {
		$x = 1;
		do{
		$metrics = new row();
		} while($x <= $GLOBALS['row_number']);
		return $metrics;
	} 
	function get_metrics {
		return $this->metrics;
	}
}
// end of block_metrics class
class row {
	var $row;
	
	function __construct() {
		$this->row = $row;
		
	}
	function set_blocks {
	$x = 1;
		do {	
			$this->row[rand(1,$GLOBALS['col_number'])] = new block(0,"");
			x++;
		}while($x <= ($GLOBALS['col_number'] - $GLOBALS['row_number']))
	}
	function set_zombies {
		do{
		$i = rand(1,$GLOBALS['col_number']);
		if (!isset($this->row[$i]))
		{
			if (fmod($i, 2) > 0 )
			{
				$this->row[$i] = new zombieBlock(true);
			}	
			else
			{
				$this->row[$i] = new block(0,"");
			}
		}
		}while(!$verify_row);
		
	}
	function verify_row {
		$x = 1;
		do {
			 if (!isset($this->row[$x])) 
			 {
					return false;
			 }
		$x++;
		} while($x <=  $GLOBALS['row_number']);
		return true;
	}
}
// end of row class
class zombieBlock{
	
	var $zombie;


function __construct($zombie)
{
	$this->zombie = $zombie;

}

function is_zombie()
{
	return $this->zombie;
}

	
}
// end of zombieBlock class
class block extends zombieBlock{
	var $number;
	var $color;
	
	function __construct($number, $color)
	{
	  parent::__construct(false);
	  $this->number = $number;
	  $this->color = $color;
	}
	
	function get_number {
		return $this->number;
	}
	
	function get_color {
		return $this->color;
	}
	//set block number by count of zombies
	// Input parameters ( input_metrics, row in metrics, block position in row)
	function set_number($ip_metrics, $row, $position)
	{
		$x = $position; 
		$count = 0;
		$last_row = $ip_metrics[($row - 1)];
		$next_row = $ip_metrics[($row + 1)];
	
		do{
			if is_zombie($last_row[$x])
			{
				$count++;
			}
			if is_zombie($next_row[$x])
			{
				$count++;
			}
			$x++;
		}while(($x - $poisition) <= 3);
		
		if (is_zombie($row[$position - 1]))
			{
				$count++;
			}
		if (is_zombie($row[$position + 1]))
			{
				$count++;
			}

	  if (!is_zombie($row[$position]))
	  {
		 $this->number = $count;
		 
	  }
	}
		
	function set_color {
		switch(get_number) {
			case 0:
				$this->color = 'white';
				break;
			case 1:
				$this->color = 'blue';
				break;
			case 2:
				$this->color = 'green';
				break;
			case 3:
				$this->color = 'yellow';
				break;
			case 4:
				$this->color = 'orange';
				break;
			case 5:
				$this->color = 'orange';
				break;
			case 6:
				$this ->color = 'red';
				break;
			case 7:
				$this ->color = 'red';
				break;
			case 8:
				$this ->color = 'red';
				break;		
		}
	}
	function is_zombie($block) 
	{
		if ($block)
		{
			return true;
		}
		return false;
	}
	
}
// extends base class
?>