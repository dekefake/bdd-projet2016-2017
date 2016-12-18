<?php
function afficherErreur($erreur){
	$contenu='<p>'.$erreur->getMessage().'</p>';
	require_once('vue/pageAccueil.php');
	
}

function afficherFormulaire(){
	$contenu="";
	require_once('vue/pageAccueil.php');
}

function afficherPageAgent(){
	$contenu="";
	require_once('vue/pageAgent.php');
}

function afficherPageDirecteur(){
	$contenu="";
	require_once('vue/pageDirecteur.php');
}

function afficherPageMedecin(){
	$contenu="";
	require_once('vue/pageMedecin.php');
}

function BonnePage(){
	if(isset($_POST['submit']) && !empty($_POST['pseudo']) && !empty($_POST['motdepasse'])){
			$pseudo=$_POST['pseudo'];
			$password=$_POST['motdepasse'];
			if(!ctlLogin($pseudo,$password)) {
				echo '<p> Mot de passe incorect</p>';
			} else {
				$categorie = getCategorieEmploye($pseudo);
				switch ($categorie) {
					case 'Medecin':
						include_once("pageMedecin.php");
						break;
					case 'Agent':
						include_once("pageAgent.php");
						break;	
					case 'Directeur':
						include_once("pageDirecteur.php");
						break;	
					default:
						echo "<p>Desolé, vous ne semblez pas etre un employé de la clinique.</p>";
						break;
				}
			}
		} else {//Donc il est arrrivé ici car il a cliqué sur sur envoyer
		ctlAccueil();
	}
}