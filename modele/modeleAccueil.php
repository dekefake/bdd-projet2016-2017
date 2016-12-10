<?php

function getConnect(){
	require_once('modele/connect.php');
 	try{
 		$connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
 		$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 		$connexion->query('SET NAMES UTF8');
 	}
 	catch(Exception $e)
 	{
 		afficherErreur($e);
 	}
 	return $connexion;
}


function getEmploye($pseudo){
	try{
		$connexion=getConnect();
		$resultat=$connexion->query("SELECT * FROM Employes WHERE Login='$pseudo'");
	}catch(Exception $e){
		afficherErreur($e);
	}
	if($resultat->rowCount()==0) throw new Exception('Cet employé n\'existe pas');
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$employe = $resultat->fetch();
	$resultat->closeCursor();
	return($employe);
}