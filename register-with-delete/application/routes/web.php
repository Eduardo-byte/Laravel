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



Route::get('/products' , 'ProductController@index')->name('products');
Route::get('/products/new' , 'ProductController@create');
Route::post('/products' , 'ProductController@store');
Route::get('/products/edit/{id}' , 'ProductController@edit');
Route::post('/products/{id}' , 'ProductController@update');
Route::get('/products/delete/{id}' , 'ProductController@destroy');


Route::get('/categories' , 'CategorieController@index')->name('categories');
Route::get('/categories/new' , 'CategorieController@create');
Route::post('/categories' , 'CategorieController@store');
Route::get('/categories/delete/{id}' , 'CategorieController@destroy');
Route::get('/categories/edit/{id}' , 'CategorieController@edit');
Route::post('/categories/{id}' , 'CategorieController@update');

