<?php
  try
    {
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;', 'root', '');
    }
    catch(Exception $e)
    {
    // En cas d'erreur, on affiche un message et on arrête tout
          die('Erreur : '.$e->getMessage());
    }

  $req=file_get_contents ("./resources/cogip.sql");
  $req=str_replace("\n","",$req);
  $req=str_replace("\r","",$req);
  $bdd->exec($req);
?>
