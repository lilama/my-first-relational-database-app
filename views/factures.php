<?php $title = 'Mes factures'; ?>

<?php ob_start(); ?>
<h1>Mes factures</h1>
<table class="table is-striped is-narrow is-hoverable is-fullwidth">
      <tr>
        <th>ID</th>
        <th>Numero</th>
        <th>DateFact</th>
        <th>Objet</th>
				<th>SocietesID</th>
        <th>PersonnesID</th>
      </tr>
      <?php
        foreach ($data as $donnees){
          echo "<tr>\n
                  <td>" . $donnees['id'] . "</td>\n
                  <td>" . $donnees['numero'] . "</td>\n
                  <td>" . $donnees['dateFact'] . "</td>\n
                  <td>" . $donnees['objet'] . "</td>\n
                  <td>" . $donnees['societesID'] . "</td>\n
									<td>" . $donnees['personnesID'] . "</td>\n
                </tr>";
        }
      ?>
    </table>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
