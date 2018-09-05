<?php
  try
  {
  $bdd = new PDO('mysql:host=localhost;charset=utf8', 'root', '');
  }
  catch(Exception $e)
  {
        die('Erreur : '.$e->getMessage());
  }

  $req=file_get_contents ("./resources/cogip.sql");
  $req=str_replace("\n","",$req);
  $req=str_replace("\r","",$req);
  $bdd->exec($req);
?>
