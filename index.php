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
				$solde = $_POST['modifSoldeClient'];
				ctlModifClient($nom,$prenom,$date,$adresse,$tel,$mail,$profesion,$situationfamiliale,$solde);
			}
			if(isset($_POST['modifClient'])){
				$nss = $_POST['nssModif'];
				modifClient($nss,$_POST['pseudo'],$_POST['motdepasse']);
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

