<?php
	require '../modele/connexionSql.php';
	
	echo '<table>';
	echo '<thead><tr><th>Société Id</th><th>Société Nom</th>';
	echo '<th>Adresse</th><th>Pays</th>';
	echo '<th>Numéro TVA</th>';
	echo '<th>Numéo Téléphone</th>';
	echo '<th>Identifiant TypeEntreprise</th>';
	echo '<th>Nom TypeEntreprise</th>';
	echo '<th> </th>';
	echo '<th>Action</th>';
	echo '<th>  </th></tr></thead>';

	require '../modele/societes.php';
	
	while ($donnees = $resultat->fetch()) {
		echo '<tr>';
		echo '<td>' . $donnees['sId'] . '</td>';
		echo '<td>' . $donnees['sNom'] . '</td>';
		echo '<td>' . $donnees['adresse'] . '</td>';
		echo '<td>' . $donnees['pays'] . '</td>';
		echo '<td>' . $donnees['numTva'] . '</td>';
		echo '<td>' . $donnees['numTel'] . '</td>';
		echo '<td>' . $donnees['typeEntrepriseID'] . '</td>';
		echo '<td>' . $donnees['tNom'] . '</td>';
		echo '<td>' . '<a href="../vue/voirSociete.php?societe=' . $donnees['sId'] . '">Voir</a>' . '</td>';
		echo '<td>' . '<a href="../vue/editSociete.php?societe=' . $donnees['sId'] . '">Edit</a>' . '</td>';
		echo '<td>' . '<a href="../vue/deleteSociete.php?societe=' . $donnees['sId'] . '">Delete</a>' . '</td>';
		echo '</tr>';		
	}
	echo '</table>';
	require '../modele/societesCursor.php';

	if (isset($_GET['status']) && $_GET['status'] == 'true'){
        echo("<p>La société a bien été supprimée. MAJ de la base de données</p>");
    }
?>