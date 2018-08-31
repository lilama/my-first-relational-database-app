<?php
  class Controller extends Database{
public static function test(){
  print_r(self::query('SELECT * FROM testTable;'));
}

    public static function CreateView($viewName){
      require_once("./views/$viewName.php");
    }
  }
?>
