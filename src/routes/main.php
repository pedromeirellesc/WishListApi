<?php

use App\Http\Route;

Route::post('/categories/create', 'CategoryController@store');
Route::get('/categories/fetch/{id}', 'CategoryController@fetch');
Route::put('/categories/update/{id}', 'CategoryController@update');
Route::get('/categories/list', 'CategoryController@list');
// Route::delete('/categories/delete/{id}', 'CategoryController@delete');

Route::post('/wish_lists/create', 'WishListController@store');
Route::get('/wish_lists/fetch/{id}', 'WishListController@fetch');
Route::put('/wish_lists/update/{id}', 'WishListController@update');
Route::get('/wish_lists/list', 'WishListController@list');
// Route::delete('/wish_lists/delete/{id}', 'WishListController@delete');

Route::post('/items/create', 'ItemController@store');
Route::put('/items/update/{id}', 'ItemController@update');
// Route::delete('/items/delete/{id}', 'ItemController@delete');