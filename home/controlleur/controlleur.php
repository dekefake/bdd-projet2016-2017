<?php 
require_once('home/modele/modele.php');
require_once('home/vue/vue.php');

function ctlLogin($pseudo,$password){
	$connexion=getConnect();
	try{
		return($password==getEmploye($pseudo)->MDP);
	}
	catch(Exception $e){
		afficherErreur($e);
	}
}

function ctlAccueil(){
	try {
		afficherFormulaire();
		if(isset($_POST['submit']) && !empty($_POST['pseudo']) && !empty($_POST['motdepasse'])){
		
			$pseudo=$_POST['pseudo'];
			$password=$_POST['motdepasse'];
		
			if(!ctlLogin($pseudo,$password)) {echo '<p> Mot de passe incorect</p>';
			}
			else {
				echo '<p> Bien vu</p>';
				$employe = getEmploye($pseudo);
				switch ($employe->Categorie) {
				case 'Agent':
					echo '<p> Agent</p>';
					break;
				case 'Medecin':
					echo '<p> Médecin</p>';
					break;
				case 'Directeur':
					echo '<p> Directeur</p>';
					break;
				default:
					echo '<p> Intru</p>';
					break;

				}
			}
		}
	} catch(Exception $e){
		afficherErreur($e);
	}
}