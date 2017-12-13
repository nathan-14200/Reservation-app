<?php
include_once'Models/model_reservation.php';
include_once'Models/model_passenger.php';
//Enregistrer les données en MySQL
if($_POST['page'] == 'validate')
{
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
	
	include 'Controlers/controler_home.php';
}


?>