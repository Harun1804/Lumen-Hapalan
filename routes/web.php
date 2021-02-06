<?php

use Illuminate\Support\Str;
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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function () {
    return Str::random(32);
});

$router->post('/register','AuthController@register');

$router->group(['middleware' => 'auth'],function() use ($router) {
    $router->get('/bacaan','BacaanController@index');
    $router->post('/bacaan','BacaanController@store');
    $router->get('/bacaan/{id}/edit','BacaanController@edit');
    $router->put('/bacaan/{id}/update','BacaanController@update');
    $router->delete('/bacaan/{id}/delete','BacaanController@update');

    $router->get('/hapalan','HapalanController@index');
    $router->post('/hapalan','HapalanController@store');
    $router->get('/hapalan/{id}/edit','HapalanController@edit');
    $router->put('/hapalan/{id}/update','HapalanController@update');
    $router->delete('/hapalan/{id}/delete','HapalanController@update');
});
