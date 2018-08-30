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
  $nom = $faker->lastname;
  $prenom = $faker->firstname;
  $numTel = $faker->phoneNumber;
  $mail = $faker->freeEmail();
  $societes_id = random_int(16, 25);  

  $resultat = $bdd->prepare('INSERT INTO personnes (nom,prenom,numTel,mail,societes_id) VALUES (:nom,:prenom,:numTel,:mail,:societes_id)');
  $resultat->bindParam(':nom', $nom);
  $resultat->bindParam(':prenom', $prenom);
  $resultat->bindParam(':numTel', $numTel);
  $resultat->bindParam(':mail', $mail);
  $resultat->bindParam(':societes_id', $societes_id);
  $resultat->execute();
}
?>