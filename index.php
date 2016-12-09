<?php require_once('home/controlleur/controlleur.php');
$contenu='';
try {
	ctlAccueil();
} catch(Exception $e){
	echo '<p>'.$e->getMessage().'</p>';
}