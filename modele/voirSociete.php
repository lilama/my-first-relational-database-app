<?php
	$requete = "SELECT societes.id AS 'sid', societes.nom AS 'snom', adresse, pays, numTva, numTel, typeEntrepriseID, typeEntreprise.nom AS 'tnom', typeEntreprise.id
		FROM societes
		LEFT JOIN typeEntreprise
		ON typeEntreprise.id = societes.typeEntrepriseID
		WHERE societes.id = :sid";
	$resultat = $bdd->prepare($requete);
	$resultat->bindValue(':sid', $_GET["societe"]);
	$resultat->execute();
	$ligne = $resultat->fetch();	
?>