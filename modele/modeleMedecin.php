<?php

require_once('modele/modeleAccueil.php');

function getID($pseudo){
	try{
		$employe=getEmploye($pseudo);
		return $employe->ID;
	}catch (Exception $e){
		afficherErreur($e);
	}
}

function getPseudo ($ID){
	try{
		$employe=getEmploye($pseudo);
		return $employe->Login;
	}catch (Exception $e){
		afficherErreur($e); 
	}
}

function nouveauRendezVous($date,$heure,$ID,$NSS,$intitule,$compteRendu,$suivi,$paye){

	$planning = getPlanning($ID);
	if(!creneauLibre($ID,$date,$heure)){
		throw new Exception("Ce médecin n'est pas libre sur cette tranche horraire.");
	}
	try{
		$connexion=getConnect();
		$requete="INSERT INTO `Rendez-vous` VALUES('$date','$heure','$ID','$NSS','$intitule','$compteRendu','$suivi','$paye')";
		$resultat=$connexion->query($requete);
		$resultat->closeCursor();
	}catch (Exception $e){
		afficherErreur($e);
	}
}

function creneauLibre($id,$date,$heure){
	$planning = getPlanning($id);
	foreach($planning as $rdv){
		if($rdv->Date == $date && $rdv->Heure == $heure) return false;
	}
	return true;
}

function getPlanning($id){
	$connexion=getConnect();
	$resultat=$connexion->query("SELECT * FROM `Rendez-vous` WHERE ID='".$id."'ORDER BY Date");
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$planning = $resultat->fetchall();
	$resultat->closeCursor();
	return($planning);
}