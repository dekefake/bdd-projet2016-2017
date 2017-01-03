<?php
function afficherErreur($erreur){
	$contenu='<p>Erreur<br>'.$erreur->getMessage().'</p>';
	require_once('vue/pageAccueil.php');
	
}

function afficherFormulaire(){
	$contenu="";
	require_once('vue/pageAccueil.php');
}
function afficherPlanningViaNom($pseudo,$motdepasse){
	echo'<form name="afficherPlaning" id="monForm6" action="#" method="post">
	   			<fieldset>
	   			<legend>Afficher un planing via nom </legend>

			   		<p>
			   			<label for="name">Nom du medecin a afficher : </label>
		       			<input type="text" name="nom" id="nom" required />
		       		</p>
		       		<p><input type="hidden" name="pseudo" id="pseudo" value="'.$pseudo.'" /><input type="hidden" name="motdepasse" id="motdepasse" value="'.$motdepasse.'" /></p>
		       		<p>
			   			<input type ="submit" value="Afficher" name="boutonAfficherEDTNom" />
			   		</p>
			   	</fieldset>
			</form>
			';
}
function affiherPlanningViaDate($pseudo,$motdepasse){
	echo'<form name="afficherPlaning" id="monForm7" action="#" method="post">
	   			<fieldset>
		   			<legend>Afficher un planing via date </legend>
				   		<p>
				   			<label for="date">Date a rechercher : </label>
			       			<input type="date" name="Date" id="pseudo" required />
			       		</p>
			       		<p><input type="hidden" name="pseudo" id="pseudo" value="'.$pseudo.'" /><input type="hidden" name="motdepasse" id="motdepasse" value="'.$motdepasse.'" /></p>
			       		<p>
				   			<input type ="submit" value="Afficher" name="boutonAfficherEDTDate" />
				   		</p>
				</fieldset>
			</form>
			';
}

function afficherPageDirecteur($pseudo,$motdepasse){
	$contenu="";
	require_once('vue/pageDirecteur.php');
}

function afficherPageMedecin($pseudo,$motdepasse,$planning){
	$contenu="";
	$votrePlanning="";
	if($planning == null){
		$votrePlanning = "Votre planning est vide.";
	}else{
		foreach ($planning as $rdv) {
			$votrePlanning+="<p>Date : ".$rdv->Date." Heure : ".$rdv->Heure."<br/>"."Client : NSS ".$rdv->ClientNSS." Intitulé : ".$rdv->Intitule."</p>";
		}
	}
	require_once('vue/pageMedecin.php');
}



function afficherPageAgent($pseudo,$motdepasse){
	$contenu='';
	require_once('vue/pageAgent.php');
}

function afficherSynthese($patient,$historique){
	$contenu='<h3>Synthèse du patient n°'.$patient->ClientNSS.' </h3><ul><li>Nom : '.$patient->Nom.'</li><li>Prénom : '.$patient->Prenom.'</li><li>Date de naissance : '.$patient->DateNaissance.'</li><li>Adresse : '.$patient->Adresse.'</li><li>Numéro de téléphone : 0'.$patient->NumTel.'</li><li>Adresse mail : '.$patient->Mail.'</li><li>Profession : '.$patient->Profession.'</li><li>Situation familiale : '.$patient->SituationFamiliale.'</li><li>NSS : '.$patient->ClientNSS.'</li><li>Solde : '.$patient->Solde.'€</li></ul>';
	if($historique!=null){
		$contenu.='<h5>Historique des consultations et actes</h5><table><tr><th>Médecin</th><th>Date</th><th>Prix</th><th>Compte rendu</th><th>Suivi</th></tr>';
		foreach($historique as $acte){
			$contenu.='<tr><td>'.$acte->Login.'</td><td>'.$acte->Date.'</td><td>'.$acte->Prix.'</td><td>'.$acte->CompteRendu.'</td><td>'.$acte->Suivi.'</td></tr>';
		}
	}
	$contenu.='</table>';
	echo $contenu;
}

function afficherErreurAgent($erreur){
	$contenu='<p>'.$erreur->getMessage().'</p>';
	require_once('vue/pageAgent.php');
}


function modifClient($nss,$pseudo,$motdepasse){
	require_once('modele/modeleAgent.php');
	$client= getClient($nss);
	echo '
					<h3>Modifier client : NSS n°'.$client->ClientNSS.'</h3>
					<fieldset><form method="post" action="#">
					<p>
						<label for="Nom">Nom du client : </label>
						<input type="text" name="modifNomClient" id="nvNomClient" value="'. $client->Nom .'" required />
					</p>
					<p>
						<label for="Prenom">Prenom du client : </label>
						<input type="text" name="modifPrenomClient" id="nvPrenomClient" value="'. $client->Prenom .'" required />
					</p>
					<p>
						<label for="BithdayDate">Date de naissance : </label>
						<input type="Date" name="modifDateClient" id="nvDateClient" value="'. $client->DateNaissance .'" required />
					</p>
					<p>
						<label for="Adresse">Adresse : </label>
						<input type="text" name="modifAdressClient" id="nvAdress"Client" value="'. $client->Adresse .'"required />
					</p>
					<p>
						<label for="NumTel">Numero de Telephone : </label>
						<input type="tel" name="modifTelClient" id="nvTelClient" value="'. $client->NumTel .'" required />
					</p>
					<p>
						<label for="Mail">Mail : </label>
						<input type="Mail" name="modifMailClient" id="nvMailClient" value="'. $client->Mail .'"required />
					</p>
					<p>
						<label for="Profession">Profession : </label>
						<input type="text" name="modifProfClient" id="nvProfClient" value="'. $client->Profession .'">
					</p>
					<p>
						<label for="SituationFamilliale">Situation Familliale : </label>
						<input type="text" name="modifSFClient" id="nvSFClient" value="'. $client->SituationFamiliale .'">
					</p>
					<p>
						<input type="hidden" name="modifNSSClient" id="nvNSSclient" value="'. $client->ClientNSS .'">
					</p>
					<p>
						<label for="Solde">Solde : </label>
						<input type="number" name="modifSoldeClient" id="nvSoldeClient" value="'. $client->Solde .'">
					</p>
					<p><input type="hidden" name="pseudo" id="pseudo" value="'.$pseudo.'" /><input type="hidden" name="motdepasse" id="motdepasse" value="'.$motdepasse.'" /></p>
					<p>
		   			<input type ="submit" value="Enregistrer" name="boutonModifClient" />
		   			<input type ="reset" value="ToutEffacer" name ="f1" />
		   			</p></form></fieldset>';
}