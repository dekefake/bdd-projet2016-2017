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
			<form method="post" action="Login">
			<p>
	   			<label for ="Nom"> Nom: </label>
	   			<input type="text" name="pseudo" id="pseudo" />
	   		</p>
	   		<p>
	   			<label for ="mdp"> Nom: </label>
	   			<input type="password" name="motdepasse" id="motdepasse" />
	   		</p>
	   		<p>
	   			<input type ="submit" value="Connexion" name="login" />
	   			<input type ="reset" value="ToutEffacer" name ="f1" />
			 </form>
		</fieldset>

		<?php 
			echo "??";
		?>


	</body>

</html>
