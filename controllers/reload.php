<?php
//include du modèle
include_once('../models/main.php');


if (isset($_POST['action']) && $_POST['action'] == 'reload')
{
	if(isset($_GET['agence'])){ 	
		$datas = agence($_GET['agence']);
		$agence=$_GET['agence'];
	}
	else {
		$datas = active();
	}

	if(isset($_POST['time']) && $_POST['time'] != '') $time = $_POST['time'];
	else $time = 3;

	//
	//include de la view
	include_once('../views/index.php');

}
else{

}

?>