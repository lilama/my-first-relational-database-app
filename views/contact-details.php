<?php $title = 'Détails du contact'; ?>

<?php ob_start(); ?>
<h1>Détails du contact</h1>
<table class="table is-striped is-narrow is-hoverable is-fullwidth">
      <tr>
        <th>Nom + Prenom</th>
        <th>Email</th>
        <th>Telephone</th>
        <th>Societes</th>
				<th>Actions</th>
      </tr>
      <?php
          echo "<tr>\n
                  <td>" . $data[0]['nom'] . " " . $data[0]['prenom'] . "</td>\n
                  <td>" . $data[0]['mail'] . "</td>\n
                  <td>" . $data[0]['numTel'] . "</td>\n
                  <td>" . $data[0]['nomsociete'] . "</td>\n
                  <td><a href=''>Mettre à jour</a>\n
                      <a href=''>Supprimer</a></td>\n
                </tr>";
      ?>
    </table>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
