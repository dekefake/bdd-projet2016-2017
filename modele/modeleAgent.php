<?php
require_once('modele/modeleAccueil.php');
function nouveauClient($nom,$prenom,$dateNaissance,$adresse,$numTel,$mail,$profession,$situationFamiliale,$clientNSS,$solde){
	try{
		$connexion=getConnect();
		$requete="INSERT INTO Clients VALUES('".$nom."','".$prenom."','".$dateNaissance."','".$adresse."','".$numTel."','".$mail."','".$profession."','".$situationFamiliale."','".$clientNSS."','".$solde."')";
		$resultat=$connexion->query($requete);
		$resultat->closeCursor();

	}
	catch(Exception $e){
		exit($e->getMessage());
	}
}

function updateClient($nom,$prenom,$date,$adresse,$tel,$mail,$profession,$situationFamiliale,$nss,$solde){
	try{
		$connexion=getConnect();
		$requete="UPDATE Clients SET Nom='$nom', Prenom='$prenom', DateNaissance='$date', Adresse='$adresse', NumTel='$tel', Mail='$mail', Profession='$profession', SituationFamiliale='$situationFamiliale', ClientNSS='$nss', Solde='$solde' WHERE ClientNSS='$nss'";
		$resultat=$connexion->query($requete);
		$resultat->closeCursor();
	}
	catch(Exception $e){
		exit($e->getMessage());
	}
}

function getClient($nss){
	try{
		$connexion=getConnect();
		$resultat=$connexion->query("SELECT * FROM Clients WHERE ClientNSS='$nss'");
	}catch(Exception $e){
		afficherErreur($e);
	}
	if($resultat->rowCount()==0) throw new Exception('Ce client n\'existe pas');
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$client = $resultat->fetch();
	$resultat->closeCursor();
	return($client);
}

function getNssClient($nom,$dateNaissance){
	try{
		$connexion=getConnect();
		$resultat=$connexion->query("SELECT * FROM Clients WHERE Nom='$nom' AND dateNaissance='dateNaissance'");
	}catch(Exception $e){
		afficherErreur($e);
	}
	if($resultat->rowCount()==0) throw new Exception('Ce client n\'existe pas');
	//TODO Gestion des homonymes
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$client = $resultat->fetch();
	$resultat->closeCursor();
	return($client->ClientNSS);
}

function getHistoriqueClient($nss){
	try{
		$connexion=getConnect();
		$resultat=$connexion->query("SELECT * FROM `Rendez-vous` NATURAL JOIN Actes NATURAL JOIN Employes WHERE ClientNSS=".$nss." AND Categorie='Medecin'");
	}catch(Exception $e){
		afficherErreur($e);
	}
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$historique = $resultat->fetchAll();
	$resultat->closeCursor();
	return($historique);
}

function setSolde($nss,$montant){
	try{
		$client = get_client($nss);
		if(($client->Solde+$montant)<0) throw new Exception('Solde insuffisant, opération annulée.');
		$connexion=getConnect();
		$nouvelleSolde = $client->Solde+$montant;
		$resultat=$connexion->query("UPDATE Clients SET Solde='$nouvelleSolde' WHERE CLientNSS='$nss'");
		$dateOperation = new Date();
		$resultat=$connexion->query("INSERT INTO HistoriqueSolde VALUES('".$nss."','".$dateOperation."','".$montant."','".$nouvelleSolde."')");
		return true;
	}catch(Excepion $e){
		afficherErreur($e);
		return false;
	}
}

function getRDVEnAttente(){
	try{
		$connexion=getConnect();
		$resultat=$connexion->query("SELECT * FROM Rendez-vous WHERE Paye=false");
	}catch(Exception $e){
		afficherErreur($e);
	}
	if($resultat->rowCount()==0) throw new Exception('Tous les actes et consultations ont été payés.');
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$rdv = $resultat->fetch();
	$resultat->closeCursor();
	return $rdv;
}