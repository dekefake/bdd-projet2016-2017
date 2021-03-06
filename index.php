<?php 

require_once('controlleur/controlleur.php');

try{
	if(isset($_POST['pseudo']) && isset($_POST['motdepasse'])){
		$pseudo = $_POST['pseudo'];
		$motdepasse = $_POST['motdepasse'];
		if(ctlLogin($pseudo,$motdepasse)){
			if(isset($_POST['modifClient'])){
				modifClient($_POST['nssModif'],$pseudo,$motdepasse);
			}

			if(isset($_POST['depot'])){
				$nss = $_POST['depotNSS'];
				$montant = $_POST['depotMontant'];
				ctlDepot($nss,$montant);
			}


			if(isset($_POST['ajouterRDV'])){
				$date = $_POST['newDate'];
				$heure = $_POST['newHeure'];
				$id = $_POST['idMedecin'];
				$nss = $_POST['newNSSClient'];
				$CR = $_POST['compteRendu'];
				$intitule = $_POST['newIntitule'];
				$suivi = $_POST['suivi'];
				$paye = false; 
				ctlnouveauRendezVous($date,$heure,$id,$nss,$intitule,$CR,$suivi,$paye);
			}

			if(isset($_POST['boutonChoix'])){
				$type = $_POST['type'];
				if ($type == "nom" ){
					afficherPlanningViaNom($pseudo,$motdepasse);
				}else{
					affiherPlanningViaDate($pseudo,$motdepasse);
				}
			}

			if(isset($_POST['boutonAfficherEDTNom'])){
				$nom = $_POST['nom'];
				ctlAfficherEDTNom($nom);
			}

			if(isset($_POST['boutonAfficherEDTDate'])){
				$date = $_POST['date'];
				ctlAfficherEDTNom($date);
			}


			if(isset($_POST['boutonModifClient'])){
				$nom = $_POST['modifNomClient'];
				$prenom = $_POST['modifPrenomClient'];
				$date = $_POST['modifDateClient'];
				$adresse = $_POST['modifAdressClient'];
				$tel = $_POST['modifTelClient'];
				$mail = $_POST['modifMailClient'];
				$profesion = $_POST['modifProfClient'];
				$situationfamiliale = $_POST['modifSFClient'];
				$nss=$_POST['modifNSSClient'];
				$solde = $_POST['modifSoldeClient'];
				ctlUpdateClient($nom,$prenom,$date,$adresse,$tel,$mail,$profesion,$situationfamiliale,$nss,$solde);
			}
			if(isset($_POST['logOut'])){
				ctlAccueil();
			}

			if(isset($_POST['boutonCreerActe'])){
				$intitule = $_POST['intitule'];
				$categorie = $_POST['categorie'];
				$prix = $_POST['prix'];
				$consigne = $_POST['consigne'];
				ctlCreerActe($intitule,$categorie,$prix,$consigne);
			}

			if(isset($_POST['boutonAjouterLogin'])){
				$log = $_POST['nvpseudo'];
				$pass = $_POST['nvmdp'];
				$categorie = $_POST['nvcategorie'];
				if($categorie=='Medecin'){
					$specialite = $_POST['nvspecialite'];
					ctlAjouterMedecin($log,$pass,$categorie,$specialite);
				}else{
					ctlAjouterEmploye($log,$pass,$categorie);
				}
			}	

			if(isset($_POST['boutonAjouterClient'])){
				$nom = $_POST['nvNomClient'];
				$prenom = $_POST['nvPrenomClient'];
				$date = $_POST['nvDateClient'];
				$adresse = $_POST['nvAdressClient'];
				$tel = $_POST['nvTelClient'];
				$mail = $_POST['nvMailClient'];
				$profession = $_POST['nvProfClient'];
				$sf = $_POST['nvSFClient'];
				$nss = $_POST['nvNSSClient'];
				$solde = $_POST['nvSoldeClient'];
				ctlAjouterClient($nom,$prenom,$date,$adresse,$tel,$mail,$profession,$sf,$nss,$solde);
			}

			if(isset($_POST['synthesePatient'])){
				$nss = $_POST['nssSynthese'];
				try{
					$patient = getClient($nss);
					$historique = getHistoriqueClient($nss);
					CtlAfficherSynthese($patient,$historique);
				}catch(Exception $e){
					afficherErreurAgent($e);
				}
			}
			ctlBonnePage($pseudo,$motdepasse);
		}else{
			ctlAccueil();
			echo 'Mot de passe incorrect.';
	}
	}else{
	ctlAccueil();
}
}catch(Exception $e){
	ctlAccueil();
	afficherErreur($e);
}

