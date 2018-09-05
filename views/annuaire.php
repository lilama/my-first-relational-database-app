<?php $title = 'Mes contacts'; ?>

<?php ob_start(); ?>
<h1>Mes contacts</h1>
<table class="table is-striped is-narrow is-hoverable is-fullwidth">
      <tr>
        <th>Nom + Prenom</th>
        <th>Email</th>
        <th>Telephone</th>
        <th>Societes</th>
				<th>Actions</th>
      </tr>
      <?php
        foreach ($data as $donnees){
          echo "<tr>\n
                  <td>" . $donnees['nom'] . " " . $donnees['prenom'] . "</td>\n
                  <td>" . $donnees['mail'] . "</td>\n
                  <td>" . $donnees['numTel'] . "</td>\n
                  <td>" . $donnees['nomsociete'] . "</td>\n
                  <td><a href='./annuaire/contact-details/". $donnees['id'] ."'>Détails</a>\n
                      <a href=''>Mettre à jour</a>\n
                      <a href=''>Supprimer</a></td>\n
                </tr>";
        }
      ?>
    </table>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
