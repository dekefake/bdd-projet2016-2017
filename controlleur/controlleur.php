<?php 
require_once('modele/modeleAccueil.php');
require_once('vue/vue.php');

function ctlLogin($pseudo,$password){
	try{
		return($password==getEmploye($pseudo)->MDP);
	}
	catch(Exception $e){
		afficherErreur($e);
	}
}

function ctlAgent($pseudo,$motdepasse){
	require_once('modele/modeleAgent.php');
	if(isset($_POST['synthesePatient'])){
		$nss = $_POST['nssSynthese'];
		try{
			$patient = getClient($nss);
			$historique = getHistoriqueClient($nss);
			afficherSynthese($patient,$historique);
		}catch(Exception $e){
			afficherErreurAgent($e);
		}
	}
	else if(isset($_POST['logOut'])) ctlAccueil();
	else afficherPageAgent();

	
}
function CtlModifierEmploye($pseudo,$motdepasse){
	//VERIFIER QUE LOGIN EST BIEN COMPRIS DANS LES TABLES
	require_once('modele/modeleDirecteur');
	modifierEmploye($login);
}

function ctlMedecin($pseudo,$motdepasse){
	require_once('modele/modeleMedecin.php');
	afficherPageMedecin();
}

function ctlDirecteur($pseudo,$motdepasse){
	require_once('modele/modeleDirecteur.php');
	afficherPageDirecteur($pseudo,$motdepasse);
}

function ctlAccueil(){
	afficherFormulaire();
}

function ctlBonnePage($pseudo,$motdepasse){
	$employe = getEmploye($pseudo);
	$categorie = $employe->Categorie;
	switch ($categorie) {
		case 'Medecin':
			ctlMedecin($pseudo,$motdepasse);
			break;
		case 'Agent':
			ctlAgent($pseudo,$motdepasse);
			break;	
		case 'Directeur':
			ctlDirecteur($pseudo,$motdepasse);
			break;	
		default:
			echo "<p>Desolé, vous ne semblez pas etre un employé de la clinique.</p>";
			break;
	}
}

