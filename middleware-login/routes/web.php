<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('welcome');
});

Route::get('/produtos', 'App\Http\Controllers\ProdutoControlador@index');


Route::get('/negado', function(){
    return "acesso negado";
})->name('negado');


Route::post('/login', function(Request $req){
    $login_ok = false;
    switch($req->input('user')){
        case 'joao':
            $login_ok = $req->input('password') === "senhajoao";
        break;
        case 'marcos:':
            $login_ok = $req->input('password') === "senhamarcos";
        break;
        case 'default':
            $login_ok = false;
    }
    if($login_ok){
        $login = ['user'=> $req->input('user'),'admin'=> $admin ];
        $req->session()->put('login', $login);
        return response("login Ok!", 200);
    } else {
        $req->session()->flush();
        return response("Erro no login", 404);
    }
});


Route::get('/logout', function(Request $request){
    $request->session()->flush();
    return response('Deslogado com sucesso', 200);
})->name('negado');