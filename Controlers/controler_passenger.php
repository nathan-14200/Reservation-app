<?php
include_once'Models/model_reservation.php';
include_once'Models/model_passenger.php';

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
?>