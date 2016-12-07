<?php
function afficherErreur($erreur){
	$contenu='<p>'.$erreur->getMessage().'</p>';
	require_once('gabarit.php');
	
}

function afficherFormulaire(){
	$contenu="";
	require_once('gabarit.php');
}

