<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', ['uses' => 'HomeController@index']);

$router->get('/hello', ['uses' => 'HomeController@hello']);


///////// Challenge Update Data ///////////

$router->get('/user', ['uses' => 'UserController@showAll']);

$router->get('/user/{userId}', ['uses' => 'UserController@show']);

$router->put('/user/{userId}/update', ['uses' => 'UserController@update']);
