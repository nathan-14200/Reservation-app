<?php
include_once 'model_passenger.php';

class reservation
{
	private $destination;
	private $num;
	private $insurance;
	private $passengers;
	
	public function __construct($dest, $n, $ins)
	{
		
		$this->destination = $dest;
		$this->num = (int)$n;
		$this->insurance = $ins;
		$this->passengers = [];
		
		
	}
	
	public function add_passenger($pass)
	{
		array_push($this->passengers, $pass);
	}
	
	public function get_num()
	{
		return $this->num;
	}
	
	public function set_num($n)
	{
		$this->num = $n;
	}
	
	public function get_destination()
	{
		return $this->destination;
	}
	
	public function get_insurance()
	{
		return $this->insurance;
	}
	
	public function get_passengers()
	{
		return $this->passengers;
	}
}
?>