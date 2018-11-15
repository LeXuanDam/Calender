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
Route::get('/logout',function (){
   Auth::logout();
   Return redirect('/');
});
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user', 'UsersController')->middleware('auth');
Route::get('/user/delete/{id}', 'UsersController@destroy')->middleware('auth');

Route::resource('group', 'GroupController')->middleware('auth');
Route::get('group/delete/{id}', 'GroupController@destroy')->middleware('auth');

Route::resource('company', 'CompanyController')->middleware('auth');
Route::get('company/delete/{id}', 'CompanyController@destroy')->middleware('auth');
