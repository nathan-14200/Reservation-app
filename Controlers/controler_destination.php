<?php
// verifier :   len $_POST = 3 ou 4
//				destination = string
//				nombre = inte
//				assurance = bool
include_once'Models/model_reservation.php';

if($_POST['page'] == 'destination' && isset($_POST['destination']) && isset($_POST['num']))
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
		include'Views/reservation.php';;
	}
}
else{
	include'Views/reservation.php';;
}
?>