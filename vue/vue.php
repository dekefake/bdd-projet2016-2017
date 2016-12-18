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

function afficherPageAccueil(){
	$contenu="";
	require_once('vue/pageAccueil.php');
}

