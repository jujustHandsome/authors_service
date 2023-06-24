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

$router->group(['prefix' => 'api'], function($router) {
    //Authors
    $router->get('/authors',['uses' => 'AuthorsController@showAuthors']);  
    $router->post('/authors',['uses' => 'AuthorsController@addAuthor']);           
    $router->get('/authors/{id}',['uses' => 'AuthorsController@showAuthorId']);  
    $router->put('/authors/{id}',['uses' => 'AuthorsController@updateAuthor']);      
    $router->delete('/authors/{id}',['uses' => 'AuthorsController@deleteAuthor']); 
});           