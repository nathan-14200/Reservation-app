<?php
	session_start();
	var_dump($_SESSION);
	
	if(!empty($_POST['page']) && is_file('Controlers/controler_'.$_POST['page'].'.php'))
	{
		echo("in it");
		include 'Controlers/controler_'.$_POST['page'].'.php';
	}
	else{
		echo("in other");
		include('Controlers/controler_home.php');
	}
?>