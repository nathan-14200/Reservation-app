<?php
	var_dump($_POST);
	
	session_start();
	var_dump($_SESSION);
	include_once 'Controlers/controler.php';
	
	$controler = new Controler();
	$controler->route();
?>