<?php
    function erreur($entree) {
        if ($entree == 'snom') {
            $texte = 'La société';
        } else if ($entree == 'adresse') {
            $texte = "L'adresse";
        } else if ($entree == 'pays') {
            $texte = 'Le pays';
        } else if ($entree == 'numTva') {
            $texte = 'Le Numéro de TVA';
        } else if ($entree == 'numTel') {
            $texte = 'Le Numéro de téléphone';
        } else if ($entree == 'tnom') {
            $texte = "Le type d'entreprise";
        } else if ($entree == 'tnom') {
            $texte = "Le type d'entreprise";
        }

        if (isset($_GET[$entree. 'non_sanitise']) && $_GET[$entree.'non_sanitise'] == "false"){
            echo("<p>" . $texte . " est mal renseigné(e)</p>");
        }
        if (isset($_GET[$entree.'vide']) && $_GET[$entree.'vide'] == "false"){
            echo("<p>" . $texte . " n'est pas renseigné(e)</p>");
        }
        if (isset($_GET[$entree . 'non_saisi']) && $_GET[$entree . 'non_saisi'] == "false"){
            echo("<p>" . $texte . " est mal renseigné(e)</p>");
        }
        if (isset($_GET[$entree . 'invalide']) && $_GET[$entree . 'invalide'] == "false"){
            echo("<p>" . $texte . " est invalide</p>");
        }
    }

    require '../controleur/voirSociete.php';
    require '../modele/connexionSql.php';
    require '../modele/voirSociete.php';
     
    echo '<form action="../controleur/editSociete.php?societe=' . $_GET["societe"]. '" method="post">';
    echo '<label for="sid">Société Id</label>';
    echo '<input type="text" name="sid" value="' . $ligne['sid'] . '" disabled="disabled"><br/>';
    erreur('sid');
    echo '<label for="snom">Société Nom</label>';
    echo '<input type="text" name="snom" value="' . $ligne['snom'] . '"><br/>';
    erreur('snom'); 
    echo '<label for="adresse">Adresse</label>';
    echo '<input type="text" name="adresse" value="' . $ligne['adresse'] . '"><br/>';
    erreur('adresse');
    echo '<label for="pays">Pays</label>';
    echo '<input type="text" name="pays" value="' . $ligne['pays'] . '"><br/>';
    erreur('pays');
    echo '<label for="numTva">Numéro TVA</label>';
    echo '<input type="text" name="numTva" value="' . $ligne['numTva'] . '"><br/>';
    erreur('numTva');
    echo '<label for="numTel">Numéro Téléphone</label>';
    echo '<input type="text" name="numTel" value="' . $ligne['numTel'] . '"><br/>';
    erreur('numTel');
    echo '<label for="tnom">Nom TypeEntreprise</label>';
    echo '<select name="tnom">';
    
    require '../modele/editTypeSociete.php';
        
    while ($ligneType=$resultatType->fetch()) {
        echo '<option value="' . $ligneType['nom'] . '"';
    
        if ($ligne['typeEntrepriseID']==$ligneType['id'] && !isset($_POST['submit'])) {
            echo 'selected>' . $ligneType['nom'] . '</option>';
        } else {
                echo '>' . $ligneType['nom'] . '</option>';
        } 
    }
               
    $resultatType->closeCursor();
    echo '</select><br/>';
    erreur('tnom');
    echo '<button type="submit" name="submit">Valider</button><br/>';
    if (isset($_GET['submit']) && $_GET['submit'] == "false"){
        echo("<p>Le formulaire n'a pas été soumis</p>");
    }
    echo '</form>';    
    require '../modele/societesCursor.php';
?>