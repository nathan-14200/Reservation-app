<?php
class Controler
{
	public function route()
	{
		include_once'Models/model_reservation.php';
		include_once'Models/model_passenger.php';
		
		if(isset($_POST['new']))
		{
			$this->new_reservation();			
		}
		elseif(isset($_POST['res'])){
			$this->destination();
		}
		elseif(isset($_POST['passenger']))
		{
			$this->passenger();
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
			
			if(isset($_POST['insurance']))
			{
				$insurance = 'oui';
			}
			else
			{
				$insurance = 'non';
			}
			
			if(is_numeric($num) && $num >= 1 && $num <=10 && is_string($destination))
			{
				$num = (int)$num;
				$destination = (string) $destination;
				$insurance = (string) $insurance;
				
				$res = new reservation($destination, $num, $insurance);
				$_SESSION['res'] = serialize($res);
				//Enregistrer la res dans la session en fonction de son ID
				include'Views/passenger.php';
			}
			
			else
			{
				$this->new_reservation();
			}
		}
		else{
			$this->new_reservation();
		}
	}
	
	
	private function passenger()
	{
		$res = unserialize($_SESSION['res']);
		$i =  $res -> get_ID();
		while($i>0)
		{
			
		
			if(isset($_POST['name']) && isset($_POST['age']))
			{
				$name = $_POST['name'];
				$age = $_POST['age'];
			
				if(is_numeric($age) && is_string($name))
				{
					$p = new passenger($name, $age);
					$res -> add_passenger($p);
					$i -= 1;
					$res->set_num($i);
				}
			}
			else{
				$_SESSION['error']['pas'] = "wrong input for the passenger";
				include 'Views/passenger.php';
			}
		}
		
		$_SESSION['res'] = serialize($res);
		include 'Views/recap.php';
		//Doit etre charger le meme nombre de fois que de passagers indiqués
		//Verifie que les valeurs données sont correctes sinon renvoie la page
		// Renvoie la vue passenger sinon passe au résumé de la reservation
	}
	
	
	private function recap()
	{
		include 'Views/recap.php';
	}
	
}

?>