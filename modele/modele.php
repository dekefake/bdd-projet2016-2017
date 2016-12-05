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
	$requete="select * from Employes where (Login==$user AND MDP==$pass)";
	$resultat=$connexion->query($requete);
 	$resultat->setFetchMode(PDO::FETCH_OBJ);
 	$employe=$resultat->fetchall();
 	$resultat->closeCursor();
 	return $employe;
}
