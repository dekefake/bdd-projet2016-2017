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

function ctlAccueil(){
	try {
		afficherFormulaire();
		if(isset($_POST['submit']) && !empty($_POST['pseudo']) && !empty($_POST['motdepasse'])){
		
			$pseudo=$_POST['pseudo'];
			$password=$_POST['motdepasse'];
		
			if(!ctlLogin($pseudo,$password)) {echo '<p> Mot de passe incorect</p>';
			}
			else {
				$employe = getEmploye($pseudo);
				
				if($employe->Categorie=='Agent' || $employe->Categorie=='Medecin' || $employe->Categorie=='Directeur'){
					echo '<p>Bienvenue, '.$pseudo.'<br>fonction : '.$employe->Categorie.'</p>
					<form method="post" action="index.php">
						<input type="hidden" name="connexionvalidepseudo" id="connexionvalidepseudo" value="'.$pseudo.'">
						<input type="hidden" name="connexionvalidecategorie" id="connexionvalidecategorie" value="'.$employe->Categorie.'">
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