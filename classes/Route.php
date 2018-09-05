<?php
  class Route{
    public static $validRoutes = array();

    public static function set($route,$function){
      self::$validRoutes[] = $route;

      if($_GET['url'] == $route){
        if(isset($_GET['id'])){
          $function->__invoke($_GET['id']);
        }else{
          $function->__invoke();
        }
      }
    }
  }
?>
