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
		elseif(isset($_POST['validate'])){
			$this->validate();
		}
		elseif(isset($_POST['destroy']))
		{
			$this->destroy();
		}
		
		else
		{
			$this->home();
		}
		
	}
	
	
	private function home()
	{
		$mysqli = new mysqli("localhost", "root", "", "reservation_data" ) or
		die("Could not connect to database");
		$query_res = "SELECT * FROM reservation";
		$data_res = $mysqli->query($query_res);
		$query_pas = "SELECT * FROM passenger";
		$data_pas = $mysqli->query($query_pas);
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
		//error counter back to zero
		if(isset($_SESSION['error']['passenger']))
		{
			$error = $_SESSION['error']['passenger'];
			unset($error);
		}
		
		$res = unserialize($_SESSION['res']);
		
		$num = $res-> get_num();
		
		if(isset($_POST['firstname']) && isset($_POST['age']) && isset($_POST['lastname']))
		{
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$age = $_POST['age'];
		
			if(is_numeric($age) && is_string($firstname) && is_string($lastname))
			{
				$p = new passenger($firstname, $lastname, $age);
				$res -> add_passenger($p);
				
				$num -= 1;
				$res->set_num($num);
				
				$_SESSION['res'] = serialize($res);
				
				if($num >= 1)
				{
					include 'Views/passenger.php';
				}
				else{
					include 'Views/recap.php';
				}
			}
			else{
				$this->error_passenger();
			}
		}
		else{
			$this->error_passenger();
		}
		
		//Doit etre charger le meme nombre de fois que de passagers indiqués
		//Verifie que les valeurs données sont correctes sinon renvoie la page
		// Renvoie la vue passenger sinon passe au résumé de la reservation
	}
	
	
	private function recap()
	{
		include 'Views/recap.php';
	}
	
	
	private function validate()
	{
		//Enregistrer les données en MySQL
		$mysqli = new mysqli("localhost", "root", "", "reservation_data" ) or
		die("Could not connect to database");
		$res = unserialize($_SESSION['res']);
		$pas_list = $res->get_passengers();
		//Set reservation
		$destination = $res->get_destination();
		$insurance = $res->get_insurance();
		$queryres = "INSERT INTO reservation(destination, insurance)
		VALUES('$destination', '$insurance')";
		
		if($mysqli->query($queryres) == TRUE)
			{
				echo "Successfully added";
			}
		else{
			echo"Error insert destination " . $mysqli->error;
		}
		
		//Get id from reservation
		$id_res = $mysqli->insert_id;
		
		//Set passengers in database
		foreach($pas_list as $pas)
		{
			$firstname = $pas->get_firstname();
			$lastname = $pas->get_lastname();
			$age = $pas->get_age();
			$querypas = "INSERT INTO passenger ( id_res, firstname, lastname, age)
			VALUES($id_res, '$firstname', '$lastname', $age)";
			
			if($mysqli->query($querypas) == TRUE)
			{
				echo "Successfully added";
			}
			else{
				echo"Error insert passenger " . $mysqli->error;
			}
		}
	
	$mysqli->close();	
	$this->home();
	}
	
	
	private function error_passenger()
	{
		$_SESSION['error']['passenger'] = "wrong input for the passenger";
		include 'Views/passenger.php';
	}
	
	private function destroy()
	{
		session_destroy();
		$this->home();
	}
	
}

?>