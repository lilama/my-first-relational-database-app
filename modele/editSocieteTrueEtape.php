<?php
	require '../modele/connexionSql.php';

	$requeteA = "SELECT COUNT(*) FROM societes WHERE id=:sid";
	$resultatA = $bdd->prepare($requeteA);
	$resultatA->bindValue(':sid' ,$sidNettoye);
	$resultatA->execute();
	if ( $resultatA->fetch() > 0 )
	{
		include "../vue/editSocieteTrue.php";
		include "../modele/editSocieteTrue.php";
	}

	$resultatA->closeCursor();

?>