<?php

use Symfony\Component\HttpKernel\Tests\TestController;

Route::get('/','TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/products','ProductController@index'); //listado
Route::get('/admin/products/create','ProductController@create'); //formulario crear
Route::post('/admin/products','ProductController@store'); //registrar
Route::get('/admin/products/{id}/edit','ProductController@edit'); //formulario editar
Route::post('/admin/products{id}/edit','ProductController@update'); //registrar edicion

