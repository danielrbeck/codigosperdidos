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
use App\Models\Cliente;
use App\Models\Endereco;

Route::get('/clientes', function () {
    $clientes = Cliente::all();
    foreach($clientes as $c){
        //$e = Endereco::where('cliente_id', $c->id)->first();
        echo "<p> ID: " . $c->id . "</p>";
        echo "<p>Nome: " . $c->nome . "</p>";
        echo "<p>Nome: " . $c->telefone . "</p>";
        echo "<br>";
        echo "<p> ID endereco: " . $c->endereco->cliente_id . "</p>";
        echo "<p>rua: " . $c->endereco->rua . "</p>";
        echo "<p>numero: " . $c->endereco->numero . "</p>";
        echo "<p>bairro: " . $c->endereco->bairro . "</p>";
        echo "<p>cidade: " . $c->endereco->cidade . "</p>";
        echo "<p>uf: " . $c->endereco->uf . "</p>";
        echo "<p>cep: " . $c->endereco->cel . "</p>";
        echo "<hr>";

        echo "<hr>";
    }
});

Route::get('/enderecos', function () {
    $enderecos = Endereco::all();
    foreach($enderecos as $e){
        echo "<p> ID: " . $e->cliente->id . "</p>";
        echo "<p>Nome: " . $e->cliente->nome . "</p>";
        echo "<p>Nome: " . $e->cliente->telefone . "</p>";
        echo "<br>";
        echo "<p> ID cliente: " . $e->cliente_id . "</p>";
        echo "<p>rua: " . $e->rua . "</p>";
        echo "<p>numero: " . $e->numero . "</p>";
        echo "<p>bairro: " . $e->bairro . "</p>";
        echo "<p>cidade: " . $e->cidade . "</p>";
        echo "<p>uf: " . $e->uf . "</p>";
        echo "<p>cep: " . $e->cel . "</p>";
        echo "<hr>";
    }
});
 

Route::get('/inserir', function() {
    $c = new Cliente;
    $c->nome = "JOSE ALMEIRA";
    $c->telefone = "45342523454";
    $c->save();
    $e = new Endereco();
    $e->rua = "av do estado";
    $e->numero = 4344;
    $e->bairro = "centro";
    $e->cidade = "sao paulo";
    $e->uf = "sp";
    $e->cel = "3455453";
    
    $c->endereco()->save($e);


    $c = new Cliente;
    $c->nome = "TESTAANDODOOOO";
    $c->telefone = "45675467456";
    $c->save();
    $e = new Endereco();
    $e->rua = "av do 34563456";
    $e->numero = 234;
    $e->bairro = "5436rtgyhfghdf";
    $e->cidade = "dfghdfgh";
    $e->uf = "gh";
    $e->cel = "54635463453654";
    
    $c->endereco()->save($e);
});


Route::get('/clientes/json', function() {
    //$clientes = Cliente::all();
    //esse é o EAGER LOADING, já busca os o modelo com algo junto
    $clientes = Cliente::with(['endereco'])->get();
    return $clientes->toJson();
});

Route::get('/enderecos/json', function() {
    //$endereco = Endereco::all();
    //esse é o EAGER LOADING, já busca os o modelo com algo junto
    $endereco = Endereco::with(['cliente'])->get();
    return $endereco->toJson();
});