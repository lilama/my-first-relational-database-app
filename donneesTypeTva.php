<?php
try {
  $bdd = new PDO('mysql:host=localhost:8989;dbname=cogip;chaset=utf8', 'root', 'root');  
} catch (Exception $e) {
  die('Erreur: ' . $e->getMessage());
}

$bdd->exec('INSERT INTO tva(tauxTva) VALUES(0)');

$bdd->exec('INSERT INTO tva(tauxTva) VALUES (0.2)');
?>