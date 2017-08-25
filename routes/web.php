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

Route::get('manifest.json', function() {
  $json = [
      "name" => "Blue Bird Channel tes",
      "id" => "zendesk-internal-bluebird-integration",
      "author" =>  "Janick Norman",
      "version" => "v1.0.0",
      "push_client_id" => "bb_integ",
        "urls" => [
        "admin_ui" => "https://nameless-badlands-52217.herokuapp.com/integration/line/admin",
        "pull_url" => "https://nameless-badlands-52217.herokuapp.com/integration/line/pull",
        "channelback_url" => "https://nameless-badlands-52217.herokuapp.com/integration/line/channelback",
        "clickthrough_url" => "https://nameless-badlands-52217.herokuapp.com/integration/line/clickthrough"
      ]
  ];

  return response()->json($json);
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
