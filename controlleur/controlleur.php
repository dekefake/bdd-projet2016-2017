<?php 
require_once('modele/modeleAccueil.php');
require_once('vue/vue.php');

function ctlLogin($pseudo,$password){
	$connexion=getConnect();
	try{
		return($password==getEmploye($pseudo)->MDP);
	}
	catch(Exception $e){
		afficherErreur($e);
	}
}

function ctlAgent(){
	require_once('modele/modeleAgent.php');
	afficherPageAgent();
}

function ctlMedecin(){
	require_once('modele/modeleMedecin.php');
	afficherPageMedecin();
}

function ctlDirecteur(){
	require_once('modele/modeleDirecteur.php');
	afficherPageDirecteur();
}