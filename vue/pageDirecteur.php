<!DOCTYPE html>
<html lang="fr">
    <head>
      <title>Ma page</title>
      <meta charset="utf-8">
	  <link rel="stylesheet"  href="style.css" />
	  
    </head>
    
	<body>
	<h1>Gestion de la clinique - Réservée au directeur</h1>
	<?php
		echo '<p><div class="logAs">Connecté en tant que '.$_POST['connexionvalidepseudo'].'.</p>';
	?>

	<form name="engager" id="monForm" action="#" method="post">
	   	<fieldset>
	   		<legend>Ajouter un nouvel employé</legend>
	   		<p>
	   			<label for="pseudo">Nouveau pseudo : </label>
       			<input type="text" name="pseudo" id="pseudo" required />
			</p>
			<p>
       			<label for="mdp">Mot de passe : </label>
       			<input type="password" name="mdp" id="mdp" required />
       		</p>
       		<p>
       			<label for="verifmdp">Veuillez verifier le mot de passe : </label>
       			<input type="password" name="verifmdp" id="verifmdp" required />
       		</p>
       		<p>
	       		<label for="categorie">Categorie : </label>
	       	
	       		<input type="radio" name="categorie" value="agent" id="agent" />
	       		<label for="agent">Agent </label><br />

	      		<input type="radio" name="categorie" value="medecin" id="medecin" />
	      		<label for="medecin">Medecin </label><br />

	      		<input type="radio" name="categorie" value="directeur" id="directeur" /> 
	      		<label for="directeur">Directeur </label><br />
       		</p>

       		<p>
	   			<input type ="submit" value="Ajouter" name="boutonAjouterLogin" />
	   			<input type ="reset" value="ToutEffacer" name ="f1" />
	   		</p>
	   	<?php //TODO

	   	?>
		</fieldset>
	</form>

	<form name="modifier" id="monForm2" action="#" method="post">
	   	<fieldset>
	   		<legend>Modifier employé </legend>
	   		<p>
	   			Tout d'abord choisissez le login de la personne a modifier : 
	   		</p>
	   		<p>
	   			<label for="login">Login : </label>
       			<input type="text" name="login" id="login" required />
			</p>
			<p>
				<input type ="submit" value="Chercher" name="boutonChercher" />
	   		</p>
	   		<p>
		   		<?php
		   			if (isset($_POST['boutonChercher']){
		   				echo '<p>Maintnenant faites vos changements </p>';
		   				$login=$_POST['login'];
		   				modifierEmploye($login); //TODO (affiche un  formulaire avec dans chaque label les parametres qu'on avait deja)
		   			}
		   		?>
	   		</p>
		</fieldset>
	</form>

	//TODO Actes

		//Vu comment on a fait 

	<form name="modifier" id="monForm3" action="#" method="post">
	   	<fieldset>
	   		<legend>Créer,modifier ou supprimer un element a fournir</legend>
	   		<p>
	   				//TODO pour chaques specialité afficher un texte
	   		</p>
		</fieldset>
	</form>


	<form name="modifier" id="monForm4" action="#" method="post">
	   	<fieldset>
	   		<legend>Créer,modifier ou supprimer un element a fournir</legend>
	   		<p>
	   				//TODO pour chaques specialité afficher un texte
	   		</p>
		</fieldset>
	</form>

	</body>
</html>
