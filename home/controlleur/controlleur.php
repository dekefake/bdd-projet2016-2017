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
				
				if($employe->Categorie=='Agent' || $employe->Categorie=='Medecin' || $employe->Categorie=='Directeur'){
					echo '<p>Bienvenue, '.$pseudo.'</p>
					<form method="post" action="'.$employe->Categorie.'/index.php">
						<input type="hidden" name="login" id="login" value="'.$pseudo.'">
	   					<input type="submit" value="Cliquez ici pour acceder a votre page perso" name="submit" />
	   				</form> ';
				} else {
					echo '<p> Intru</p>';
				}
			}
		}
	} catch(Exception $e){
		afficherErreur($e);
	}
}