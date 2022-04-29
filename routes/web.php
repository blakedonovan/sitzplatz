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

$router->get('/', function () use ($router) {
    return $router->app->version();
});




$router->group([
    'prefix' => 'sitzplan',
], function () use ($router){
    $router->get('/users', 'UsersController@index');
    $router->get('/user/{UsersId}', 'UsersController@show');
    $router->post('/userCreate', 'UsersController@store');
    $router->patch('/user/{UsersId}', 'UsersController@update');
    $router->delete('/user/{UsersId}', 'UsersController@destroy');
});
