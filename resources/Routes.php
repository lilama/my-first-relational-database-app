<?php
  //Routes vers les controllers (à définir)

  // Route::set('clients',function(){
  //   Controller::CreateView('clients');
  // });

  Route::set('factures',function(){
    FactureController::CreateView('factures');
  });
?>
