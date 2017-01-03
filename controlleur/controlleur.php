 <?php 
require_once('modele/modeleAccueil.php');
require_once('vue/vue.php');
require_once('modele/modeleAgent.php');
require_once('modele/modeleDirecteur.php');
require_once('modele/modeleMedecin.php');

function ctlLogin($pseudo,$password){
	try{
		return($password==getEmploye($pseudo)->MDP);
	}
	catch(Exception $e){
		afficherErreur($e);
	}
}
function ctlDepot($nss,$montant){
	if($montant<0){
		echo '<p> Désolé le montant est incorect...</p>';	
}else{
		depot($nss,$montant);
	}
}

function ctlAjouterMedecin($login,$mdp,$categorie,$specialite){
	nouveauMedecin($login,$mdp,$categorie,$specialite);
}

function ctlAjouterEmploye($login,$mdp,$categorie){
	nouvelEmploye($login,$mdp,$categorie);
}
function ctlUpdateClient($nom,$prenom,$date,$adresse,$tel,$mail,$profesion,$situationfamiliale,$nss,$solde){
	updateClient($nom,$prenom,$date,$adresse,$tel,$mail,$profesion,$situationfamiliale,$nss,$solde);
}

function ctlnouveauRendezVous($date,$heure,$id,$NSS,$intitule,$compteRendu,$suivi,$paye){
	if(creneauLibre($id,$date,$heure)){
		nouveauRendezVous($date,$heure,$id,$NSS,$intitule,$compteRendu,$suivi,$paye);
	}else{
		echo'<p>Désolé le créneau souhaité n\'est pas libre</p>';
	}
}

function ctlAfficherEDTNom($nom){
	//TODO
	afficherEDTNom($nom);
}

function ctlAjouterClient($nom,$prenom,$date,$adresse,$tel,$mail,$profession,$sf,$nss,$solde){
	nouveauClient($nom,$prenom,$date,$adresse,$tel,$mail,$profession,$sf,$nss,$solde);
}


function ctlCreerActe($intitule,$categorie,$prix,$consigne){
	if ($prix<0){
		echo 'Prix negatif';
	}else{
		creerActe($intitule,$categorie,$prix,$consigne);
	}
}

function ctlAgent($pseudo,$motdepasse){
	afficherPageAgent($pseudo,$motdepasse);
}

function CtlModifierEmploye($pseudo,$motdepasse){
	//VERIFIER QUE LOGIN EST BIEN COMPRIS DANS LES TABLES
	modifierEmploye($login);
}

function ctlMedecin($pseudo,$motdepasse){
	// $id=getEmploye($pseudo)->ID;
	// $planning=getPlanning($id);
	afficherPageMedecin($pseudo,$motdepasse,null);
}

function ctlDirecteur($pseudo,$motdepasse){
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

function CtlAfficherSynthese($patient,$historique){
	afficherSynthese($patient,$historique);
}

