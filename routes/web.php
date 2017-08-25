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

Route::post('integration/admin', 'BlueBirdintegration@admin');
Route::post('integration/pull', "BlueBirdintegration@pull");
Route::post('integration/clickthrough', "BlueBirdintegration@clickthrough");
Route::post('integration/channelback', "BlueBirdintegration@channelback");  

// post '/pull', to: 'line_integration#pull'
// post '/channelback', to: 'line_integration#channelback'
// get '/clickthrough', to: 'line_integration#clickthrough'
