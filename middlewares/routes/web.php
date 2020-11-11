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
use App\Http\Middleware\PrimeiroMiddleware;

//aplicando middleware modo mais puro
//Route::get('/usuarios', 'App\Http\Controllers\UsuarioControlador@index')->middleware('PrimeiroMiddleware::class');

//aplicando middleware nomeando ele, chamando pelo nome
//Route::get('/usuarios', 'App\Http\Controllers\UsuarioControlador@index')->middleware('primeiro');

//aplicando middleware chamando pelo construtor do controller ou pelo kernel.php
Route::get('/usuarios', 'App\Http\Controllers\UsuarioControlador@index')
    ->middleware('primeiro','segundo');
    
Route::get('/terceiro', function(){
    return 'passou pelo 3 mid';
})->middleware('terceiro:joao,28');