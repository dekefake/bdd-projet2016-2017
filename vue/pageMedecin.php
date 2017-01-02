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
		$pseudo=$_POST['pseudo']
		echo 'Connecté en tant que '.$pseudo.'.';
	?>
	
<form name="ajouterRDV" id="ajouterRDV" action="#" method="post">
			<fieldset>
				<legend> Ajouter un RDV</legend>
					<? php  
					echo '<input type="hiden" name="idMedecin" value="'. id($pseudo).'" ';
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
					<input type="textarea" name="compteRendu" id="compteRendu"  />
				</p>

				<p>
					<label for="intitule">Intitulé: </label>
					<input type="textarea" name="newintitule" id="newintitule" required />
				</p>

				<p>
					<label for="suivi">Suivi: </label>
					<input type="textarea" name="suivi" id="suivi"  />
				</p>
				
				
					<input type ="submit" value="ajouterRDV" name="ajouterRDV" id="ajouterRDV" />
				</p>
			</fieldset>
		</form>

	<form name="choix" id="monForm5" action="#" method="post">
	   	<fieldset>
	   		<legend>Afficher un planing </legend>

	   		 <p>
       			Veuillez choisir par quel méthode afficher un planing<br />
		    <input type="radio" name="type" value="nom" id="nom" /> 
		    <label for="nom">Recherche par nom</label>
		    <br />

		    <input type="radio" name="type" value="date" id="date" /> 
		    <label for="date">Recherche par date</label>
       		<br />
       		<p>
	   			<input type ="choix" value="choix" name="boutonChoix" />
	   		</p>
	   		<!-- TODO 


	   		ou ca:
			<form name="afficherPlaning" id="monForm6" action="#" method="post">
	   			<fieldset>
	   			<legend>Afficher un planing via nom </legend>

			   		<p>
			   			<label for="name">Nom du medecin a afficher : </label>
		       			<input type="text" name="pseudo" id="pseudo" required />
		       		</p>

		       		<p>
			   			<input type ="submit" value="Afficher" name="boutonAfficherEDTNom" />
			   		</p>
			   	</fieldset>
			</form>

	   		ou ca:
			<form name="afficherPlaning" id="monForm7" action="#" method="post">
	   			<fieldset>
		   			<legend>Afficher un planing via date </legend>
				   		<p>
				   			<label for="date">Date a rechercher : </label>
			       			<input type="date" name="Date" id="pseudo" required />
			       		</p>
			       		<p>
				   			<input type ="submit" value="Afficher" name="boutonAfficherEDTDate" />
				   		</p>
				</fieldset>
			</form>

	   		--> 
	   		<?php 
			

	   		//TODO
	   		 ?>
	   	</fieldset>
	</form>

	</body>

</html>
