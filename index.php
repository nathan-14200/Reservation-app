<?php
	var_dump($_POST);
	session_start();
	include_once 'Controlers/controler.php';
	
	$controler = new Controler();
	$controler->route();
?>