<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produtos;
use App\Models\Categorias;

class ControladorProduto extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function indexView()
    {
        $prods = Produtos::all();
        $cats = Categorias::all();
        return view('produtos', compact(['prods', 'cats']));
    }
    
    public function index()
    {
        $prods = Produtos::all();
        return $prods->toJson();
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $cats = Categorias::all();
        return view('novoproduto', compact(['cats']));
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $prod = new Produtos();
        $prod->nome = $request->input('nomeProduto');
        $prod->estoque = $request->input('estoqueProduto');
        $prod->preco = $request->input('precoProduto');
        $prod->categoria_id = $request->input('categoriaProduto');
        $prod->save();
        return json_encode($prod);
    }

    
    
    
    
    public function storeapi(Request $request)
    {
        $prod = new Produtos();
        $prod->nome = $request->nome;
        $prod->estoque = $request->estoque;
        $prod->preco = $request->preco;
        $prod->categoria_id = $request->categoria_id;
        $prod->save();
        return json_encode($prod);
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function showapi($id)
    {
        $prod = Produtos::find($id);
        if (isset($prod)){
            return json_encode($prod);
        }
        return response('Produto nao encontrado', 404);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $cats = Categorias::all();
        $prod = Produtos::find($id);
        if (isset($prod)){
            return view('editarProduto', compact(['prod','cats']));
        }
        return redirect('/produtos');
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $prod = Produtos::find($id);
        if (isset($prod)){
            $prod->nome = $request->input('nomeProduto');
            $prod->estoque = $request->input('estoqueProduto');
            $prod->preco = $request->input('precoProduto');
            $prod->categoria_id = $request->input('categoriaProduto');
            $prod->save();
            return redirect('/produtos');
        }
    }

    public function updateapi(Request $request, $id)
    {
        $prod = Produtos::find($id);
        if (isset($prod)){
            return json_encode($prod);
        }
        return response('Produto nao encontrado', 404);
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $prod = Produtos::find($id);
        if (isset($prod)){
            $prod->delete();
        }
        return redirect('/produtos');
    }

    public function destroyapi($id)
    {
        $prod = Produtos::find($id);
        if (isset($prod)){
            $prod->delete();
            return response('OK', 200);
        }
        return response('Produto nao encontrado', 404);
    }
    
}
