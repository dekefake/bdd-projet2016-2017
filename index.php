<?php require_once('controlleur/controlleur.php');
$contenu='';
try {
	if(isset($_POST['submit']) && !empty($_POST['connexionvalidepseudo']) && !empty($_POST['connexionvalidecategorie'])){
		$categorie=$_POST['connexionvalidecategorie'];

		if($categorie=='Medecin'){
			CtlMedecin();
		}
		if($categorie=='Agent'){
			CtlAgent();
		}
		if($categorie=='Directeur'){
			CtlDirecteur();
		}
		// Switch a éviter, il entre dans tous les cas d'un switch et affiche les trois pages
		
	} else {
		ctlAccueil();
	}
} catch(Exception $e){
	echo '<p>'.$e->getMessage().'</p>';
}