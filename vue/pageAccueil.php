<!DOCTYPE html>
<html lang="fr">
    <head>
      <title>Ma page</title>
      <meta charset="utf-8">
	  <link rel="stylesheet"  href="style.css" />
	  
    </head>
    
	<body>
		<h1>Bonjour et bienvenue sur le site de la clinique </h1>
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
			</fieldset>

	<?php 
	if(!isset($_POST['Submit']||log==false)){ //Si il na pas cliqué sur connexion
		ctlAccueil();
	
	}elseif{//Donc il est arrrivé ici car il a cliqué sur sur envoyer
		if(!ctlLogin($pseudo,$password)) {echo '<p> Mot de passe incorect</p>';
		}else{//donc il a pu se loger
			log=true;//Cela permetra a la page de ne pas reaficher ctlAcceuil des qu'on fait une autre requette et meme de créer un bouton Deconnexion dans le header
			switch (Categorie($pseudo)) {
				case 'medecin':
					include("pageMedecin.php");
					break;
				
			case 'agent':
					include("pageAgent.php");
					break;
				
			case 'directeur':
					include("pageDirecteur.php");
					break;
				
				default:
					echo "Desolé, vous ne semblez pas etre un employé de la clinique";
					break;
			}

		}
	}
	?>
		<?php
		echo $contenu;
		?>
	</div>

	</body>

</html>
