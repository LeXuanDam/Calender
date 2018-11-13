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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController');
Route::get('users/delete/{id}', 'UserController@destroy');

Route::resource('groups', 'GroupController');
Route::get('groups/delete/{id}', 'GroupController@destroy');

Route::resource('companys', 'CompanyController');
Route::get('companys/delete/{id}', 'CompanyController@destroy');
