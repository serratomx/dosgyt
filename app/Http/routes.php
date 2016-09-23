<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['as' => 'site.'], function(){

  Route::group(['as' => 'home.'], function(){

    Route::get('/', [
      'as'    => 'index',
      'uses'  => 'HomeController@index'
    ]);
  });

  Route::group(['prefix' => 'portfolio', 'as' => 'portfolio.'], function(){

    Route::get('/{submenu?}', [
      'as'    =>  'index',
      'uses'  => 'PortfolioController@index'
    ]);

    Route::group(['prefix' => '{submenu}/viewer', 'as' => 'viewer.'], function() {

      Route::get('/{client}.json', [
        'as'    => 'client.json',
        'uses'  => 'PortfolioController@json_for_viewer'
      ]);

      Route::get('/{client?}', [
        'as'    => 'index',
        'uses'  => 'PortfolioController@viewer'
      ]);
    });
  });

  Route::group(['prefix' => 'services', 'as' => 'services.'], function(){
    
    Route::get('/', [
      'as'    => 'index',
      'uses'  => 'ServicesController@index'
    ]); 
  });

  Route::group(['prefix' => 'our-clients', 'as' => 'ourClients.'], function() {

    Route::get('/', [
      'as'    => 'index',
      'uses'  => 'OurClientsController@index'
    ]);
  });

  Route::group(['prefix' => 'contact', 'as' => 'contact.'], function(){
    
    Route::get('/', [
      'as'      => 'index',
      'uses'    => 'ContactController@index'
    ]);

    Route::get('/send', [
      'as'      => 'send',
      'uses'    => 'ContactController@send'
    ]);
  });
});