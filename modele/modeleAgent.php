<?php

function nouveauClient($nom,$prenom,$dateNaissance,$adresse,$numTel,$mail,$profession,$situationFamiliale,$clientNSS,$solde){
	require_once('modele/modeleAccueil.php');

	try{
		$connexion=getConnect();
		$requete="INSERT INTO Clients VALUES('".$nom."','".$prenom."','".$dateNaissance."','".$adresse."','".$numTel."','".$mail."','".$profession."','".$situationFamiliale."','"."','".$clientNSS."','".$solde."')";
		$resultat=$connexion->query($requete);
		$resultat->closeCursor();

	}
	catch(Exception $e){
		exit($e->getMessage());
	}
}

function modifClient($nss){
	require_once('modele/modeleAccueil.php');
	$client= getClient($nss);
	$ligne='
					<fieldset><form method="post" action="#"><select><p>
						<label for="Nom">Nom du client : </label>
						<input type="text" name="modifNomClient" id="nvNomClient" value="'. $client->Nom .'" required />
					</p>
					<p>
						<label for="Prenom">Prenom du client : </label>
						<input type="text" name="modifPrenomClient" id="nvPrenomClient" value="'. $client->Prenom .'" required />
					</p>
					<p>
						<label for="BithdayDate">Date de naissance : </label>
						<input type="Date" name="modifDateClient" id="nvDateClient" value="'. $client->dateNaissance .'" required />
					</p>
					<p>
						<label for="Adresse">Adresse : </label>
						<input type="text" name="modifAdressClient" id="nvAdress"Client" value="'. $client->Adresse .'"required />
					</p>
					<p>
						<label for="NumTel">"Numero de Telephone : </label>
						<input type="tel" name="modifTelClient" id="nvTelClient" value="'. $client->NumTel .'" required />
					</p>
					<p>
						<label for="Mail">"Mail : </label>
						<input type="Mail" name="modifMailClient" id="nvMailClient" value="'. $client->Mail .'"required />
					</p>
					<p>
						<label for="Profession">"Profession : </label>
						<input type="text" name="modifProfClient" id="nvProfClient" value="'. $client->Profession .'">
					</p>
					<p>
						<label for="SituationFamilliale">"Situation Familliale : </label>
						<input type="text" name="modifSFClient" id="nvSFClient" value="'. $client->SituationFamilliale .'">
					</p>
					<p>
						<label for="NSS">"Numéro de Sécuritée Sociale : </label>
						<input type="number" name="modifNSSClient" id="nvNSSclient" value="'. $client->ClientNSS .'">
					</p>
					<p>
						<label for="Solde">"Solde : </label>
						<input type="number" name="modifSoldeClient" id="nvSoldeClient" value="'. $client->Solde .'">
					</p>

					<p>
		   			<input type ="submit" value="ModifClient" name="boutonModifClient" />
		   			<input type ="reset" value="ToutEffacer" name ="f1" />
		   			</p></select></form></fieldset>
	';
}

function getClient($nss){
	require_once('modele/modeleAccueil.php');
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
	require_once('modele/modeleAccueil.php');
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
	require_once('modele/modeleAccueil.php');
	try{
		$connexion=getConnect();
		$resultat=$connexion->query("SELECT * FROM Rendez-vous NATURAL JOIN Actes NATURAL JOIN Employes WHERE ClientNSS=".$nss." AND Categorie='Medecin'");
	}catch(Exception $e){
		afficherErreur($e);
	}
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$historique = $resultat->fetchAll();
	$resultat->closeCursor();
	return($historique);
}

function setSolde($nss,$montant){
	require_once('modele/modeleAccueil.php');
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
	require_once('modele/modeleAccueil.php');
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