<?php
  class Personne extends Database{
    // Réparer les appel ambigue
    public static function read(){
      $query = "SELECT personnes.id AS 'id',personnes.nom AS 'nom',prenom,personnes.numTel AS 'numTel',mail,societes.nom AS 'nomsociete' FROM personnes JOIN societes ON societesID = societes.id";
      return self::query($query);
    }

    public static function readOne($id){
      $query = "SELECT personnes.nom AS 'nom',prenom,personnes.numTel AS 'numTel',mail,societes.nom AS 'nomsociete' FROM personnes JOIN societes ON societesID = societes.id WHERE personnes.id = ?";
      return self::query($query,array($id));
    }

    public static function insert($params){
      $query = "INSERT INTO personnes(nom,prenom,numTel,mail,societesID) VALUES(?,?,?,?,?)";
      return self::query($query,$params);
    }

    public static function update($id,$params){
      $query = "UPDATE personnes
                SET nom = ?, prenom = ?, numTel = ?, mail = ?, societesID = ?
                WHERE id = ?";
      $params[] = $id;
      return self::query($query,$params);
    }

    public static function delete($id){
      $query = "DELETE FROM personnes WHERE id = ?";
      return self::query($query,$id);
    }
  }
?>
