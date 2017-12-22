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

Route::get('/', 'UserDataController@index')->name('home');
Route::post('/create', 'UserDataController@store')->name('newUser');
Route::put('/updateUser/{user}', 'UserDataController@update')->name('userDataUpdate');
Route::delete('/deleteUser/{user}', 'UserDataController@destroy')->name('userDataDelete');

Route::get('/category', 'CategoryController@index')->name('category');
Route::post('/categoryCreate', 'CategoryController@store')->name('newCategory');
Route::put('/updateCategory/{category}', 'CategoryController@update')->name('updateCategory');
Route::delete('/deleteCategory/{category}', 'CategoryController@destroy')->name('categoryDelete');
