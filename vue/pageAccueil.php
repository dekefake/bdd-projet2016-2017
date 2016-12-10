<!DOCTYPE html>
<html lang="fr">
    <head>
      <title>Ma page</title>
      <meta charset="utf-8">
	  <link rel="stylesheet"  href="style.css" />
	  
    </head>
    
	<body>
	<?php 
	if(!isset($_POST['Submit']||log==true)){ //Si il na pas cliqué sur connexion
		ctlAccueil();
	
	}elseif{//Donc il est arrrivé ici car il a cliqué sur sur envoyer
		if(!ctlLogin($pseudo,$password)) {echo '<p> Mot de passe incorect</p>';
		}else{//donc il a pu se loger
			log=true;//Cela permetra a la page de ne pas reaficher ctlAcceuil des qu'on fait une autre requette et meme de créer un bouton Deconnexion dans le header
			switch (Categorie($pseudo)) {
				case 'medecin':
					include("medecin.php");
					break;
				
			case 'agent':
					include("agent.php");
					break;
				
			case 'directeur':
					include("directeur.php");
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
