<?php 

require_once('controlleur/controlleur.php');

try{
	if(isset($_POST['pseudo']) && isset($_POST['pseudo'])){
		$pseudo = $_POST['pseudo'];
		$motdepasse = $_POST['motdepasse'];
		if(ctlLogin($pseudo,$motdepasse)){
			ctlBonnePage($pseudo,$motdepasse);
		}
		else{
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

