<?php require_once('controller/controller.php');
try {
	if(isset($_POST['submit']) && !empty($_POST['pseudo']) && !empty($_POST['motdepasse'])){
		$user=$_POST['pseudo'];
		$msg=$_POST['motdepasse'];
		$categorie=recupererTypeEmploye(); // A ecrire
	} else {
		require_once('vue/gabarit.php');
	}
} catch(Exception $e){
	$msg=$e->getMessage();
}