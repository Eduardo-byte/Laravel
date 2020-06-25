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
    return view('index');
});

Route::get('/products' , 'ProductController@indexView');

Route::get('/categories' , 'CategorieController@index')->name('categories');
Route::get('/categories/new' , 'CategorieController@create');
Route::post('/categories' , 'CategorieController@store');
Route::get('/categories/delete/{id}' , 'CategorieController@destroy');
Route::get('/categories/edit/{id}' , 'CategorieController@edit');
Route::post('/categories/{id}' , 'CategorieController@update');
