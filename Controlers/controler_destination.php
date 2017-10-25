<?php
// verifier :   len $_POST = 3 ou 4
//				destination = string
//				nombre = inte
//				assurance = bool
$l = $_POST;
if(isset(l['destination'] && isset(l['num']) && isset(l['page']){
	$destination = htmlspecialchars(l['destination']);
	$num = htmlspecialchars(l['num']);
	$insurance = isset(l['insurance']);	
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