<?php
session_start();

if (!empty($_POST['page']) && is_file('controlers/controler_'.$_POST['page'].'php'))
{
	include 'controlers/controler_'.$_POST['page'].'php';
}
else
{
	include 'Views/home.php';
}

?>