<?php
  class PersonneController{

    public static function CreateView(){
      require_once("./models/Personne.php");
      $data = Personne::read();
      require_once("./views/annuaire.php");
    }

    public static function CreateViewOne($id){
      require_once("./models/Personne.php");
      $data = Personne::readOne($id);
      require_once("./views/contact-details.php");
    }
  }
?>
