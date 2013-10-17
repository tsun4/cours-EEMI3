<?php
//Main.php Model 
//FUNCTION SQL ECT

try
{
	$arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $con = new PDO('mysql:host=localhost;dbname=coursdev', 'coursdev', 'deveemi', $arrExtraParam);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
  	 $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
    die($msg);
}



	 function count_datas() //Récupère le nb d'annonces qui doivent être affichés (slider utility)
	{
		global $con;
		try {
		   $requete = $con->prepare('SELECT * FROM immo_mandats WHERE MAN_WEB = :man_web');
		   $requete->execute(array('man_web' => 1));
		}
		catch (Exception $e) {
		  echo "Mysql PB".$e->getMessage();
		}

		$datas = $requete->fetchAll(PDO::FETCH_OBJ);
		$data = count($datas);
		
		return $data;
	}

	function active() //Récupère toutes les annonces et infos des annonces qui doivent être affichés
	{
		global $con;
		try {
			
		   $requete = $con->prepare('SELECT * FROM immo_mandats WHERE MAN_WEB = :man_web');
		   $requete->execute(array('man_web' => 1));
		}
		catch (Exception $e) {
		  echo "Mysql PB".$e->getMessage();
		}

		$datas  = $requete->fetchAll(PDO::FETCH_OBJ);
		
		return $datas;
	}

	function agence($id) //Récupère toutes les annonces et infos des annonces qui doivent être affichés et qui sont d'une agence définie par l'id
	{
		global $con;
		try {
		   $requete = $con->prepare('SELECT * FROM immo_mandats WHERE MAN_WEB = :man_web AND AGE_ID = :id');
		   $requete->execute(array('man_web' => 1, 'id' => $id));
		}
		catch (Exception $e) {
		  echo "Mysql PB".$e->getMessage();
		}

		$datas  = $requete->fetchAll(PDO::FETCH_OBJ);
		
		return $datas;
	}

	function get_pics($id) //Récupère les photos correspondantes à l'id d'annonce fournie/récupéré
	{
		global $con;
		try {
		   $requete = $con->prepare('SELECT * FROM immo_photos WHERE MAN_ID = :id');
		   $requete->execute(array('id'=>$id));
		}
		catch (Exception $e) {
		  echo "Mysql PB".$e->getMessage();
		}

		$datas  = $requete->fetchAll(PDO::FETCH_OBJ);
		
		return $datas;
	}

	function get_data($id) //Permet de récupérer les infos d'une annonce définie par l'id fournie
	{
		global $con;
		try {
		   $requete = $con->prepare('SELECT * FROM immo_mandats WHERE MAN_ID = :id');
		   $requete->execute(array('id'=>$id));
		}
		catch (Exception $e) {
		  echo "Mysql PB".$e->getMessage();
		}

		$data  = $requete->fetch(PDO::FETCH_OBJ);
		
		return $data;
	}


?>