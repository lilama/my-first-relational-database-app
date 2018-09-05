<?php
	require '../modele/connexionSql.php';

	$requete = "UPDATE societes
				SET nom=:nom, adresse=:adresse, pays=:pays, numTva=:numtva, numTel=:numtel, typeEntrepriseID=(SELECT id FROM typeEntreprise WHERE nom=:tnom)
				WHERE id=:sid";

	$resultat = $bdd->prepare($requete);
	$tabBindValue = [
		':sid' => $sidNettoye,
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