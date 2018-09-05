<?php
	require '../modele/connexionSql.php';

	$requete = "DELETE FROM societes WHERE id=:sid";
	$resultat = $bdd->prepare($requete);
	$resultat->bindValue(':sid', $_GET["societe"]);
	$resultat->execute();
	require '../modele/societesCursor.php';
	header("Location:../vue/societes.php?status=true");	
?>