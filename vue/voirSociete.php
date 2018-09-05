<?php
	require '../modele/connexionSql.php';

	require '../modele/voirSociete.php';

	echo '<table>';
	echo '<thead><tr><th>Société Id</th><th>Société Nom</th>';
	echo '<th>Adresse</th><th>Pays</th>';
	echo '<th>Numéro TVA</th>';
	echo '<th>Numéo Téléphone</th>';
	echo '<th>Identifiant TypeEntreprise</th>';
	echo '<th>Nom TypeEntreprise</th>';
	echo '</tr></thead>';
	echo '<tr>';
	echo '<td>' . $ligne['sid'] . '</td>';
	echo '<td>' . $ligne['snom'] . '</td>';
	echo '<td>' . $ligne['adresse'] . '</td>';
	echo '<td>' . $ligne['pays'] . '</td>';
	echo '<td>' . $ligne['numTva'] . '</td>';
	echo '<td>' . $ligne['numTel'] . '</td>';
	echo '<td>' . $ligne['typeEntrepriseID'] . '</td>';
	echo '<td>' . $ligne['tnom'] . '</td>';
	echo '</tr>';
	echo '</table>';
	require '../modele/societesCursor.php';
?>