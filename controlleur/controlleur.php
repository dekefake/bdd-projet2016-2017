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

function ctlAgent(){
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
CtlModifierEmploye($login){
	//VERIFIER QUE LOGIN EST BIEN COMPRIS DANS LES TABLES
	require_once('modele/modeleDirecteur');
	modifierEmploye($login);
}

function ctlMedecin(){
	require_once('modele/modeleMedecin.php');
	afficherPageMedecin();
}

function ctlDirecteur(){
	require_once('modele/modeleDirecteur.php');
	afficherPageDirecteur();
}

function ctlAccueil(){
	afficherFormulaire();
}

function ctlBonnePage($pseudo){
	$employe = getEmploye($pseudo);
	$categorie = $employe->Categorie;
	switch ($categorie) {
		case 'Medecin':
			ctlMedecin();
			break;
		case 'Agent':
			ctlAgent();
			break;	
		case 'Directeur':
			ctlDirecteur();
			break;	
		default:
			echo "<p>Desolé, vous ne semblez pas etre un employé de la clinique.</p>";
			break;
				}
}

