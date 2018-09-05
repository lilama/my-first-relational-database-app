<?php
  class FactureController{

    public static function CreateView(){
      require_once("./models/Facture.php");
      $data = Facture::read();
      require_once("./views/factures.php");
    }
  }
?>
