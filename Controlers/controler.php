<?php
class Controler
{
	public function route()
	{
		if(isset($_POST['new']))
		{
			$this->new_reservation();			
		}
		
		else
		{
			$this->home();
		}
		
	}
	
	
	private function home()
	{
		include'Views/home.php';
	}
	
	private function new_reservation()
	{
		include'Views/reservation.php';		
	}
	
	
	private function destination()
	{
		if(isset($_POST['destination']) && isset($_POST['num']))
		{
			$num = $_POST['num'];
			$destination = $_POST['destination'];
			
			if(gettype(num) == 'int' && num >= 1 && num <=10 && gettype(destination) == 'string')
			{
				
			}
		}
	}
	
	
}

?>