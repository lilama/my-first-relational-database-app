<?php
  class Facture extends Database{
    public static function read(){
      $query = "SELECT * FROM factures";
      return self::query($query);
    }

    public static function readOne($id){
      $query = "SELECT * FROM factures WHERE id = ?";
      return self::query($query,$id);
    }

    public static function insert($params){
      $query = "INSERT INTO factures(numero,dateFact,objet,societesID,personnesID) VALUES(?,?,?,?,?)";
      return self::query($query,$params);
    }

    public static function update($id,$params){
      $query = "UPDATE factures
                SET numero = ?, dateFact = ?, objet = ?, societesID = ?, personnesID = ?
                WHERE id = ?";
      $params[] = $id;
      return self::query($query,$params);
    }

    public static function delete($id){
      $query = "DELETE FROM factures WHERE id = ?";
      return self::query($query,$id);
    }
  }
?>
