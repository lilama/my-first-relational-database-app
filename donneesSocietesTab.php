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

$pays = 'Belgique';
$numtvaTab = ['BE0411905847', 'BE0414445663', 'BE0419052173', 'BE0424473582', 'BE0424748350', 'BE0438789495', 'BE0440966354', 'BE0446991440', 'BE0464819842', 'BE0471727232', 'BE0475899519'];
for ($i=0;$i<10;$i++) {
  $nom = $faker->company();
  $adresse = $faker->address;
  $numtva = $numtvaTab[$i];
  $numTel = $faker->phoneNumber;
  $typeEntreprise = random_int(1,2);
  $resultatInsert = $bdd->prepare('INSERT INTO societes(nom, adresse, pays, numTva, numTel, typeEntreprise_id) VALUES(:nom, :adresse, :pays, :numTva, :numTel, :typeEntreprise)');
  $resultatInsert->bindParam(':nom', $nom);
  $resultatInsert->bindParam(':adresse', $adresse);
  $resultatInsert->bindParam(':pays', $pays);
  $resultatInsert->bindParam(':numTva', $numtva);
  $resultatInsert->bindParam(':numTel', $numTel);
  $resultatInsert->bindParam(':typeEntreprise', $typeEntreprise);  
  $resultatInsert->execute();
}

?>