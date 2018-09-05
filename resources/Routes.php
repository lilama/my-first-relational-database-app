<?php
  //Routes vers les controllers (à définir)

  // Route::set('clients',function(){
  //   Controller::CreateView('clients');
  // });

  Route::set('factures',function(){
    FactureController::CreateView();
  });

  Route::set('annuaire',function(){
    PersonneController::CreateView();
  });

  Route::set('annuaire/contact-details',function($id){
    PersonneController::CreateViewOne($id);
  });
?>
