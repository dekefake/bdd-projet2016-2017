<?php require_once('controlleur/controlleur.php');
$contenu='';
try {
	if(isset($_POST['submit']) && !empty($_POST['pseudo']) && !empty($_POST['motdepasse'])){
		require_once('vue/gabarit.php');
		$user=$_POST['pseudo'];
		$pass=$_POST['motdepasse'];
		$categorie=recupererTypeEmploye($user,$pass);
		foreach ($categorie as $ligne){
			echo '<p>Categorie : '.$categorie.'.</p>';
		}
		
	} else {
		require_once('vue/gabarit.php');
	}
} catch(Exception $e){
	$msg=$e->getMessage();
}