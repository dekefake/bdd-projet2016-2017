<!DOCTYPE html>
<html lang="fr">
    <head>
      <title>Ma page</title>
      <meta charset="utf-8">
	  <link rel="stylesheet"  href="style.css" />
	  
    </head>
    
	<body>
	<h1>Bonjour et bienvenue sur le site de la clinique </h1>
	<div>
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
		echo $contenu;
		?>
	</div>

	</body>

</html>
