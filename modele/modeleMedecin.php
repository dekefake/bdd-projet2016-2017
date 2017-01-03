<?php

require_once('modele/modeleAccueil.php');

function getID($pseudo){
	try{
		$connexion=getConnect();
		$resultat=$connexion->query("SELECT * FROM Employes WHERE Login='".$pseudo."'");
		$resultat->setFetchMode(PDO::FETCH_OBJ);
		//ET LE RETURN MARIN ??
	}catch (Exception $e){
		afficherErreur($e); //FAIRE LA METHODE 
	}
}

function getPseudo ($ID){
	try{
		$connexion=getConnect();
		$resultat=$connexion->query("SELECT * FROM Employes WHERE ID='".$ID."'");
		$resultat->setFetchMode(PDO::FETCH_OBJ);
		//ET LE RETURN MARIN ??
	}catch (Exception $e){
		afficherErreur($e); //FAIRE LA METHODE 
	}
}

function nouveauRendezVous($date,$heure,$ID,$NSS,$intitule,$compteRendu,$suivi,$paye){

	$planning = getPlanning($id);
	foreach($rdv as $planning){
		if($rdv->date == $date && $rdv->heure == $heure) throw new Exception("Ce médecin n'est pas libre sur cette tranche horraire.");
	}

	try{
		$connexion=getConnect();
		$resultat=$connexion->query("INSERT INTO Rendez-vous VALUES('".$date."','".$heure."','".$ID."','".$NSS."','".$intitule."','".$compteRendu."','".$suivi."','".$paye."')");
	}catch (Exception $e){
		afficherErreur($e); //FAIRE LA METHODE 
	}
	$resultat->closeCursor();
}

function crenauLibre($id,$date,$heure){
	$planning = getPlanning($id);
	foreach($rdv as $planning){
		if($rdv->Date == $date && $rdv->Heure == $heure) return False;
	}
	return True;
}

function getPlanning($id){
	$connexion=getConnect();
	$resultat=$connexion->query("SELECT * FROM Rendez-vous WHERE ID='".$id."'ORDER BY Date");
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$planning = $resultat->fetchall();
	$resultat->closeCursor();
	return($planning);
}