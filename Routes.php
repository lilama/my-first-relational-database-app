<?php
  //Routes vers les controllers (à définir)

  Route::set('clients',function(){
    Controller::CreateView('clients');
    Controller::test();
  });

  Route::set('factures',function(){
    Controller::CreateView('factures');
    Controller::test();
  });
?>
