<?php

//Gestion du paramètre agence filtrage via url
if(isset($_GET['agence'])){ 	
	$datas = agence($_GET['agence']);
	$agence=$_GET['agence'];
}
else {
	$datas = active();
}

//gestion du paramètre de temps dans l'url
if(isset($_GET['time']) && $_GET['time'] != '') {
	$time = $_GET['time'];}
else $time = 3; //par défault à 3s


//
//include de la view
include_once('views/index.php');
?>

