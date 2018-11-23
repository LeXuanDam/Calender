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
Route::get('/','AuthController@login');
Route::get('/login','AuthController@login');
Route::post('/login','AuthController@login');
Route::get('/logout','AuthController@logout');
Route::get('/home', 'AuthController@home')->middleware('checkSession');
Route::resource('user', 'UsersController')->middleware('checkSession');
Route::get('/user/delete/{id}', 'UsersController@destroy')->middleware('checkSession');

Route::resource('group', 'GroupController')->middleware('checkSession');
Route::get('group/delete/{id}', 'GroupController@destroy')->middleware('checkSession');

Route::resource('company', 'CompanyController')->middleware('checkSession');
Route::get('company/delete/{id}', 'CompanyController@destroy')->middleware('checkSession');
