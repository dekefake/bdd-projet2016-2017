<?php 

require_once('controlleur/controlleur.php');

try{
	if(isset($_POST['pseudo']) && isset($_POST['motdepasse'])){
		$pseudo = $_POST['pseudo'];
		$motdepasse = $_POST['motdepasse'];
		if(ctlLogin($pseudo,$motdepasse)){
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
	}
	else{
		ctlAccueil();
	}
}
catch(Exception $e){

}

