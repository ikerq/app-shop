<?php

use Symfony\Component\HttpKernel\Tests\TestController;

Route::get('/','TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth','admin'])->prefix('admin')->group(function(){
    Route::get('/products','ProductController@index'); //listado
    Route::get('/products/create','ProductController@create'); //formulario crear
    Route::post('/products','ProductController@store'); //registrar
    Route::get('/products/{id}/edit','ProductController@edit'); //formulario editar
    Route::post('/products{id}/edit','ProductController@update'); //registrar edicion
    Route::delete('/products/{id}','ProductController@destroy'); //formulario eliminar
});

// PUT PATCH DELETE