<!DOCTYPE html>
<html lang="fr">
    <head>
      <title>Ma page</title>
      <meta charset="utf-8">
	  <link rel="stylesheet"  href="style.css" />
	  
    </head>
    
	<body>
	<h1>Page des médecins</h1>
	<?php
		$pseudo=$_POST['pseudo'];
		echo 'Connecté en tant que '.$pseudo.'.';
	?>
	
<form name="ajouterRDV" id="ajouterRDV" action="#" method="post">
			<fieldset>
				<legend> Ajouter un RDV</legend>
					<?php  
					echo '<input type="hidden" name="idMedecin" value="'.getID($pseudo).'"';
				 ?>
				<p>
					<label for="date">Date : </label>
					<input type="date" name="newDate" id="newdate" required />
				</p>
				<p>
					<label for="heure">Heure : </label>
					<input type="time" name="newHeure" id="newHeure" required />
				</p>
				<p>
					<label for="ClientNSS">NSS du Client: </label>
					<input type="number" name="newNSSClient" id="newNSSClient" required />
				</p>
				<p>
					<label for="compteRendu">Compte rendu: </label>
					<input type="textarea" name="compteRendu" id="compteRendu" required />
				</p>

				<p>
					<label for="intitule">Intitulé: </label>
					<input type="textarea" name="newIntitule" id="newIntitule" required />
				</p>

				<p>
					<label for="suivi">Suivi: </label>
					<input type="textarea" name="suivi" id="suivi"  />
				</p>
				<?php
       				echo '<p><input type="hidden" name="pseudo" id="pseudo" value="'.$pseudo.'" /><input type="hidden" name="motdepasse" id="motdepasse" value="'.$motdepasse.'" /></p>'
	   			?>
					<input type ="submit" value="Ajouter le rendez vous" name="ajouterRDV" id="ajouterRDV" />
				</p>
			</fieldset>
		</form>

	<form name="choix" id="monForm5" action="#" method="post">
	   	<fieldset>
	   		<legend>Afficher un planing </legend>

	   		<p>
       			Veuillez choisir par quel méthode afficher un planing
       		<br />
		    <input type="radio" name="type" value="nom" id="nom" /> 
		    <label for="nom">Recherche par nom</label>
		    <br />
		    </p>
		    <p>
		    <input type="radio" name="type" value="date" id="date" /> 
		    <label for="date">Recherche par date</label>
       		<br />
       		</p>
       		<?php
       			echo '<p><input type="hidden" name="pseudo" id="pseudo" value="'.$pseudo.'" /><input type="hidden" name="motdepasse" id="motdepasse" value="'.$motdepasse.'" /></p>'
	   		?>
       		<p>
	   			<input type="submit" value="Afficher" name="boutonChoix" id="boutonChoix" />
	   		</p>
	   		
	   		<?php 
			

	   		//TODO
	   		 ?>
	   	</fieldset>
	</form>

	</body>

</html>
