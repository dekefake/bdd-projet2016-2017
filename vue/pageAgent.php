<!DOCTYPE html>
<html lang="fr">
    <head>
      <title>Ma page</title>
      <meta charset="utf-8">
	  <link rel="stylesheet"  href="style.css" />
	  
    </head>
    
	<body>
		<h1>Page des agents</h1>
		<p><?php
			echo 'Connecté en tant que '.$_POST['pseudo'].'.';
		?></p>
		<?php echo $contenu ?>
		<form name="synthese" action="#" method="post">
			<fieldset>
				<legend> Afficher la synthèse d'un patient</legend>
				<p>
					<label for="nss">NSS du patient : </label>
					<input type="text" name="nssSynthese" id="nssSynthese" required />
					<input type ="submit" value="Synthèse patient" name="synthesePatient" />
				</p>
			</fieldset>
		</form>
		<form name="logout" action="#" method="post">
			<input type ="submit" value="Déconnexion" name="logOut" />
		</form>

	</body>

</html>
