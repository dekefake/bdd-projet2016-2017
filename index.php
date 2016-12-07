<?php require_once('controlleur/controlleur.php');
$contenu='';
try {
	ctlAccueil();
} catch(Exception $e){
	echo '<p>'.$e->getMessage().'</p>';
}