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
		echo '<p><div class="logAs">Connecté en tant que '.$_POST['pseudo'].'.</p>';
	?>

	<form name="engager" id="monForm" action="#" method="post">
	   	<fieldset>
	   		<legend>Ajouter un nouvel employé</legend>
	   		<p>
	   			<label for="nvnvpseudo">Nouveau pseudo : </label>
       			<input type="text" name="nvpseudo" id="nvpseudo" required />
			</p>
			<p>
       			<label for="mdp">Mot de passe : </label>
       			<input type="password" name="nvmdp" id="nvmdp" required />
       		</p>
       		<p>
       			<label for="nvverifmdp">Veuillez verifier le mot de passe : </label>
       			<input type="password" name="nvverifmdp" id="nvverifmdp" required />
       		</p>
       		<p>
	       		<label for="categorie">Categorie : </label>
	       	
	       		<input type="radio" name="categorie" value="nvagent" id="nvagent" />
	       		<label for="agent">Agent </label><br />

	      		<input type="radio" name="categorie" value="nvmedecin" id="nvmedecin" />
	      		<label for="medecin">Medecin </label><br />

	      		<input type="radio" name="categorie" value="nvdirecteur" id="nvdirecteur" /> 
	      		<label for="directeur">Directeur </label><br />
       		</p>
       			<?php
       			echo '<p><input type="hidden" name="pseudo" id="pseudo" value="'.$pseudo.'" /><input type="hidden" name="motdepasse" id="motdepasse" value="'.$motdepasse.'" /></p>'
	   			?>

       		<p>
	   			<input type ="submit" value="Ajouter" name="boutonAjouterLogin" />
	   			<input type ="reset" value="ToutEffacer" name ="f1" />
	   		</p>
		</fieldset>
	</form>

	<form name="modifier" id="monForm2" action="#" method="post">
	   	<fieldset>
	   		<legend>Modifier un employé </legend>
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
		   			if (isset($_POST['boutonChercher'])){
		   				echo '<p>Maintnenant faites vos changements </p>';
		   				$login=$_POST['login'];
		   				CtlModifierEmploye($login); //TODO (affiche un  formulaire avec dans chaque label les parametres qu'on avait deja)
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
