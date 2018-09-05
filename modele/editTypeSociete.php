<?php
	require '../modele/connexionSql.php';

	$requete = "SELECT id, nom FROM typeEntreprise";
	$resultatType = $bdd->query($requete);

?>