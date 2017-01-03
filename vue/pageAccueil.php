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
		   			<label for="pseudo">Nom: </label>
		   			<input type="text" name="pseudo" id="pseudo" required />
		   		</p>
		   		<p>
		   			<label for="motdepasse">Mot de passe: </label>
		   			<input type="password" name="motdepasse" id="motdepasse" required />
		   		</p>
		   		<p>
		   			<input type="submit" value="connexion" name="connexion" />
		   			<input type="reset" value="ToutEffacer" name="ToutEffacer" />
		   		</p>
				</form>
			</fieldset>*
		<p> <a href="https://1drv.ms/w/s!AgImEV58WkvDgotql87BDvAHfgTrXQ"> Le rapport de l'équipe de developement </a></p>

	<?php
		echo $contenu;
	?>

	</body>

</html>
