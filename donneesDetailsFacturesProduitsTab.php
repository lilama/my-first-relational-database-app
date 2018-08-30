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
  $Produits_id = random_int(1, 4);
  $detailsFacture_id = random_int(1, 5);

  $resultat = $bdd->prepare('
    INSERT INTO Produits_has_detailsFacture 
      (Produits_id,detailsFacture_id)
    VALUES
      (:Produits_id,:detailsFacture_id);');
  $resultat->bindValue(':Produits_id', $Produits_id);
  $resultat->bindValue(':detailsFacture_id', $detailsFacture_id);
  $resultat->execute();
}
?>