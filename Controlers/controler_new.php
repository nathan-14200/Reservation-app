<?php
if($_POST['page'] == 'new')
{
	include'Views/reservation.php';
}
else{
	include 'controler_home.php';
}
?>