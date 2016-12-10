<?php
function getID($nom){
	require_once('modele/modeleAccueil.php');
	try{
		$connexion=getConnect();
		$resultat=$connexion->query("SELECT * FROM Employes WHERE Login='".$nom."'");
		$resultat->setFetchMode(PDO::FETCH_OBJ);
	}catch (Exception $e){
		afficherErreur($e); //FAIRE LA METHODE 
	}
}

function getPlanning($IDMedecin){
	require_once('modele/modeleAccueil.php');
	try{
		$connexion=getConnect();
		$resultat=$connexion->query("SELECT * FROM Employes WHERE ID='$IDMedecin'");
		if($resultat->rowCount()==0|| $resultat->categorie!='Medecin') 
			throw new Exception(' medecin n\'existe pas');
		$resultat->setFetchMode(PDO::FETCH_OBJ);
	}catch (Exception $e){
		afficherErreur($e); //FAIRE LA METHODE 
	}

	$resultat=$connexion->query("SELECT * FROM Employes natural join RendezVous) where id='$IDMedecin'order by date");
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$planning = $resultat->fetchall();
	$resultat->closeCursor();
	return($planning);
}

	
	
	
