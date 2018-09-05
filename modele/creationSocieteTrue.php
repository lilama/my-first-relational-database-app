<?php
	require '../modele/connexionSql.php';

	$requete = "INSERT INTO societes (nom, adresse, pays, numTva, numTel, typeEntrepriseID) VALUES (:nom, :adresse, :pays, :numtva, :numtel, (SELECT id FROM typeEntreprise WHERE nom=:tnom))";
				
	$resultat = $bdd->prepare($requete);
	$tabBindValue = [
		':nom' => $snomNettoye,
		':adresse' => $adresseNettoye,
		':pays' => $paysNettoye,
		':numtva' => $numTvaNettoye,
		':numtel' => $numTelNettoye,
		':tnom' => $tnomNettoye
	];
	foreach ($tabBindValue as $key=>$value) {
		$resultat->bindValue($key, $value);	
	}
	$resultat->execute();
	$resultat->closeCursor();

?>