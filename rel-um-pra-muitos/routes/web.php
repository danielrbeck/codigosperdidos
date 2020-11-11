<?php

use Illuminate\Support\Facades\Route;


use App\Models\Categoria;
use App\Models\Produto;

Route::get('/categorias', function () {
    $cats = Categoria::all();
    if(count($cats) === 0){
        echo "<h4> Voce nao possui cadastros de categoria!";
    } else {
        foreach ($cats as $c) {
            echo "<h1>" . $c->id . " - " . $c->nome . "</h1>";
        }
    }
});

Route::get('/produtos', function () {
    $prods = Produto::all();
    if(count($prods) === 0){
        echo "<h4> Voce nao possui cadastros de categoria!";
    } else {
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<td>Nome</td>";
        echo "<td>Estoque</td>";
        echo "<td>Preco</td>";
        echo "<td>Categoria</td>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($prods as $p) {
            echo "<tr>";
            echo "<td>" . $p->nome . "</td>";
            echo "<td>" . $p->estoque . "</td>";
            echo "<td>" . $p->preco . "</td>";
            echo "<td>" . $p->categoria->nome . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
});

Route::get('/categoriasprodutos', function () {
    $cats = Categoria::all();
    if(count($cats) === 0){
        echo "<h4> Voce nao possui cadastros de categoria!";
    } else {
        foreach ($cats as $c) {
            echo "<h1>" . $c->id . " - " . $c->nome . "</h1>";
            $produtos = $c->produtos;
            
            if (count($produtos)>0){
                echo "<ul>";
                
                foreach ($produtos as $p) {
                    echo "<li>" . $p->nome . "</li>";
                }
                
                echo "</ul>";
            }
        }
    }
});


Route::get('/json', function (){
    $cats = Categoria::with('produtos')->get();
    return $cats->toJson();
});

Route::get('/adicionarproduto', function (){
    $cat = Categoria::find(1);
    $prod = new Produto();
    $prod->nome = "meu novo produto";
    $prod->estoque = 10;
    $prod->preco = 100.12;
    $prod->categoria()->associate($cat);
    $prod->save();
    return $prod->toJson();
});

Route::get('/removerprodutocategoria', function (){
    $prod = Produto::find(10);
    if(isset($prod)) {
        $prod->categoria()->dissociate();
        $prod->save();
        return $prod->toJson();
    }
    return '';
});


Route::get('/associarprodutocategorianovo', function (){
    $prod = Produto::find(10);
    $cat = Categoria::find(1);
    if(isset($prod)) {
        $prod->categoria()->associate($cat);
        $prod->save();
        return $prod->toJson();
    }
    return '';
});


Route::get('/desassociaeassocia', function (){
    $prod = Produto::find(10);
    $cat = Categoria::find(1);
    if(isset($prod)) {
        $prod->categoria()->dissociate();
        $prod->categoria()->associate($cat);
        $prod->save();
        return $prod->toJson();
    }
    return '';
});


Route::get('/adicionarproduto/{catid}', function ($catid){
    $cat = Categoria::with('produtos')->find($catid);
    $prod = new Produto();
    $prod->nome = "meu novo produto adicionado 2";
    $prod->estoque = 30;
    $prod->preco = 400.31;
    if (isset($cat)) {
        $cat->produtos()->save($prod);
    }
    $cat->load('produtos');
    return $cat->toJson();
});