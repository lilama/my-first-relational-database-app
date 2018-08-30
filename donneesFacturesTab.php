<?php
// require the Faker autoloader
require __DIR__ . '/vendor/autoload.php';
// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create('fr_BE'); // create a French faker

try {
  $bdd = new PDO('mysql:host=localhost:8989;dbname=cogip;chaset=utf8', 'root', 'root');  
} catch (Exception $e) {
  die('Erreur: ' . $e->getMessage());
}

for ($i=0;$i<15;$i++) {
  $numero = '2018-' . $faker->numberBetween(0,500);
  $dateFact = $faker->dateTimeThisCentury->format('Ymd'); 
  $numCommande = 'Cde-' . $i;
  $objet = $faker->text;
  $societes_id = random_int(16, 25);
  $personnes_id = random_int(1, 15);
  $tva_id = random_int(1, 2);

  $resultat = $bdd->prepare('INSERT INTO factures (numero,dateFact,numCommande,objet,societes_id,personnes_id, tva_id) VALUES (:numero,:dateFact,:numCommande,:objet,:societes_id,:personnes_id,:tva_id)');
  $resultat->bindParam(':numero', $numero);
  $resultat->bindParam(':dateFact', $dateFact);
  $resultat->bindParam(':numCommande', $numCommande);
  $resultat->bindParam(':objet', $objet);
  $resultat->bindParam(':societes_id', $societes_id);
  $resultat->bindParam(':personnes_id', $personnes_id);
  $resultat->bindParam(':tva_id', $tva_id);
  $resultat->execute();
}
?>