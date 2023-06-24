<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});


 $router->group(['middleware' => 'client.credentials'],function() use ($router) {

    $router->group(['prefix' => 'servicebooks'], function($router) {
        //Books
        $router->get('/books',['uses' => 'BooksServiceController@getBooks']);              
        $router->post('/books',['uses' => 'BooksServiceController@addBook']);                  
        $router->get('/books/{id}',['uses' => 'BooksServiceController@getBookId']);               
        $router->put('/books/{id}',['uses' => 'BooksServiceController@updateBook']);      
        $router->delete('/books/{id}',['uses' => 'BooksServiceController@deleteBook']);            
    });
    
    $router->group(['prefix' => 'serviceauthors'], function($router) {
        //Authors
        $router->get('/authors',['uses' => 'AuthorsServiceController@getAuthors']);  
        $router->post('/authors',['uses' => 'AuthorsServiceController@addAuthor']);           
        $router->get('/authors/{id}',['uses' => 'AuthorsServiceController@getAuthorId']);  
        $router->put('/authors/{id}',['uses' => 'AuthorsServiceController@updateAuthor']);      
        $router->delete('/authors/{id}',['uses' => 'AuthorsServiceController@deleteAuthor']);   
    });
    
    }); 