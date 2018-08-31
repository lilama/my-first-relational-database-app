<?php
  require_once('Routes.php');

  function __autoload($class_name){
    $classPath = './classes/'.$class_name.'.php';
    $controllerPath = './controllers/'.$class_name.'.php';

    if(file_exists($classPath)){
      require_once $classPath;
    }elseif (file_exists($controllerPath)) {
      require_once $controllerPath;
    }
  }
?>
