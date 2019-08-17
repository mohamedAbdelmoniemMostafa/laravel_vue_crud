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
    return view('crud.index');
});

Route::post ( '/vueitems', 'MainController@storeItem' );
Route::get ( '/vueitems', 'MainController@readItems' );
Route::post ( '/edititems/{id}', 'MainController@editItem' );
Route::post ( '/vueitems/{id}', 'MainController@deleteItem' );