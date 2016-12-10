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

function Categorie($login){
	$employe=getEmploye($pseudo);
	return $employe->Categorie;

}

function ctlAccueil(){
	echo'<h1>Bonjour et bienvenue sur le site de la clinique </h1>
			<fieldset>
				<form method="post" action="#">
				<p>
		   			<label for ="Nom"> Nom: </label>
		   			<input type="text" name="pseudo" id="pseudo" required />
		   		</p>
		   		<p>
		   			<label for ="mdp"> Mot de passe: </label>
		   			<input type="password" name="motdepasse" id="motdepasse" required />
		   		</p>
		   		<p>
		   			<input type ="submit" value="Connexion" name="submit" />
		   			<input type ="reset" value="ToutEffacer" name ="f1"  />
		   		</p>
				</form>
			</fieldset>'
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