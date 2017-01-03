<?php
	
	require_once('modele/modeleAccueil.php');

	function creerActe($intitule,$specialite,$prix,$consignes){
		try{
			$connexion=getConnect();
			$resultat=$connexion->query("INSERT INTO Actes VALUES('".$intitule."','".$specialite."','".$prix."','".$consignes."')");
		}catch (Exception $e){
			afficherErreur($e); //FAIRE LA METHODE 
		}
		$resultat->closeCursor();
	}

	function nouveauMedecin($login,$mdp,$categorie,$specialite){
		try{
			$connexion=getConnect();
			$resultat=$connexion->query("INSERT INTO Employes VALUES('','".$login."','".$mdp."','".$categorie."','".$specialite."')");
		}catch (Exception $e){
			afficherErreur($e); //FAIRE LA METHODE 
		}
		$resultat->closeCursor();
	}

	function nouvelEmploye($login,$mdp,$categorie){
		try{
			$connexion=getConnect();
			$resultat=$connexion->query("INSERT INTO Employes VALUES('','".$login."','".$mdp."','".$categorie."','')");
		}catch (Exception $e){
			afficherErreur($e); //FAIRE LA METHODE 
		}
		$resultat->closeCursor();
	}

	function modifierEmploye($login){

		require_once('modele/modeleAccueil.php');

	
	}
	function getEmploye($pseudo){
	require_once('modele/modeleAccueil.php');
	try{
		$connexion=getConnect();
		$resultat=$connexion->query("SELECT * FROM Employes WHERE Login='$login'");
	}catch(Exception $e){
		afficherErreur($e);
	}
	if($resultat->rowCount()==0) throw new Exception('Cet employé n\'existe pas');
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$employe = $resultat->fetch();
	$resultat->closeCursor();
	return($employe);
}