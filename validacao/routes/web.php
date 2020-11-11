<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\ClienteController@index');
Route::get('/novocliente', 'App\Http\Controllers\ClienteController@create');
Route::post('/cliente', 'App\Http\Controllers\ClienteController@store');
