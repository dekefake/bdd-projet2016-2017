<?php
function afficherErreur($erreur){
	$contenu='<p>'.$erreur->getMessage().'</p>';
	require_once('vue/pageAccueil.php');
	
}

function afficherFormulaire(){
	$contenu="";
	require_once('vue/pageAccueil.php');
}


function afficherPageDirecteur($pseudo,$motdepasse){
	$contenu="";
	require_once('vue/pageDirecteur.php');
}

function afficherPageMedecin($pseudo,$motdepasse){
	$contenu="";
	require_once('vue/pageMedecin.php');
}



function afficherPageAgent($pseudo,$motdepasse){
	$contenu='';
	require_once('vue/pageAgent.php');
}

function afficherSynthese($patient,$historique){
	$contenu = '<h3>Synthèse du patient '.$patient->ClientNSS.' </h3>';
	$contenu += '<ul><li>Nom : '.$patient->Nom.'</li><li>Prénom : '.$patient->Prenom.'</li><li>Date de naissance : '.$patient->DateNaissance.'</li><li>Adresse : '.$patient->Adresse.'</li><li>Numéro de téléphone : '.$patient->NumTel.'</li><li>Adresse mail : '.$client->Mail.'</li><li>Profession : '.$patient->Profession.'</li><li>Situation familiale : '.$patient->SituationFamiliale.'</li><li>NSS : '.$patient->ClientNSS.'</li><li>Solde : '.$patient->Solde.'€</li></ul>';
	$contenu += '<h5>Historique des consultations et actes</h5><table><tr><th>Médecin</th><th>Date</th><th>Prix</th><th>Compte rendu</th><th>Suivi</th></tr>';
	foreach($historique as $acte){
		$contenu += '<tr><td>'.$acte->Login.'</td><td>'.$acte->Date.'</td><td>'.$acte->Prix.'</td><td>'.$acte->CompteRendu.'</td><td>'.$acte->Suivi.'</td></tr>';
	}
	$contenu += '</table>';
	require_once('vue/pageAgent.php');

}

function afficherErreurAgent($erreur){
	$contenu='<p>'.$erreur->getMessage().'</p>';
	require_once('vue/pageAgent.php');
}