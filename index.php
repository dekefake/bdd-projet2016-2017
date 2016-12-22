<?php 

require_once('controlleur/controlleur.php');

try{
	if(isset($_POST['submit'])){
		$pseudo = $_POST['pseudo'];
		$motdepasse = $_POST['motdepasse'];
		if(ctlLogin($pseudo,$motdepasse)){
			ctlBonnePage($pseudo);
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

