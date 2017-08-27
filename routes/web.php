<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('tes', function() {
  return "Hello World";
});

Route::get('integration/admin', 'BlueBirdIntegrationController@admin');
Route::post('integration/pull', "BlueBirdIntegrationController@pull");
Route::get('integration/clickthrough', "BlueBirdIntegrationController@clickthrough");
Route::post('integration/channelback', "BlueBirdIntegrationController@channelback");

// post '/pull', to: 'line_integration#pull'
// post '/channelback', to: 'line_integration#channelback'
// get '/clickthrough', to: 'line_integration#clickthrough'
