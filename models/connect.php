<?php

	$host = 'localhost';
	$db = 'coursdev';
	$user = 'coursdev';
	$pwd = 'deveemi';
	$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	$connect = null;

	try {
		$con = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pwd, $options);
		
	}
	catch(Exception $e) {
	    echo 'Error : '.$e->getMessage();
	}

?>