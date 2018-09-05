<?php
	require '../modele/connexionSql.php';
	require '../modele/voirSociete.php';

    echo '<table>';
    echo '<tr><th style="text-align:left;">Société Id </th><td>' . $ligne['sid'] . '</td></tr>';
    echo '<tr><th style="text-align:left;">Société Nom</th><td>' . $ligne['snom'] . '</td></tr>';
    echo '<tr><th style="text-align:left;">Adresse</th><td>' . $ligne['adresse'] . '</td></tr>';
    echo '<tr><th style="text-align:left;">Pays</th><td>' . $ligne['pays'] . '</td></tr>';
    echo '<tr><th style="text-align:left;">Numéro TVA</th><td>' . $ligne['numTva'] . '</td></tr>';
    echo '<tr><th style="text-align:left;">Numéo Téléphone</th><td>' . $ligne['numTel'] . '</td></tr>';
    echo '<tr><th style="text-align:left;">Identifiant TypeEntreprise</th><td>' . $ligne['typeEntrepriseID'] . '</td></tr>';
    echo '<tr><th style="text-align:left;">Nom TypeEntreprise</th><td>' . $ligne['tnom'] . '</td></tr>';
          
    echo '</table>';
    require '../modele/societesCursor.php';
	echo '<a href="../modele/deleteSociete.php?societe=' . $ligne['sid'] . '"><button>Valider</button></a><br/>';
    echo '<a href="../vue/societes.php"><button>Retour Page Sociétés</button></a><br/>';
    
?>