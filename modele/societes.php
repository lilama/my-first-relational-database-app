<?php
	$requete = 'SELECT societes.id AS sId, societes.nom AS sNom, adresse, pays, numTva, numTel, typeEntrepriseID, typeEntreprise.nom AS tNom, typeEntreprise.id 
		FROM societes
		LEFT JOIN typeEntreprise 
		ON typeEntreprise.id = societes.typeEntrepriseID
		ORDER BY sId';
	$resultat = $bdd->query($requete);

?>