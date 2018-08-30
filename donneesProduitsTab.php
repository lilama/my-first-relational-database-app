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

$tabProduits = array (
'pokemon jeu 1' => 10,
'pokemon jeu 2' => 20,
'pokemon jeu 3' => 30,
'pokemon jeu 4' => 40,
);


foreach($tabProduits as $key=>$value) {
  $resultatInsert = $bdd->prepare('INSERT INTO Produits(designation, prixUnitaire) VALUES(:designation, :prixUnitaire)');
  $resultatInsert->bindParam(':designation', $key);
  $resultatInsert->bindParam(':prixUnitaire', $value);
  $resultatInsert->execute();  
}

?>