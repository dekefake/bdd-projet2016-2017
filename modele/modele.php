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
 		die('Erreur de connection à la bdd : '.$e->getMessage());
 	}
 	return $connexion;
}

function recupererTypeEmploye($user,$pass){
	$connexion=getConnect();
	$requete="select Categorie from Employes where (Login='$user' AND MDP=='$pass')";
	$resultat=$connexion->query($requete);
 	$resultat->setFetchMode(PDO::FETCH_OBJ);
 	$employe=$resultat->fetchall();
 	$resultat->closeCursor();
 	return $employe;
}

function ctlLogin($pseudo,$password){
	$connexion=getConnect();
	$resultat=$connexion->query("SELECT * FROM Employes WHERE Login='$pseudo'");
	if($resultat->rowCount()==0) return false;
	$resultat->setFetchMode(PDO::FETCH_OBJ);

	$bonmotdepasse = $resultat->fetch();

	$resultat->closeCursor();
	return ($password==$bonmotdepasse->MDP);
}
