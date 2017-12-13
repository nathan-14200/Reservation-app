<?php
class Passenger
{
	private $firstname;
	private $lastname;
	private $age;
	
	public function __construct($firstname, $lastname, $age)
	{
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->age = $age;
	}
	
	public function get_firstname()
	{
		return $this->firstname;
	}
	
	public function get_lastname()
	{
		return $this->lastname;
	}
	
	public function get_age()
	{
		return $this->age;
	}
}

?>