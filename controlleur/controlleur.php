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
function ctlUpdateClient($nom,$prenom,$date,$adresse,$tel,$mail,$profesion,$situationfamiliale,$nss,$solde){
	require_once('modele/modeleAgent.php');
	updateClient($nom,$prenom,$date,$adresse,$tel,$mail,$profesion,$situationfamiliale,$nss,$solde);
}

function ctlAgent($pseudo,$motdepasse){
	require_once('modele/modeleAgent.php');
	afficherPageAgent($pseudo,$motdepasse);
}

function ctlSynthese($nss){
	try{
		$patient = getClient($nss);
		$historique = getHistoriqueClient($nss);
		afficherSynthese($patient,$historique);
	}catch(Exception $e){
		afficherErreurAgent($e);
	}
}

function CtlModifierEmploye($pseudo,$motdepasse){
	//VERIFIER QUE LOGIN EST BIEN COMPRIS DANS LES TABLES
	require_once('modele/modeleDirecteur.php');
	modifierEmploye($login);
}

function ctlAjouterClient($nom,$prenom,$date,$adresse,$tel,$mail,$profession,$sf,$nss,$solde){
	require_once('modele/modeleAgent.php');
	nouveauClient($nom,$prenom,$date,$adresse,$tel,$mail,$profession,$sf,$nss,$solde);
}

function ctlMedecin($pseudo,$motdepasse){
	require_once('modele/modeleMedecin.php');
	afficherPageMedecin($pseudo,$motdepasse);
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

