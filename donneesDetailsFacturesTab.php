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

for ($i=0;$i<5;$i++) {
  $numLigne = $i;
  $quantite = random_int(1, 100);
  $prixFactHT = rand(1, 200);
  $remiseHT = random_int(2, 20);
  $factures_id = random_int(2, 91);
  
  $resultat = $bdd->prepare('
    INSERT INTO detailsFacture 
      (numLigne,quantite,prixFactHT,remiseHT,factures_id) 
    VALUES
      (:numLigne,:quantite,:prixFactHT,:remiseHT,:factures_id)');
  $resultat->bindParam(':numLigne', $numLigne);
  $resultat->bindParam(':quantite', $quantite);
  $resultat->bindParam(':prixFactHT', $prixFactHT);
  $resultat->bindParam(':remiseHT', $remiseHT);
  $resultat->bindParam(':factures_id', $factures_id);
  $resultat->execute();
}
?>