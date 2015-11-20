<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->group(['prefix' => 'api'], function ($app) {
	
	$ns = 'App\Http\Controllers\\';
	$app->get('/provinces', "{$ns}ApiController@provinces");
	$app->get('/cities/{id}', "{$ns}ApiController@getCitiesByProvince");
	$app->get('/cities', "{$ns}ApiController@getCities");
	$app->post('/cost', "{$ns}ApiController@cost");

	$app->get('/', function(){
		return "Boooomm!!!";
	});
});

$app->get('/', "IndexController@index");