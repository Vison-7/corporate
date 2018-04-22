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

Route::resource('/', 'IndexController', [
                                        'only' => ['index'],
                                        'names' => ['index' => 'main']
                                         ]);            
Route::resource('workers', 'Admin\WorkersController') /*->middleware('auth')*/; //user:123456 
Route::post('search', 'Admin\WorkersController@search') -> name('search');

Route::get('login', 'Auth\LoginController@showLoginForm');   
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\LoginController@logout');

Auth::routes();

