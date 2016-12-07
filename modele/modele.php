<?php

function getConnect(){
	require_once('modele/connect.php');
 	$connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
 	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 	$connexion->query('SET NAMES UTF8');
 	return $connexion;
}

function recupererTypeEmploye($user,$pass){
	$connexion=getConnect();
	$requete="select Categorie from Employes where (Login==$user AND MDP==$pass)";
	$resultat=$connexion->query($requete);
 	$resultat->setFetchMode(PDO::FETCH_OBJ);
 	$employe=$resultat->fetchall();
 	$resultat->closeCursor();
 	return $employe;
}
function ctlLogin($pseudo,$password){
	$connexion=getConnect();
	$requete="select Login from Employes where (Login==$pseudo)";
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	return($password=="select MDP from Employes where (Login==$pseudo)");
}
