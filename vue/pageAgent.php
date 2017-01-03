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
		?><br><br></p>
		<form name="synthese" action="#" method="post">



		<form name="NouveauClient" id="NouveauClient" action="#" method="post">
			<fieldset>
				<legend> Créer un patient </legend>
				<p>
					<label for="Nom">Nom du client : </label>
					<input type="text" name="nvNomClient" id="nvNomClient" required />
				</p>
				<p>
					<label for="Prenom">Prenom du client : </label>
					<input type="text" name="nvPrenomClient" id="nvPrenomClient" required />
				</p>
				<p>
					<label for="BithdayDate">Date de naissance : </label>
					<input type="date" name="nvDateClient" id="nvDateClient" required />
				</p>
				<p>
					<label for="Adresse">Adresse : </label>
					<input type="text" name="nvAdressClient" id="nvAdress"Client" required />
				</p>
				<p>
					<label for="NumTel">Numero de Telephone : </label>
					<input type="tel" name="nvTelClient" id="nvTelClient" required />
				</p>
				<p>
					<label for="Mail">Mail : </label>
					<input type="email" name="nvMailClient" id="nvMailClient" required />
				</p>
				<p>
					<label for="Profession">Profession : </label>
					<input type="text" name="nvProfClient" id="nvProfClient">
				</p>
				<p>
					<label for="SituationFamilliale">Situation Familliale : </label>
					<input type="text" name="nvSFClient" id="nvSFClient">
				</p>
				<p>
					<label for="NSS">Numéro de Sécurité Sociale : </label>
					<input type="text" name="nvNSSClient" id="nvNSSclient">
				</p>
				<p>
					<label for="Solde">Solde : </label>
					<input type="number" name="nvSoldeClient" id="nvSoldeClient">
				</p>
				<?php
       				echo '<p><input type="hidden" name="pseudo" id="pseudo" value="'.$pseudo.'" /><input type="hidden" name="motdepasse" id="motdepasse" value="'.$motdepasse.'" /></p>'
	   			?>
				<p>
		   			<input type ="submit" value="AjouterClient" name="boutonAjouterClient" />
		   			<input type ="reset" value="ToutEffacer" name ="f1" />
				</p>
			</fieldset>
		</form>

		<form name="modifierclient" id="modifierclient" action="#" method="post">
			<fieldset>
				<legend> Modifier un patient</legend>
				<p>
					<label for="nssModif">NSS du patient : </label>
					<input type="text" name="nssModif" id="nssSModif" required />
					<?php
       					echo '<p><input type="hidden" name="pseudo" id="pseudo" value="'.$pseudo.'" /><input type="hidden" name="motdepasse" id="motdepasse" value="'.$motdepasse.'" /></p>'
	   				?>
					<input type ="submit" value="Chercher" name="modifClient" id="modifClient" />
				</p>
			</fieldset>
		</form>
		<form name="affichersyntheseclient" id="affichersyntheseclient" action="#" method="post">
			<fieldset>

				<legend> Afficher la synthèse d'un patient</legend>
				<p>
					<label for="nss">NSS du patient : </label>
					<input type="text" name="nssSynthese" id="nssSynthese" required />
					<?php
       					echo '<p><input type="hidden" name="pseudo" id="pseudo" value="'.$pseudo.'" /><input type="hidden" name="motdepasse" id="motdepasse" value="'.$motdepasse.'" /></p>'
	   				?>
					<input type ="submit" value="Synthèse patient" name="synthesePatient" />
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
	   		
	   	</fieldset>
	</form>

	<form name="choix" id="monForm5" action="#" method="post">
	   	<fieldset>
	   		<legend>Faire un Depot </legend>

	   		
		   	<p>
		    <label for="nss">NSS du patient</label>
		    <input type="number" name="depotNSS"  id="depotNSS" /> 
		    </p>
		    <p>
		     <label for="montant"> Montant</label>
		    <input type="number" name="depotMontant" id="depotMontant" /> 
		    <?php
       		echo '<p><input type="hidden" name="pseudo" id="pseudo" value="'.$pseudo.'" /><input type="hidden" name="motdepasse" id="motdepasse" value="'.$motdepasse.'" /></p>'
	   		?>
       		</p>
       		
       		<p>
	   			<input type="submit" value="depot" name="depot" id="depot" />
	   		</p>
	   		
	   	</fieldset>
	</form>


		
		<form name="logout" action="#" method="post">
			<input type ="submit" value="Déconnexion" name="logOut" />
		</form>
	</body>
</html>
