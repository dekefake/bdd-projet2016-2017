<?php require_once('controlleur/controlleur.php');
$contenu='';
try {
	if(isset($_POST['submit']) && !empty($_POST['pseudo']) && !empty($_POST['motdepasse'])){
		$user=$_POST['pseudo'];
		$pass=$_POST['motdepasse'];
		$categorie=recupererTypeEmploye($user,$pass);
		$contenu.='<p>'.$categorie->Categorie.'</p>'; // A ce stade, je pense que $contenu contient Agent, Medecin,
		// ou directeur. Faudra vérifier, g pas réussi a tester :)
	} else {
		require_once('vue/gabarit.php');
	}
} catch(Exception $e){
	$msg=$e->getMessage();
}