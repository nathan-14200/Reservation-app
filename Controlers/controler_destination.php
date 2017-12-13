<?php
// verifier :   len $_POST = 3 ou 4
//				destination = string
//				nombre = inte
//				assurance = bool
$l = $_POST;
echo('in controler');
if(isset(l['destination'] && isset(l['num']) && isset(l['page']){
	$destination = htmlspecialchars(l['destination']);
	$num = htmlspecialchars(l['num']);
	$insurance = isset(l['insurance']);	
	echo('in');
	include '../test.php';
}
else{
	error();
}
	
	
function error(){
	$message = "Please enter a number between 1 and 10 included"
	$_SESSION['destinationError'] = message;
	include '../Views/reservation.php';
}
?>