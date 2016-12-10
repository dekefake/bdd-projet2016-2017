<?php

function nouveau_client($nom,$prenom,$dateNaissance,$adresse,$numTel,$mail,$profession,$situationFamiliale,$clientNSS){
	require_once('modele/modeleAccueil.php');

	try{
		$connexion=getConnect();
		$requete="INSERT INTO Clients VALUES('".$nom."','".$prenom."','".$dateNaissance."','".$adresse."','".$numTel."','".$mail."','".$profession."','".$situationFamiliale."','"."','".$clientNSS."')";
		$resultat=$connexion->query($requete);
		$resultat->closeCursor();

	}
	catch(Exception $e){
		exit($e->getMessage());
	}

}